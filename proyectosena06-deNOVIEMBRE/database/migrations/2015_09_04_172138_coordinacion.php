<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Coordinacion extends Migration {

	public function up()
	{
		Schema::create('coordinacionM', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('Nombre');
            $table->integer('FK_Centro')->unsigned();
 		 	$table->foreign('FK_Centro')->references('id')->on('centroM');
            $table->timestamps(); //basicamente hara dos atributos: create_at update_up
        });
	}

	public function down()
	{
		Schema::drop('coordinacionM');
	}

}

