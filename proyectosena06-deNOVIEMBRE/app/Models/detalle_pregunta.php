<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detalle_pregunta extends Model {

	protected $table = 'detalle_preguntaM';
	protected $fillable = ['FK_Pregunta','FK_Cuestionario'];
	protected $guarded = ['id'];

}
