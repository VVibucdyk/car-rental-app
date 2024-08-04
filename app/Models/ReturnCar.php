<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnCar extends Model
{
    use HasFactory;

    // Tabel yang digunakan oleh model
    protected $table = 'returns';

    // Atribut yang dapat diisi secara massal
    protected $fillable = [
        'rental_id',
        'return_date',
        'total_cost',
    ];

    // Definisikan hubungan dengan model Rental
    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }
}
