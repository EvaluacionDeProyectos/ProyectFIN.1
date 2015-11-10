<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class coordinadorController extends Controller {

	public function index()
	{
		//$coordinador = \DB::table('bancopreguntas')->get();

		//return \View::make('coordinador/list', compact('coordinador'));
		return view("home1");
	}

	public function create()
	{
		//
	}

	public function store()
	{
		//
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		//
	}

	public function update($id)
	{
		//
	}

	public function destroy($id)
	{
		//
	}
	public function search(Request $request) 
	{ 
		$coordinador = \DB::table('bancopreguntas')->where('Nombre','like','%'.$request->nombre.'%')->get(); 
		return \View::make('coordinador/list',compact('coordinacion')); 
	}

}
