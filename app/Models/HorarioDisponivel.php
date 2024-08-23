<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorarioDisponivel extends Model
{
    use HasFactory;

    protected $fillable = [
        'data',
        'horaInicio',
        'horaFim'
    ];
}
