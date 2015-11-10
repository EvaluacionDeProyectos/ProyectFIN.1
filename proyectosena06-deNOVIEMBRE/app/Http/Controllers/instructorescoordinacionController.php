<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class instructorescoordinacionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$instructorescoordinacion = \DB::table('instructorescoordinacion')->get();

		return \View::make('instructorescoordinacion/list', compact('instructorescoordinacion'));
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
		$instructorescoordinacion = \DB::table('instructorescoordinacion')->where('Nombre','like','%'.$request->nombre.'%')->get(); 
		return \View::make('instructorescoordinacion/list',compact('instructorescoordinacion')); 
	}


}
