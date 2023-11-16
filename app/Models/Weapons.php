<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weapons extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'model',
        'qtd_weapons_bullets',
        'type',
        'quantity_stock',
    ];
}
