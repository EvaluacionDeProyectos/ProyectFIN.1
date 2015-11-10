<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\coordinacion as coordinacion;
use App\Models\centro as centro;

class coordinacionController extends Controller {

	public function index()
	{
		//
		$coordinacion = coordinacion::all();
    	$coordinacion = coordinacion::orderBy('Nombre','DESC')->select(
    						'coordinacionM.*',
    						'centroM.Descripcion as Centro')
    						->join('centroM','centroM.id','=','coordinacionM.FK_Centro')
    						->paginate(4);
		return \View::make('coordinacion/list',compact('coordinacion'));
	}

	public function create()
	{
		//
		$centro = ['centro' => centro::lists('Descripcion','id')];
		return \View::make('coordinacion/new',$centro); 
	}

	public function store(Request $request)
	{
		//
		$coordinacion = new coordinacion;
	    $coordinacion->create($request->all());
	    return redirect('coordinacion');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		//
		$coordinacion = coordinacion::find($id); 
        return \View::make('coordinacion/update',compact('coordinacion'));
	}

	public function update(Request $request)
	{
		//
		$coordinacion = coordinacion::find($request->id);
        $coordinacion->Nombre = $request->Nombre;
        $coordinacion->FK_Centro = $request->FK_Centro;
        $coordinacion->save();
        return redirect('coordinacion');
	}

	public function destroy($id)
	{
		//
		$coordinacion = coordinacion::find($id);
        $coordinacion->delete();
        return redirect()->back();
	}

	public function search(Request $request) 
	{ 
		$coordinacion = coordinacion::where('Nombre','like','%'.$request->Nombre.'%')->get(); 
		return \View::make('coordinacion/list',compact('coordinacion')); 
	}

}