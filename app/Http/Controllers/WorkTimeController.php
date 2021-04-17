<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use App\Models\RegistroDiario;
use App\Models\RegistroGlobal;
use DateTime;
use Illuminate\Http\Request;
use Symfony\Component\ErrorHandler\Debug;

class workTimeController extends Controller
{
    public function newCalc(Request $request){

        //separa a requisição
        $data = $request->all();

        //pega o dado e desmembra em horas  e minutos
        $entrada = $data['enter'];
        $saida = $data['exit'];

        $entrada = explode( ':', $entrada );
        $saida   = explode( ':', $saida );

        //passa tudo pra minutos
        $entradamin = $entrada[0] * 60 + $entrada[1];
        $saidamin =   $saida[0]   * 60 + $saida[1];

        $inicio = $entradamin;
        $contdiurno = 0;
        $contnoturno = 0;

        //separa horas diurnas e noturnas de acordo com as regras
        while ($inicio != $saidamin){
            $inicio++;

            if($inicio <= 300){
                $contnoturno++;
            }
            if($inicio > 300 && $inicio < 1320){
                $contdiurno++;
            }
            if($inicio >= 1320 && $inicio < 1440){
                $contnoturno++;
            }
            if($inicio > 1440){
                $inicio = 0;
            }
        }

        //Cria o timestemp com a data atual passando os horarios de entrada e saida
        $hoje = date('d-m-Y');

        $entradaProcessada = $hoje." ".sprintf('%02d:%02d', $entradamin / 60, $entradamin % 60);
        // se o horario de saida for menor q o de entrada o dia virou entao incrementa o dia
        if($saidamin > $entradamin) {
            $saidaProcessada = $hoje . " " . sprintf('%02d:%02d', $saidamin / 60, $saidamin % 60);
        }else {
            $saidaProcessada = new DateTime($hoje . " " . sprintf('%02d:%02d', $saidamin / 60, $saidamin % 60));
            $saidaProcessada->modify('+1 day');
        }

        //cria um novo registro diario e o objeto que será inserido neste registro
        $newRegistro = new RegistroDiario();
        $myRegistro = [
         "funcionario" => $data['func'],
         "entrada"     => $entradaProcessada,
         "saida"       => $saidaProcessada,
         "diurno"      => sprintf('%02d:%02d', $contdiurno / 60, $contdiurno % 60),
         "noturno"     => sprintf('%02d:%02d', $contnoturno / 60, $contnoturno % 60),
        ];
        $newRegistro->cadastro($myRegistro);
        //dd($myRegistro);


        //busca os registros a serem listados na view
        $registros = $newRegistro->listagem();
        dd($registros);
        return view('/' ,compact('registros'));

    }
}
