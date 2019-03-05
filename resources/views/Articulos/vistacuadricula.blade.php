@extends('Articulos/index')
@section('contenido1')

<?php
$to_time = time();
$cant = count($articulos) % 4;
$tot = (count($articulos)-$cant) /4;
if ($cant>0){$tot = $tot+1;}

?>
<?php 
for ($i = 0; $i < $tot; $i++) {
?>
 <div id="caja1" class="w3-row w3-grayscale">
    <?php 
    for ($j = 0; $j < 4; $j++) {
        $indice = $i*4+$j;
        if ($indice >= count($articulos)){break;}
        $art = $articulos[$indice];
        $imagetext = 'default.jpg';
        if (count($art->imagenes) > 0 ) {$imagetext = $art->imagenes->first()->thumbnail;}
    ?>
    <div id="images_main" class="w3-col l3 m6 s12">
      <div  class="w3-container">
        <div  class="w3-display-container">
          <img  src="{{ asset('storage/thumbnail/'.$imagetext) }}" width="220px" height="150px"></img>
          <div class="w3-display-middle w3-display-hover">
            {!! Form::open(array('url'=>'articulodetails','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
            {{ Form::hidden('value', $art->idarticulo) }}
            <button type="submit" class="w3-button w3-black">Ver Detalles</button>
            {{Form::close()}}
          </div>
       <!--   
          <div class="w3-display-topright w3-display-hover">
            <button  id="sendid"  class="w3-button w3-black infoU" data-id="{{ $art->idarticulo }}" data-target="#modify" data-toggle="modal"  onclick="document.getElementById('modify').style.display='block';"><i class="fa fa-edit"></i></button>
          </div>
      -->
        </div>
        <p>{{$art->nombre}}<br><b>{{$art->stock}}</b></p>
      </div> 
    </div> 
    <?php
    // Evaluando fin
     } ?>   
</div>
<?php
}
?>

@endsection
