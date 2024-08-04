<?php

namespace App\Livewire;

use App\Models\Car;
use App\Models\Rental;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RentalForm extends Component
{

    public $car_id;
    public $start_date;
    public $end_date;
    public $total_cost;
    public $car;
    public $total_days;

    public function mount(Car $car)
    {
        $this->car_id = $car->id;
        $this->car = $car;
    }

    protected $listeners = [
        'calculateTotalCost'
    ];

    public function changeDate($value)
    {
        $this->calculateTotalCost();
    }

    public function updated($field)
    {
        if ($this->start_date && $this->end_date) {
            $this->calculateTotalCost();
        }
    }

    public function calculateTotalCost()
    {
        $car = Car::find($this->car_id);

        if ($this->start_date && $this->end_date) {
            $start_date = new \DateTime($this->start_date);
            $end_date = new \DateTime($this->end_date);
            $interval = $start_date->diff($end_date);
            $days = $interval->days + 1; // Including start date

            $this->total_cost = $car->daily_rate * $days;
            $this->total_days = $days;
        } else {
            $this->total_cost = 0;
            $this->total_days = 0;
        }
    }

    public function isCarAvailable($carId, $startDate, $endDate)
    {
        $last_rentals = Rental::where('car_id', $carId)
        ->select('status')
        ->orderBy('id', 'desc')
        ->first();

        $rentals = Rental::where('car_id', $carId)
            ->where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween('start_date', [$startDate, $endDate])
                      ->orWhereBetween('end_date', [$startDate, $endDate])
                      ->orWhere(function ($query) use ($startDate, $endDate) {
                          $query->where('start_date', '<=', $startDate)
                                ->where('end_date', '>=', $endDate);
                      });
            })
            ->exists();

        if(isset($last_rentals)){
            if($last_rentals->status == 'completed') {
                return true;
            }
        }

        return !$rentals;
    }

    public function submit()
    {
        $this->validate([
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        if (!$this->isCarAvailable($this->car_id, $this->start_date, $this->end_date)) {
            session()->flash('error', 'Hmm... Sepertinya mobil ini tidak tersedia untuk rental, silahkan coba lagi.');
            return;
        }

        Rental::create([
            'user_id' => Auth::id(),
            'car_id' => $this->car_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'return_date' => null,
        ]);

        session()->flash('success', 'Mobil berhasil dirental.');
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.rental-form')->extends('layouts.customLayout')->section('content');
    }
}
