<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    // Menampilkan daftar mobil
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    // Menampilkan formulir untuk membuat mobil baru
    public function create()
    {
        return view('cars.create');
    }

    // Menyimpan mobil baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'license_plate' => 'required|string|unique:cars',
            'daily_rate' => 'required|numeric|min:0',
        ]);

        Car::create($request->all());
        return redirect()->route('cars.index')->with('success', 'Car created successfully.');
    }

    // Menampilkan detail mobil
    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }

    // Menampilkan formulir untuk mengedit mobil
    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    // Memperbarui mobil yang ada
    public function update(Request $request, Car $car)
    {
        $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'license_plate' => 'required|string|unique:cars,license_plate,' . $car->id,
            'daily_rate' => 'required|numeric|min:0',
        ]);

        $car->update($request->all());
        return redirect()->route('cars.index')->with('success', 'Car updated successfully.');
    }

    // Menghapus mobil
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Car deleted successfully.');
    }
}
