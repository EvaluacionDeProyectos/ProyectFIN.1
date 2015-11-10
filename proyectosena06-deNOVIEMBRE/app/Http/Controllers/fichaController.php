<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\coordinacion as coordinacion;
use App\Models\programa as programa;
use App\Models\ficha as ficha;

class fichaController extends Controller {

	public function index()
	{
		//
		$ficha = ficha::all();
    	$ficha = ficha::orderBy('Numero','DESC')->select(
    						'fichaM.*',
    						'coordinacionM.Nombre as Coordinacion',
    						'programaM.Nombre as Programa')
    						->join('coordinacionM','coordinacionM.id','=','fichaM.FK_Coordinacion')
    						->join('programaM','programaM.id','=','fichaM.FK_Programa')
    						->paginate(4);

		return \View::make('ficha/list',compact('ficha'));
	}

	public function create()
	{
		//
		$coordinacion = ['coordinacion' => coordinacion::lists('Nombre','id')];
		$programa = ['programa' => programa::lists('Nombre','id')];
		return \View::make('ficha/new',$coordinacion,$programa); 
	}

	public function store(Request $request)
	{
		//
		$ficha = new ficha;
	    $ficha->create($request->all());
	    return redirect('ficha');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		//
		$ficha = ficha::find($id); 
        return \View::make('ficha/update',compact('ficha'));
	}

	public function update(Request $request)
	{
		//
		$ficha = ficha::find($request->id);
		$ficha->Numero = $request->Numero;
        $ficha->FK_Coordinacion = $request->FK_Coordinacion;
        $ficha->FK_Programa = $request->FK_Programa;
        $ficha->save();
        return redirect('ficha');
	}

	public function destroy($id)
	{
		//
		$ficha = ficha::find($id);
        $ficha->delete();
        return redirect()->back();
	}

	public function search(Request $request) 
	{ 
		$ficha = ficha::where('ficha','like','%'.$request->Nombre.'%')->get(); 
		return \View::make('ficha/list',compact('ficha')); 
	}

}