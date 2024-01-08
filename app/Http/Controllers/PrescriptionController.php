<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrescriptionRequest;
use App\Http\Requests\UpdatePrescriptionRequest;
use App\Models\Prescription;
use App\Models\Medication;
use App\Models\Patient;
use App\Models\Physician;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prescriptions = Prescription::with(['patient', 'medication', 'physician'])->paginate();
        
        return view('prescriptions.index', ['prescriptions' => $prescriptions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patients = Patient::all();
        
        $medications = Medication::all();
        
        $physicians = Physician::all();

        return view('prescriptions.create', compact('patients', 'medications', 'physicians'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePrescriptionRequest $request)
    {
        $validated = $request->validated();

        Prescription::create($validated);

        return redirect()->route('prescriptions.index')->with('success', 'Prescription added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prescription $prescription)
    {
        $prescription->load(['patient', 'medication', 'physician']);
        
        return view('prescriptions.show', ['prescription' => $prescription]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prescription $prescription)
    {
        $patients = Patient::all();

        $medications = Medication::all();
        
        $physicians = Physician::all();

        return view('prescriptions.edit', compact('prescription', 'patients', 'medications', 'physicians'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePrescriptionRequest $request, Prescription $prescription)
    {
        $validated = $request->validated();
        
        $prescription->update($validated);

        return redirect()->route('prescriptions.index')->with('success', 'Prescription updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prescription $prescription)
    {
        $prescription->delete();

        return redirect()->route('prescriptions.index')->with('success', 'Prescription deleted successfully!');
    }
}
