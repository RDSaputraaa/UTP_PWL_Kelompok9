<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_menu',
        'deskripsi',
        'harga',
        'foto',
        'is_recommended',
    ];

    protected function casts(): array
    {
        return [
            'is_recommended' => 'boolean',
        ];
    }
}
