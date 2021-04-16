<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroDiario extends Model
{
    protected $fillable = [
        'funcionario'
        ,'entrada'
        ,'saida'
        ,'diurno'
        ,'noturno'
    ];
}