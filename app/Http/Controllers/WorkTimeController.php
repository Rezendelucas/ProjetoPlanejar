<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Http\Request;

class workTimeController extends Controller
{
    public function newCalc(Request $request){
        dd($request);
        //separa a requisição
        $data = $request->all();

        //pega o dado e desmenbra em  horas diurnas e noturnas de acordo com as regras

        //adciona os registrosDiarios com nome e data

        //integra os registrosGlobais

        //busca os registros a serem listados
        $registros = Registro::select('registro')->distinct()->get();

        return view('/' ,compact('registros'));

    }
}
