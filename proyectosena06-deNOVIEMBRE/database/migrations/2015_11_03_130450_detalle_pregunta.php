<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetallePregunta extends Migration {

	public function up()
	{
		Schema::create('detalle_preguntaM', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('FK_Pregunta')->unsigned();
            $table->foreign('FK_pregunta')->references('id')->on('preguntaM');

            $table->integer('FK_Cuestionario')->unsigned();
            $table->foreign('FK_Cuestionario')->references('id')->on('cuestionarioM');

            $table->timestamps(); //basicamente hara dos atributos: create_at update_up
        });
	}

	public function down()
	{
		Schema::drop('detalle_preguntaM');
	}

}
