@extends('app1')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			{!! Form::open(['route' => 'detalle_pregunta.store', 'method' => 'post', 'novalidate']) !!}
                <div class="form-group">
                      {!! Form::label('pregunta', 'pregunta') !!}
                      {!! Form::select('FK_Pregunta', $pregunta, null ,['class' => 'form-control']) !!}

                      {!! Form::label('cuestionario', 'cuestionario') !!}
                      {!! Form::select('FK_Cuestionario', $cuestionario, null ,['class' => 'form-control']) !!}
                  </div>                  
                <div class="form-group">
                      {!! Form::submit('Enviar', ['class' => 'btn btn-success ' ] ) !!}
                  </div>
            {!! Form::close() !!}
		</div>
	</div>
</div>
@endsection		