<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewany', Role::class);

        $roles = Role::paginate();

        return view('roles.index', \compact(['roles']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Role::class);

        $permissions = Permission::all();

        return view('roles.create', \compact(['permissions']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Role::class);

        $validated = $request->validate([
            'name' => 'required',
            'permissions' => 'required|array',
        ]);

        $role = Role::create($validated);
        
        $role->givePermissionTo($validated['permissions']);

        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $this->authorize('update', $role);

        $permissions = Permission::pluck('name', 'id');
    
        return view('roles.edit', \compact(['role', 'permissions']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->authorize('update', $role);

        $validated = $request->validate([
            'name' => 'required',
            'permissions' => 'required|array',
        ]);

        // Remove existing role permissions before adding new ones
        if($role->permissions) {
            foreach($role->permissions as $permission) {
                dd($permission);
                if(! in_array($permission->id, $validated['permissions'])) {
                    $role->revokePermissionTo($permission);
                }
            }
        }
        

        $role->update($validated);

        $role->givePermissionTo($validated['permissions']);

        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $this->authorize('delete', $role);

        if( $role->delete() ) {
            return redirect()->route('roles.index')->with('success', 'Role created successfully.');
        }

        return back();
    }
}
