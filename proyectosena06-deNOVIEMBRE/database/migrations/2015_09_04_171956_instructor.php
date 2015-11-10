<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Instructor extends Migration {

	public function up()
	{
		Schema::create('instructorM', function(Blueprint $table)
        {
            $table->increments('id');
            $table->bigInteger('Documento');
            $table->enum('Tipo_documento', ['T.I','C.C','CE','PASS','NIT']);
            $table->string('Nombres');
            $table->string('Apellidos');
 			$table->string('Correo');
 		 	$table->enum('tipoInstructor', ['TRANSVERSAL','TECNICO']);
 		 	$table->binary('foto');
            $table->timestamps(); //basicamente hara dos atributos: create_at update_up
        });
	}

	public function down()
	{
		Schema::drop('instrctorM');
	}


}
