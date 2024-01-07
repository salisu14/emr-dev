<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSpecializationRequest;
use App\Http\Requests\UpdateSpecializationRequest;
use App\Models\Specialization;

class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specializations = Specialization::latest()->paginate(10);

        return view('specializations.index', compact('specializations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('specializations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSpecializationRequest $request)
    {
        $validation = $request->validated();

        auth()->user()->specializations()->create($validation);

        return redirect()->route('specializations.index')->withSuccess('Specialization added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Specialization $specialization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specialization $specialization)
    {
        return view('specializations.edit', compact('specialization'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSpecializationRequest $request, Specialization $specialization)
    {
        $validation = $request->validated();

        $specialization->update($validation);

        return redirect()->route('specializations.index')->withSuccess('Specialization updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specialization $specialization)
    {
        if(!$specialization) {
            return redirect()->route('specializations.index')->with('error', 'specialization not found!');
        }

        $specialization->delete();

        return redirect()->route('specializations.index')->with('success', 'Specialization deleted successfully!');
    }
}
