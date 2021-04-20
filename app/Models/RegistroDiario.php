<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroDiario extends Model
{
    protected $totalpage = 5;
    protected $table = 'registro_diarios';
    protected $fillable = [
        'funcionario'
        ,'entrada'
        ,'saida'
        ,'diurno'
        ,'noturno'
    ];

    public function cadastro(array $myItem)
    {
        $cadastro = RegistroDiario::create($myItem);
        return $cadastro;
    }

    public function listagem()
    {
        $registros = RegistroDiario::select(RegistroDiario::raw(
            'date(created_at) as inscricao'
            .', id'
            .', funcionario'
            .', entrada'
            .', saida'
            .', diurno'
            .', noturno')
        )->get();
        return $registros;
    }
}
