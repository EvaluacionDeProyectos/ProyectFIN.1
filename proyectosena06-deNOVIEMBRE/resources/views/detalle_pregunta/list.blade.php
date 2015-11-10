@extends('app1')
@section('content')
<div class="container">
    <div class="row">
         {!! Form::open(['route' => 'detalle_pregunta/search', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
          <div class="form-group">
            <label for="exampleInputName2">Nombre</label>
            <input type="text" class="form-control" name = "nombre" >
          </div>
          <button type="submit" class="btn btn-default">Buscar</button>
        <a href="{{ route('detalle_pregunta.index') }}" class="btn btn-primary">Todos los datos</a>
         <a href="{{ route('detalle_pregunta.create') }}" class="btn btn-primary">Crear nuevo cuestionario</a>
        {!! Form::close() !!}
        <br>
    <table class="table table-condensed table-striped table-bordered">
            <thead>
                <tr>
                  <th>Pregunta</th>
                  
                  <th>Cuestionario</th>   
 
                  <th>Accion</th>          
                  
                </tr>
            </thead>
            <tbody>
                @foreach($detalle_pregunta as $detalle_pregunta)
                <tr>
                    <td>{{ $detalle_pregunta->Pregunta }}</td> 
                    <td>{{ $detalle_pregunta->Cuestionario }}</td>                    
                    <td>
                        <a class="btn btn-primary btn-xs" href="{{ route('detalle_pregunta.edit',['id' => $detalle_pregunta->id] )}}" >Editar</a> 
                        <a class="btn btn-danger btn-xs" href="{{ route('detalle_pregunta/destroy',['id' => $detalle_pregunta->id] )}}" >Borrar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
  </div>
</div>
@endsection