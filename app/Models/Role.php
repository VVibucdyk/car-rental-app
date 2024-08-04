<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;

    // Tabel yang digunakan oleh model
    protected $table = 'roles';

    // Atribut yang dapat diisi secara massal
    protected $fillable = [
        'name',
    ];

    // Definisikan hubungan dengan model User
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
