<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVisitRequest;
use App\Http\Requests\UpdateVisitRequest;
use App\Models\Patient;
use App\Models\Physician;
use App\Models\Visit;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visits =  Visit::latest()->paginate(9);

        return view('visits.index', \compact('visits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patients = Patient::latest()->get();
        
        $physicians = Physician::latest()->get();
    
        return view('visits.create', compact('patients', 'physicians'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVisitRequest $request)
    {
        $validated = $request->validated();

        auth()->user()->visits()->create($validated);

        return redirect()->route('visits.index')->with('success', 'visitor added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Visit $visit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visit $visit)
    {
        return view('visits.edit', compact('visit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVisitRequest $request, Visit $visit)
    {
        $validated = $request->validated();

        $visit->update($validated);

        return redirect()->route('visits.index')->with('success', 'visitor updated successfully!');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visit $visit)
    {
        if(!$visit) {
            return redirect()->route('visits.index')->with('error', 'visitor not found!');
        }

        $visit->delete();

        return redirect()->route('visits.index')->with('success', 'visitor deleted successfully!');
    }
}
