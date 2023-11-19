<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receive_weapons extends Model
{
    use HasFactory;

    protected $fillable = [
        'officer',
        'nip_officer',
        'qtd_bullets',
        'weapon',
        'weapon_number',
    ];
}
