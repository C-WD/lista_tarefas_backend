<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CursosIntro extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'nome',
        'data_inicio',
        'data_fim',
        'tempo_diario',
        'sabado_domingo',
        'finalizar_aula',
        'pausa_inicio',
        'pausa_fim',
        'progresso',
        'duracao',
        'status',
        'link'
    ];
}
