<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();

        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $features = \App\Models\Feature::all();

        return view('cars.create', compact('features'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer',
            'seats' => 'required|integer',
            'price_per_day' => 'required|numeric',
            'status' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable|string',

            'features' => 'nullable|array',
            'features.*' => 'exists:features,id',
        ]);

        $features = $validated['features'] ?? [];

        unset($validated['features']);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('cars', 'public');
        }

        $validated['image'] = $imagePath;

        $car = Car::create($validated);

        $car->features()->sync($features);

        return redirect()->route('cars.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {


        return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
{
    $features = \App\Models\Feature::all();

    return view('cars.edit', compact('car', 'features'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
{
    $validated = $request->validate([
        'brand' => 'required|string|max:255',
        'model' => 'required|string|max:255',
        'year' => 'required|integer',
        'seats' => 'required|integer',
        'price_per_day' => 'required|numeric',
        'status' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'description' => 'nullable|string',
    ]);

    $car->update($validated);

    // Update features
    $car->features()->sync($request->features ?? []);

    return redirect()->route('cars.index');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {


        $car->delete();

        return redirect()->route('cars.index');
    }
}
