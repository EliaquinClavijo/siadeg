@extends('Articulos/index')
@section('contenido1')

<?php
$to_time = time();
$cant = count($articulos);
?>

<div class="w3-responsive" align="center">
<table class="table w3-table-all table-striped">

<thead>
<tr>
  <th>Codigo</th>
  <th>Nombre</th>
  <th>Stock</th>
  <th>Precio/u</th>
  <th>Precio/t</th>
  <th>Codigo Barras</th>
  <th>Estado</th>
  <th>Imagen</th>
  <th>Detalle</th>
</tr>
</thead>
@if($articulos)
 @foreach ($articulos as $art)
<?php 
	$timeinminutes = round(abs($to_time - strtotime($art->created_at)) / 60,2);
	$deprecat = round($art->porcent*$timeinminutes/525600,8);
	if (($deprecat) < 25){$deprecat = "BUENO";}
	if ( ($deprecat) < 60 and 25 < ($deprecat)){$deprecat = "MEDIO";}
	if (($deprecat) > 60){$deprecat = "ALERTA";}
	$imagetext = 'default.jpg';
    if (count($art->imagenes) > 0 ) {$imagetext = $art->imagenes->first()->thumbnail;}
?>
<tr>
  <td>{{$art->idarticulo}}</td>
  <td>{{$art->nombre}}</td>
  <td>{{$art->stock}}</td>
  <td>{{$art->precio}}</td>
  <td>{{$art->precio*$art->stock}}</td>
  <td>{{$art->codpro}}</td>
  <td>{{$deprecat}}</td>
  <td>
  	 <img  src="{{ asset('storage/thumbnail/'.$imagetext) }}" width="50px" height="30px"></img>
  </td>
  <td >
  	 {!! Form::open(array('url'=>'articulodetails','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
            {{ Form::hidden('value', $art->idarticulo) }}
            <button  type="submit" class="w3-button" style="font-size:20px;" align="center"><i class="fa fa-arrow-circle-o-right"></i></button>
      {{Form::close()}}
  	
  </td>
</tr>
@endforeach
@else
      
@endif
</table>
{!! $articulos->links() !!} 	
</div>
@endsection


