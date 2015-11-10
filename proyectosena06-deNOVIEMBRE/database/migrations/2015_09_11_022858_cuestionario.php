<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class cuestionario extends Migration {

	public function up()
	{
		Schema::create('cuestionarioM', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('Nombre');
 		 	$table->date('Fecha');
			$table->timestamps(); //basicamente hara dos atributos: create_at update_up
		});
	}

	public function down()
	{
		Schema::drop('cuestionarios');
	}

}
