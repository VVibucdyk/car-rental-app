<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;

class AvailableCars extends Component
{
    public $availableCars;

    public function mount()
    {
        // Ambil semua mobil yang tidak sedang disewa (ketersediaan)
        $this->availableCars = Car::whereDoesntHave('rentals', function($query) {
            $query->whereNull('return_date');
        })->get();
    }
    
    public function render()
    {
        return view('livewire.available-cars');
    }
}
