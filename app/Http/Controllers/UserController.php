<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Events\UserCreated;


class UserController extends Controller
{
    public function index()
    {
        // $this->authorize('viewany', User::class);
        
        $users = User::with(['roles',])
                    ->orderByDesc('id')
                    ->orderBy('created_at')
                    ->paginate(5);

        return view('users.index', compact('users'));
    }

    public function create() {

        // $this->authorize('create', User::class);
       
        $roles = Role::pluck('name', 'id');

        return view('users.create', compact(['roles',]));
    }

    public function store(StoreUserRequest $request)
    {
        // Authorize the creation of a new user
        // $this->authorize('create', User::class);

        DB::transaction(function() use($request) {
            // Create a new user with the provided data
            $user = User::create([
                'name'          => $request->name,
                'phone_number'  => $request->phone_number,
                'email'         => $request->email,
                'password'      => Hash::make($request->password),
            ]);

            $roleIds = $request->input('roles', []);

            // Assign roles to the user
            $roles = Role::whereIn('id', $roleIds)->get();
            $user->syncRoles($roles);

            // Trigger the UserCreated event
            event(new UserCreated($user));
        });

        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        // $this->authorize('view', $user);

        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        // $this->authorize('update', $user);

        $roles = Role::pluck('name', 'id');
        
        return view('users.edit', compact('user', 'roles'));
    }


    public function update(UpdateUserRequest $request, User $user)
    {
        // $this->authorize('update', $user);

        DB::transaction(function() use($request, $user) {

            $validated = $request->validated();

            dd($validated);

            if ($request->password) {
                $user->update(['password' => Hash::make($request->password)]);
            }

            $user->update([
                'name'          => $request->name,
                // 'phone_number'  => $request->phone_number,
                'email'         => $request->email,
            ]);

            $roleIds = $request->input('roles', []);

            // Assign roles to the user
            $roles = Role::whereIn('id', $roleIds)->get();
            $user->syncRoles($roles);
            
        });

        return redirect()->back()->with('success', 'User updated.');
    }

    public function destroy(User $user)
    {
        // $this->authorize('delete', $user);

        if($user->hasRole('administrator')) {
            return back()->with('errors', 'User Administrator cannot be deleted.');
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted.');
    }

}
