<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ficha extends Migration {

	public function up()
	{
		Schema::create('fichaM', function(Blueprint $table)
        {
            $table->increments('id');

            $table->integer('Numero');

            $table->integer('FK_Coordinacion')->unsigned();
            $table->foreign('FK_Coordinacion')->references('id')->on('coordinacionM');
            
            $table->integer('FK_Programa')->unsigned();
            $table->foreign('FK_Programa')->references('id')->on('programaM');
            $table->timestamps(); //basicamente hara dos atributos: create_at update_up
        });
	}

	public function down()
	{
		Schema::drop('fichaM');
	}

}
