<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Police_officers extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'division',
        'category',
        'nip',
    ];
}
