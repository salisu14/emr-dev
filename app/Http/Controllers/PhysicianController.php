<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePhysicianRequest;
use App\Http\Requests\UpdatePhysicianRequest;
use App\Models\Physician;
use App\Models\Specialization;

class PhysicianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $physicians = Physician::latest()->paginate(9);

        return view('physicians.index', \compact('physicians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specializations = Specialization::latest()->get();

        return view('physicians.create', compact('specializations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePhysicianRequest $request)
    {
        DB::transaction(function() use($request) {

            $validated = $request->validated();

            $name = $request->input('first_name') . ' ' . $request->input('last_name');

            $user = User::create([
                'name' => $name,
                'email' => $request->input('email'),
                'password' => bcrypt('password')
            ]);

            $validated['user_id'] = $user->id;

            Physician::create($validated);
        });

        return redirect()->route('physicians.index')->with('success', 'Physician added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Physician $physician)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Physician $physician)
    {
        $specializations = Specialization::latest()->get();

        return view('physicians.edit', compact('physician', 'specializations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePhysicianRequest $request, Physician $physician)
    {
        $validated = $request->validated();

        $physician->update($validated);

        return redirect()->route('physicians.index')->with('success', 'Physician updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Physician $physician)
    {
        if(!$physician) {
            return redirect()->route('physicians.index')->with('error', 'Physician not found!');
        }

        $physician->delete();

        return redirect()->route('physicians.index')->with('success', 'Physician deleted successfully!');
    }
}
