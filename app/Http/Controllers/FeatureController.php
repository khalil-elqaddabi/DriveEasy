<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $features = Feature::all();

        return view('features.index', compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('features.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Feature::create($validated);

        return redirect()->route('features.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Feature $feature)
    {
        return view('features.show', compact('feature'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feature $feature)
    {
        return view('features.edit', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feature $feature)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $feature->update($validated);

        return redirect()->route('features.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feature $feature)
    {
        $feature->delete();

        return redirect()->route('features.index');
    }
}
