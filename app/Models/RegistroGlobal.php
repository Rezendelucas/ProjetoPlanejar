<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroGlobal extends Model
{
    protected $table = 'registro_globals';
    protected $fillable = [
        'funcionario'
        ,'diurno'
        ,'noturno'
    ];

    public function cadastro(array $myItem)
    {
        $cadastro = RegistroDiario::create($myItem);
        return $cadastro;
    }
}
