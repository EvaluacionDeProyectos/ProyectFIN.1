<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\pregunta as pregunta;
use App\Models\cuestionario as cuestionario;
use App\Models\detalle_pregunta as detalle_pregunta;

class detalle_preguntaController extends Controller {

	public function index()
	{
		//
		$detalle_pregunta = detalle_pregunta::all();
    	$detalle_pregunta = detalle_pregunta::orderBy('FK_Pregunta','DESC')->select(
    						'detalle_preguntaM.*',
    						'preguntaM.Descripcion as Pregunta',
    						'cuestionarioM.Nombre as Cuestionario')
    						->join('preguntaM','preguntaM.id','=','detalle_preguntaM.FK_Pregunta')
    						->join('cuestionarioM','cuestionarioM.id','=','detalle_preguntaM.FK_Cuestionario')
    						->paginate(4);
		return \View::make('detalle_pregunta/list',compact('detalle_pregunta'));
	}

	public function create()
	{
		//
		$pregunta = ['pregunta' => pregunta::lists('Descripcion','id')];
		$cuestionario = ['cuestionario' => cuestionario::lists('Nombre','id')];
		return \View::make('detalle_pregunta/new',$pregunta,$cuestionario); 
	}

	public function store(Request $request)
	{
		//
		$detalle_pregunta = new detalle_pregunta;
	    $detalle_pregunta->create($request->all());
	    return redirect('detalle_pregunta');
	}

	public function show($id)
	{
		//
	}
	public function edit($id)
	{
		//
		$detalle_pregunta = detalle_pregunta::find($id); 
        return \View::make('detalle_pregunta/update',compact('detalle_pregunta'));
	}
	public function update(Request $request)
	{
		//
		$detalle_pregunta = detalle_pregunta::find($request->id);
        $detalle_pregunta->FK_Pregunta = $request->FK_Pregunta;
        $detalle_pregunta->FK_Cuestionario = $request->FK_Cuestionario;
        $detalle_pregunta->save();
        return redirect('detalle_pregunta');
	}

	public function destroy($id)
	{
		//
		$detalle_pregunta = detalle_pregunta::find($id);
        $detalle_pregunta->delete();
        return redirect()->back();
	}

	public function search(Request $request) 
	{ 
		$detalle_pregunta = detalle_pregunta::where('detalle_pregunta','like','%'.$request->FK_Pregunta.'%')->get(); 
		return \View::make('detalle_pregunta/list',compact('detalle_pregunta')); 
	}

}