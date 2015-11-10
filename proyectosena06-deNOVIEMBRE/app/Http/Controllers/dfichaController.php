<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\dficha as dficha;
use App\Models\ficha as ficha;
use App\Models\instructor as instructor;

class dfichaController extends Controller {

	public function index()
	{
		//
		$dficha = dficha::all();
    	$dficha = dficha::orderBy('FK_Ficha','DESC')->select(
    						'fichaM.Numero as Ficha',
    						'instructorM.Nombres as Instructor',
    						'detalle_fichasm.*')
    						->join('fichaM','fichaM.id','=','detalle_fichasM.FK_Ficha')
    						->join('instructorM','instructorM.id','=','detalle_fichasm.FK_Instructor')
    						->paginate(4);
    	$instructor = instructor::lists('Nombres','id');
		return \View::make('dficha/list',compact('dficha'));
	}

	public function create()
	{
		//
		$ficha = ['ficha' => ficha::lists('Numero','id')];
		$instructor = ['instructor' => instructor::lists('Nombres','id')];
		return \View::make('dficha/new',$ficha,$instructor); 
	}

	public function store(Request $request)
	{
		//
		$dficha = new dficha;
	    $dficha->create($request->all());
	    return redirect('dficha');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		//
		$dficha = dficha::find($id);
		$instructor = instructor::lists('Nombres','id');
        return \View::make('dficha/update',compact('dficha'));
	}

	public function update(Request $request)
	{
		//
		$dficha = dficha::find($request->id);
        $dficha->FK_Ficha = $request->FK_Ficha;
        $dficha->FK_Instructor = $request->FK_Instructor;
        $dficha->Titular = $request->Titular;
        $dficha->save();
        return redirect('dficha');
	}

	public function destroy($id)
	{
		//
		$dficha = dficha::find($id);
        $dficha->delete();
        return redirect()->back();
	}

	public function search(Request $request) 
	{ 
		$dficha = dficha::where('dficha','like','%'.$request->FK_Ficha.'%')->get(); 
		return \View::make('dficha/list',compact('dficha')); 
	}

}