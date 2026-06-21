<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            $bookings = Booking::with(['user', 'car'])->get();
        } else {
            $bookings = Booking::with(['car'])
                ->where('user_id', Auth::id())
                ->get();
        }

        return view('bookings.index', compact('bookings'));
    }

    public function create(Car $car)
    {
        return view('bookings.create', compact('car'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'pickup_location' => 'required|string|max:255',
        ]);

        $car = Car::findOrFail($validated['car_id']);

        $bookingExists = Booking::where('car_id', $car->id)
            ->where('status', '!=', 'cancelled')
            ->where(function ($query) use ($validated) {

                $query->whereBetween('start_date', [
                    $validated['start_date'],
                    $validated['end_date']
                ])

                    ->orWhereBetween('end_date', [
                        $validated['start_date'],
                        $validated['end_date']
                    ])

                    ->orWhere(function ($query) use ($validated) {
                        $query->where('start_date', '<=', $validated['start_date'])
                            ->where('end_date', '>=', $validated['end_date']);
                    });

            })
            ->exists();

        if ($bookingExists) {
            return back()->with('error', 'Car is not available for these dates.');
        }

        $startDate = Carbon::parse($validated['start_date']);
        $endDate = Carbon::parse($validated['end_date']);

        $days = $startDate->diffInDays($endDate);

        $totalPrice = $days * $car->price_per_day;

        Booking::create([
            'user_id' => Auth::id(),
            'car_id' => $car->id,
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'pickup_location' => $validated['pickup_location'],
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        return redirect()->route('bookings.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'status' => 'required|in:confirmed,completed,cancelled',
        ]);


        if (Auth::user()->role === 'client') {

            if ($booking->user_id != Auth::id() || $booking->status != 'pending') {
                abort(403);
            }

            $booking->update([
                'status' => 'cancelled',
            ]);

            return redirect()->route('bookings.index');
        }

        // Admin
        $booking->update([
            'status' => $validated['status'],
        ]);

        if ($validated['status'] == 'confirmed') {
            $booking->car->update([
                'status' => 'rented',
            ]);
        }

        if (in_array($validated['status'], ['completed', 'cancelled'])) {
            $booking->car->update([
                'status' => 'available',
            ]);
        }

        return redirect()->route('bookings.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        if ($booking->status !== 'pending') {
            return back()->with('error', 'Only pending bookings can be cancelled.');
        }

        $booking->update([
            'status' => 'cancelled',
        ]);

        return redirect()->route('bookings.index');
    }
}
