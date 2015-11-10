@extends('app1')
@section('content')
<div class="container">
    <div class="row">
         {!! Form::open(['route' => 'pregunta/search', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
          <div class="form-group">
            <label for="exampleInputName2">Nombre</label>
            <input type="text" class="form-control" name = "nombre" >
          </div>
          <button type="submit" class="btn btn-default">Buscar</button>
        <a href="{{ route('pregunta.index') }}" class="btn btn-primary">Todos los datos</a>
         <a href="{{ route('pregunta.create') }}" class="btn btn-primary">Crear nuevo registro</a>
        {!! Form::close() !!}
        <br>
    <table class="table table-condensed table-striped table-bordered">
            <thead>
                <tr>
                  <th>Descripcion</th>  

                  <th>Saber</th> 

                  <th>Accion</th>          
                  
                </tr>
            </thead>
            <tbody>
                @foreach($pregunta as $pregunta)
                <tr>
                    <td>{{ $pregunta->Descripcion }}</td>
                    <td>{{ $pregunta->Saber }}</td>                    
                    <td>
                        <a class="btn btn-primary btn-xs" href="{{ route('pregunta.edit',['id' => $pregunta->id] )}}" >Editar</a> 
                        <a class="btn btn-danger btn-xs" href="{{ route('pregunta/destroy',['id' => $pregunta->id] )}}" >Borrar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
  </div>
</div>
@endsection