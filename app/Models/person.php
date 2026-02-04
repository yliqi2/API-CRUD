<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return animals::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'species' => 'required|in:dog,cat,hamster,bunny',
            'weight' => 'nullable|numeric',
            'disease' => 'nullable|string',
            'comments' => 'nullable|string',
        ]);

        return animals::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(animals $animal)
    {
        return $animal;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(animals $animals)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, animals $animal)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string',
            'species' => 'sometimes|in:dog,cat,hamster,bunny',
            'weight' => 'nullable|numeric',
            'disease' => 'nullable|string',
            'comments' => 'nullable|string',
        ]);

        $animal->update($validated);
        return $animal;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(animals $animal)
    {
        $animal->delete();
        return response()->json(['message' => 'Animal deleted successfully'], 200);
    }
}
