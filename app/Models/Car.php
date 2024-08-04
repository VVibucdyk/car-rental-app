<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    // Tabel yang digunakan oleh model
    protected $table = 'cars';

    // Atribut yang dapat diisi secara massal
    protected $fillable = [
        'brand',
        'model',
        'license_plate',
        'daily_rate',
        'available',
    ];

    // Definisikan hubungan dengan model Rental
    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
