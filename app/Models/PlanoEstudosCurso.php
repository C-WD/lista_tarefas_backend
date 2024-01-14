<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanoEstudosCurso extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_concluido',
        'aula_inicial',
        'aula_final',
        'duracao',
        'data_final',
    ];
}
