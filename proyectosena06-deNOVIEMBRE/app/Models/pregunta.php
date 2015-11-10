<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pregunta extends Model {

	//
	protected $table = 'preguntaM';
	protected $fillable = ['Descripcion','FK_Saber'];
	protected $guarded = ['id'];
}
