@extends('layouts/app')
@section('contenido')
<div class="tabla_principalv2 form-horizontal">

	{!! Form::open(['route' => ['imagenes.store'], 'method' => 'POST' ,'class'=>"form-horizontal" ,'files' => true, 'enctype'=>'multipart/form-data']) !!}

<div class="panel panel-anaranja">
	<div class="panel-heading">
		<h3 class="panel-title"></h3>
	</div>
	<div class="panel-body">

		<div class="form-group">
			{!! Form::label('idarticulo','Articulo'); !!}
			{!! Form::select('idarticulo', $array_articulo, null, ['class' => 'form-control', 'placeholder' => '', 'required']) !!}
		</div>


	    <div class='form-group'>
	    	{!! Form::label('urlimagen','Selecione una imagen'); !!}
	        {!! Form::file('urlimagen',null); !!}
	    </div>

		<div class="form-group">
			<a class="btn btn-primary" href="{{ route('imagenes.create') }}" role="button"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Atras</a>

			{!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
		</div>

</div>

	{!! Form::close() !!}


</div>

</div>

@endsection