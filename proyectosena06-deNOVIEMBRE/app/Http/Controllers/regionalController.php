<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\regional as regional;

class regionalController extends Controller {

	public function index()
	{
		//
		$regional = regional::all();
		return \View::make('regional/list',compact('regional'));
	}

	public function create()
	{
		//
		return \View::make('regional/new');
	}

	public function store(Request $request)
	{
		//
		$regional = new regional;
	    $regional->create($request->all());
	    return redirect('regional');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		//
		$regional = regional::find($id); 
        return \View::make('regional/update',compact('regional'));
	}

	public function update(Request $request)
	{
		//
		$regional = regional::find($request->id);
        $regional->Nombre = $request->Nombre;
        $regional->Descripcion = $request->Descripcion;
        $regional->save();
        return redirect('regional');
	}

	public function destroy($id)
	{
		//
		$regional = regional::find($id);
        $regional->delete();
        return redirect()->back();
	}

	public function search(Request $request) 
	{ 
		$regional = regional::where('nombre','like','%'.$request->nombre.'%')->get(); 
		return \View::make('regional/list',compact('regional')); 
	}

}