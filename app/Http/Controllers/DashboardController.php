<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Car;

class DashboardController extends Controller
{
    public function admin()
    {
        $totalCars = Car::count();
        $availableCars = Car::where('status', 'available')->count();
        $totalBookings = Booking::count();
        $totalRevenue = Booking::sum('total_price');
        $recentBookings = Booking::with(['car', 'user'])->latest()->take(5)->get();
        $recentCars = Car::latest()->take(3)->get();

        return view('admin.dashboard', compact(
            'totalCars',
            'availableCars',
            'totalBookings',
            'totalRevenue',
            'recentBookings',
            'recentCars'
        ));
    }

   public function client()
{
    $myBookings = Booking::where('user_id', Auth::id())->count();

    $activeBookings = Booking::where('user_id', Auth::id())
        ->whereIn('status', ['pending', 'confirmed'])
        ->count();

    $latestBooking = Booking::with('car')
        ->where('user_id', Auth::id())
        ->latest()
        ->first();

    return view('dashboard', compact(
        'myBookings',
        'activeBookings',
        'latestBooking'
    ));
}
}
