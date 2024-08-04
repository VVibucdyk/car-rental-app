<?php

namespace App\Livewire;

use App\Models\Rental;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RentedCars extends Component
{
    public $rentals = [];


    public function mount()
    {
        $this->rentals = Rental::where('user_id', Auth::id())
            ->join('cars', 'cars.id', '=', 'rentals.car_id')
            ->select('rentals.*', 'cars.brand', 'cars.model', 'cars.daily_rate', 'cars.license_plate', 'cars.available')
            ->with('car')
            ->orderBy('id', 'desc')
            ->get();
    }

    public function calculateTotalCost($rental)
    {
        $startDate = new \DateTime($rental->start_date);
        $endDate = new \DateTime($rental->end_date);
        $interval = $startDate->diff($endDate);
        $days = $interval->days + 1; // Include both start and end date
        return $rental->car->daily_rate * $days;
    }

    public function calculateTotalDays($rental) {
        $startDate = new \DateTime($rental->start_date);
        $endDate = new \DateTime($rental->end_date);
        $interval = $startDate->diff($endDate);
        $days = $interval->days + 1; // Include both start and end date
        return $days;
    }

    public function render()
    {
        return view('livewire.rented-cars', [
            'rentals' => $this->rentals,
        ]);
    }
}
