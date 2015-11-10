@extends('app1')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			{!! Form::model($detalle_pregunta,['route' => 'detalle_pregunta.update', 'method' => 'put', 'novalidate']) !!}
            
                {!! Form::hidden('id', $detalle_pregunta->id) !!}
            
                <div class="form-group">
                      {!! Form::label('Pregunta', 'Pregunta') !!}
                      {!! Form::text('FK_Pregunta', null, ['class' => 'form-control' , 'required' => 'required']) !!}
                      
                      {!! Form::label('Cuestionario', 'Cuestionario') !!}
                      {!! Form::text('FK_Cuestionario', null, ['class' => 'form-control' , 'required' => 'required']) !!}
                </div>                           
                <div class="form-group">
                      {!! Form::submit('Enviar', ['class' => 'btn btn-success ' ] ) !!}
                  </div>
            {!! Form::close() !!}
		</div>
	</div>
</div>
@endsection