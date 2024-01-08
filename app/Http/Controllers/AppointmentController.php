<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Physician;
use App\Enums\AppointmentStatus;


class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::latest()->paginate();

        return view('appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patients = Patient::all();
                
        $physicians = Physician::all();

        // Return the view to create a new appointment
        return view('appointments.create', compact('patients', 'physicians'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppointmentRequest $request)
    {
        // Validate and store the new appointment
        $validated = $request->validated();

        $appointment = Appointment::create($validated);

        return redirect()->route('prescriptions.index')->with('success', 'Appointment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        return view('appointments.show', compact('appointment'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        $patients = Patient::all();
                
        $physicians = Physician::all();

        // Return the view to create a new appointment
        return view('appointments.edit', compact('appointment','patients', 'physicians'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        // Validate and update the appointment
        $validated = $request->validated();

        $appointment->update($validated);

        return redirect()->route('prescriptions.index')->with('success', 'Appointment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        // Delete the appointment
        $appointment->delete();

        return redirect()->route('appointments.index');
    }
}
