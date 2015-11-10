<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\dcuestionario as dcuestionario;
use App\Models\cuestionario as cuestionario;
use App\Models\ficha as ficha;
use App\Models\instructor as instructor;


class dcuestionarioController extends Controller {


	public function index()
	{
		//
		$dcuestionario = dcuestionario::all();

		//consulta a una vista
    	//$cargos = \DB::table('ver_cargos')->get();
    	$dcuestionario = dcuestionario::orderBy('FK_Cuestionario','DESC')->select(
    						'detalle_cuestionarioM.*',
    						'cuestionarioM.Nombre as Cuestionario',
    						'fichaM.Numero as Ficha',
    						'instructorM.Nombres as Instructor')
    						->join('cuestionarioM','cuestionarioM.id','=','detalle_cuestionariom.FK_Cuestionario')
    						->join('fichaM','fichaM.id','=','detalle_cuestionariom.FK_Ficha')
    						->join('instructorM','instructorM.id','=','detalle_cuestionariom.FK_Instructor')
    						->paginate(4);
    	
		return \View::make('dcuestionario/list',compact('dcuestionario'));
	}

	public function create()
	{
		//
		$cuestionario = ['cuestionario' => cuestionario::lists('Nombre','id')];
		$ficha = ['ficha' => ficha::lists('Numero','id')];
		$instructor = ['instructor' => instructor::lists('Nombres','id')];
		//return \View::make('dcuestionario/new')->with('cuestionario')->with('ficha')->with('instructor');
		return \View::make('dcuestionario/new',compact ('cuestionario','ficha','instructor'));
	}

	public function store(Request $request)
	{
		//
		$dcuestionario = new dcuestionario;
	    $dcuestionario->create($request->all());
	    return redirect('dcuestionario');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		//
		$dcuestionario = dcuestionario::find($id); 
		$cuestionario = cuestionario::lists('Nombre','id');
		$ficha = ficha::lists('Numero','id');
		$instructor = instructor::lists('Nombres','id');
        return \View::make('dcuestionario/update',compact('dcuestionario'));
	}

	public function update(Request $request)
	{
		//

		$dcuestionario = dcuestionario::find($request->id);
        $dcuestionario->FK_Cuestionario = $request->FK_Cuestionario;
		$dcuestionario->FK_Ficha = $request->FK_Ficha;
        $dcuestionario->FK_Instructor = $request->FK_Instructor;
        $dcuestionario->save();
        return redirect('dcuestionario');
	}

	public function destroy($id)
	{
		$dcuestionario = dcuestionario::find($id);
        $dcuestionario->delete();
        return redirect()->back();
	}

	public function search(Request $request) 
	{ 
		$dcuestionario = dcuestionario::where('FK_Cuestionario','like','%'.$request->FK_Cuestionario.'%')->get(); 
		return \View::make('dcuestionario/list',compact('dcuestionario')); 
	}

}
