<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pregunta extends Migration {

	public function up()
	{
		Schema::create('preguntaM', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('Descripcion');
            
 		 	$table->integer('FK_Saber')->unsigned();
 		 	$table->foreign('FK_Saber')->references('id')->on('saberM');
            $table->timestamps(); //basicamente hara dos atributos: create_at update_up
        });
	}

	public function down()
	{
		Schema::drop('PreguntaM');
	}

}
