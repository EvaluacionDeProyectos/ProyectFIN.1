<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\pregunta as pregunta;
use App\Models\saber as saber;

class preguntaController extends Controller {

	public function index()
	{
		//
		$pregunta = pregunta::all();
    	$pregunta = pregunta::orderBy('Descripcion','DESC')->select(
    						'preguntaM.*',
    						'saberM.Nombre as Saber')
    						->join('saberM','saberM.id','=','preguntaM.FK_Saber')
    						->paginate(4);
		return \View::make('pregunta/list',compact('pregunta'));
	}

	public function create()
	{
		//
		$saber = ['saber' => saber::lists('Nombre','id')];
		return \View::make('pregunta/new',$saber);
	}

	public function store(Request $request)
	{
		//
		$pregunta = new pregunta;
	    $pregunta->create($request->all());
	    return redirect('pregunta');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		//
		$pregunta = pregunta::find($id); 
        return \View::make('pregunta/update',compact('pregunta'));
	}

	public function update(Request $request)
	{
		//
		$pregunta = pregunta::find($request->id);
        $pregunta->Descripcion = $request->Descripcion;
        $pregunta->FK_Saber = $request->FK_Saber;
        $pregunta->save();
        return redirect('pregunta');
	}

	public function destroy($id)
	{
		//
		$pregunta = pregunta::find($id);
        $pregunta->delete();
        return redirect()->back();
	}

	public function search(Request $request) 
	{ 
		$pregunta = pregunta::where('Descripcion','like','%'.$request->Descripcion.'%')->get(); 
		return \View::make('pregunta/list',compact('pregunta')); 
	}

}