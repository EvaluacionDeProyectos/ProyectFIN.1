<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Regional extends Migration {

	public function up()
	{
		Schema::create('regionalM', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('Nombre');
 		 	$table->string('Descripcion');
            $table->timestamps(); //basicamente hara dos atributos: create_at update_up
        });
	}

	public function down()
	{
		Schema::drop('regionalM');
	}

}
