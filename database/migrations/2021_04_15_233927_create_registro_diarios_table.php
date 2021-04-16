<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroDiariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_diarios', function (Blueprint $table) {
            $table->id();
            $table->string('funcionario');
            $table->date('data');
            $table->timestamp('entrada',$precision = 0);
            $table->timestamp('saida',$precision = 0);
            $table->timestamp('diurno',$precision = 0);
            $table->timestamp('noturno',$precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registro_diarios');
    }
}
