<?php

namespace App\Http\Controllers;

use  App\Http\Controllers\Controller;
use App\Http\Requests\StoreMedicationRequest;
use App\Http\Requests\UpdateMedicationRequest;
use App\Models\Medication;

class MedicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medications = Medication::latest()->paginate(10);

        return view('medications.index', compact('medications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medications.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMedicationRequest $request)
    {
        $validated = $request->validated();

        auth()->user()->medications()->create($validated);

        return redirect()->route('medications.index')->withSuccess('Medication created successfully.');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Medication $medication)
    {
        // $medication->load('prescriptions');

        // dd($medication);

        return view('medications.show', \compact('medication'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medication $medication)
    {
        return view('medications.edit', compact('medication'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedicationRequest $request, Medication $medication)
    {
        $validated = $request->validated();

        $medication->update($validated);

        return redirect()->route('medications.index')->withSuccess('Medication updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medication $medication)
    {
        $medication->destroy();

        return redirect()->route('medications.index')->withSuccess('Medication deleted successfully.');
    }
}
