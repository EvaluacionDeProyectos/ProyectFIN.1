<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\centro as centro;
use App\Models\regional as regional;

class centroController extends Controller {

	public function index()
	{
		//
		$centro = centro::all();
    	$centro = centro::orderBy('Descripcion','DESC')->select(
    						'centroM.*',
    						'regionalM.Nombre as Regional')
    						->join('regionalM','regionalM.id','=','centroM.FK_Regional')
    						->paginate(4);
		return \View::make('centro/list',compact('centro'));
	}

	public function create()
	{
		//
		$regional = ['regional' => regional::lists('Nombre','id')];
		return \View::make('centro/new',$regional);
	}
	public function store(Request $request)
	{
		//
		$centro = new centro;
	    $centro->create($request->all());
	    return redirect('centro');
	}
	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		//
		$centro = centro::find($id); 
        return \View::make('centro/update',compact('centro'));
	}

	public function update(Request $request)
	{
		//
		$centro = centro::find($request->id);
        $centro->Descripcion = $request->Descripcion;
        $centro->Direccion = $request->Direccion;
        $centro->FK_regional = $request->FK_Regional;
        $centro->save();
        return redirect('centro');
	}

	public function destroy($id)
	{
		//
		$centro = centro::find($id);
        $centro->delete();
        return redirect()->back();
	}

	public function search(Request $request) 
	{ 
		$centro = centro::where('Descripcion','like','%'.$request->Descripcion.'%')->get(); 
		return \View::make('centro/list',compact('centro')); 
	}

}