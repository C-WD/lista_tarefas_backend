<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaveFromApi extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'objeto',
    ];
}
