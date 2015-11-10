<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\aprendiz as aprendiz;
use App\Models\ficha as ficha;

class aprendizController extends Controller {


	public function index()
	{
		//
		$aprendiz = aprendiz::all();
		$aprendiz = aprendiz::orderBy('Documento','DESC')->select(
    						'aprendizM.*',
    						'fichaM.Numero as Ficha')
    						->join('fichaM','fichaM.id','=','aprendizM.FK_Ficha')
    						->paginate(4);
		return \View::make('aprendiz/list',compact('aprendiz'));
	}

	public function create()
	{
		//
		$ficha =  ficha::lists('Numero','id');
		return \View::make('aprendiz/new',compact('ficha'));
	}
	public function store(Request $request)
	{
		//
		$aprendiz = new aprendiz;
	    $aprendiz->create($request->all());
	    return redirect('aprendiz');
	}
	public function show($id)
	{
		//
	}
	public function edit($id)
	{
		//
		$aprendiz = aprendiz::find($id); 
		$ficha = ficha::lists('Numero','id');
        return \View::make('aprendiz/update',compact('aprendiz','ficha'));
	}

	public function update(Request $request)
	{
		//
		$aprendiz = aprendiz::find($request->id);
        $aprendiz->Documento = $request->Documento;
        $aprendiz->Tipo_documento = $request->Tipo_documento;
        $aprendiz->Nombres = $request->Nombres;
        $aprendiz->Apellidos = $request->Apellidos;
        $aprendiz->Fecha_nacimiento = $request->Fecha_nacimiento;
        $aprendiz->Correo = $request->Correo;
        $aprendiz->Direccion = $request->Direccion;
        $aprendiz->Telefono = $request->Telefono;
        $aprendiz->Fecha_inicioLectiva = $request->Fecha_inicioLectiva;
        $aprendiz->Fecha_finLectiva = $request->Fecha_finLectiva;
        $aprendiz->Fecha_inicioProductiva = $request->Fecha_inicioProductiva;
        $aprendiz->Fecha_finProductiva = $request->Fecha_finProductiva;
        $aprendiz->Usuario = $request->Usuario;
        $aprendiz->Contraseña = $request->Contraseña;
        $aprendiz->FK_Ficha = $request->FK_Ficha;

        $aprendiz->save();
        return redirect('aprendiz');
	}

	public function destroy($id)
	{
		//
		$aprendiz = aprendiz::find($id);
        $aprendiz->delete();
        return redirect()->back();
	}

	public function search(Request $request) 
	{ 
		$aprendiz = aprendiz::where('nombre','like','%'.$request->nombre.'%')->get(); 
		return \View::make('aprendiz/list',compact('aprendiz')); 
	}

}