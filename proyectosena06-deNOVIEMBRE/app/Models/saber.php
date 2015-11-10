<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class saber extends Model {

	protected $table = 'saberM';
	protected $fillable = ['Nombre','Descripcion'];
	protected $guarded = ['id'];

}
