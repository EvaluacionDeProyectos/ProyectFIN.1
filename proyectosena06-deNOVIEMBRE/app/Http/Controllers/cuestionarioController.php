<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\cuestionario as cuestionario;

class cuestionarioController extends Controller {


	public function index()
	{
		//
		$cuestionario = cuestionario::all();
		return \View::make('cuestionario/list',compact('cuestionario'));
	}

	public function create()
	{
		//
		return \View::make('cuestionario/new');
	}

	public function store(Request $request)
	{
		//
		$cuestionario = new cuestionario;
	    $cuestionario->create($request->all());
	    return redirect('cuestionario');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		//
		$cuestionario = cuestionario::find($id); 
        return \View::make('cuestionario/update',compact('cuestionario'));
	}

	public function update(Request $request)
	{
		//
		$cuestionario = cuestionario::find($request->id);
        $cuestionario->Nombre = $request->Nombre;
        $cuestionario->Fecha = $request->Fecha;
        $cuestionario->save();
        return redirect('cuestionario');
	}

	public function destroy($id)
	{
		//
		$cuestionario = cuestionario::find($id);
        $cuestionario->delete();
        return redirect()->back();
	}

	public function search(Request $request) 
	{ 
		$cuestionario = cuestionario::where('Nombre','like','%'.$request->nombre.'%')->get(); 
		return \View::make('cuestionario/list',compact('cuestionario')); 
	}

}