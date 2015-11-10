<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\programa as programa;

class programaController extends Controller {


	public function index()
	{
		//
		$programa = programa::all();
		return \View::make('programa/list',compact('programa'));
	}

	public function create()
	{
		//
		return \View::make('programa/new');
	}

	public function store(Request $request)
	{
		//
		$programa = new programa;
	    $programa->create($request->all());
	    return redirect('programa');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		//
		$programa = programa::find($id); 
        return \View::make('programa/update',compact('programa'));
	}

	public function update(Request $request)
	{
		//
		$programa = programa::find($request->id);
        $programa->Nombre = $request->Nombre;
        $programa->Descripcion = $request->Descripcion;
        $programa->save();
        return redirect('programa');
	}

	public function destroy($id)
	{
		//
		$programa = programa::find($id);
        $programa->delete();
        return redirect()->back();
	}

	public function search(Request $request) 
	{ 
		$programa = programa::where('nombre','like','%'.$request->nombre.'%')->get(); 
		return \View::make('programa/list',compact('programa')); 
	}

}