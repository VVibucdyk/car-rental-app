<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentalController extends Controller
{
    // Menampilkan daftar peminjaman mobil
    public function index()
    {
        $rentals = Rental::where('user_id', Auth::id())->get();
        return view('rentals.index', compact('rentals'));
    }

    // Menampilkan formulir untuk peminjaman mobil
    public function create()
    {
        $cars = Car::whereDoesntHave('rentals', function($query) {
            $query->whereNull('return_date');
        })->get();
        return view('rentals.create', compact('cars'));
    }

    // Menyimpan data peminjaman mobil ke database
    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $car = Car::find($request->car_id);

        // Cek apakah mobil tersedia pada tanggal yang diminta
        if ($car->rentals()->whereNull('return_date')->exists()) {
            return redirect()->back()->with('error', 'Car is not available for the selected dates.');
        }

        Rental::create([
            'user_id' => Auth::id(),
            'car_id' => $request->car_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('rentals.index')->with('success', 'Car rented successfully.');
    }

    // Mengembalikan mobil yang telah disewa
    public function returnCar($id)
    {
        $rental = Rental::where('user_id', Auth::id())->findOrFail($id);

        if (!$rental->return_date) {
            $rental->return_date = now();
            $rental->save();

            $daysRented = $rental->start_date->diffInDays($rental->return_date);
            $totalCost = $daysRented * $rental->car->daily_rate;

            return redirect()->route('rentals.index')->with('success', "Car returned successfully. Total cost: $$totalCost");
        }

        return redirect()->route('rentals.index')->with('error', 'Car already returned.');
    }
}
