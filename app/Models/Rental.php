<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rental extends Model
{
    use HasFactory;

    // Tabel yang digunakan oleh model
    protected $table = 'rentals';

    // Atribut yang dapat diisi secara massal
    protected $fillable = [
        'user_id',
        'car_id',
        'start_date',
        'end_date',
        'status',
    ];

    // Definisikan hubungan dengan model User dan Car
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    // Aksesori untuk menghitung durasi sewa
    public function getDurationAttribute()
    {
        return $this->end_date->diffInDays($this->start_date);
    }
}
