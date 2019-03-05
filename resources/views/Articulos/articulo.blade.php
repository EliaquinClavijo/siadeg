@extends('layouts/app')
@section('contenido')
<?php
$art = $articulos[0];
$to_time = time();
$timeinminutes = round(abs($to_time - strtotime($art->created_at)) / 60,2);
$deprecat = round($art->porcent*$timeinminutes/525600,8). "%";
?>

<style type="text/css">
  @media (max-width: 600px){
  #vista
    {
      padding-top: 15px;
    }
  }
</style>
<div class="w3-main w3-white" style="margin-left:20px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:80px"></div>

  <!-- Slideshow Header -->
  <div class="w3-container" id="apartment">
    <h2 class="w3-text-grey">{{$art->nombre}}</h2>

    <?php
      $imag = $art->imagenes;
      for ($j = 0; $j < count($imag); $j++)
      {
    ?>
    <div class="w3-display-container mySlides">
    <img id="imagen_view" src="{{ asset('storage/'.$imag[$j]->urlimagen) }}"   width="700px" height="400px">
      <div class="w3-display-bottomleft w3-container w3-black">
        <button  id="sendid"  class="w3-button w3-black infoU" data-id="{{ $art->idarticulo }}" data-target="#modify" data-toggle="modal"  onclick="document.getElementById('modify').style.display='block';"><i class="fa fa-edit"></i></button>
      </div>
    </div>


    <?php
    }
    ?>
  </div>

  <div class="w3-row-padding w3-section">
    <?php
      $imag = $art->imagenes;
      for ($j = 0; $j < count($imag); $j++)
      {
    ?>
    <div class="w3-col s3">
      <img id="imagen_view1" class="demo w3-opacity w3-hover-opacity-off" src="{{ asset('storage/thumbnail/'.$imag[$j]->thumbnail) }}" width="400px" height="120px" style="width:100%;cursor:pointer" onclick="currentDiv(<?php echo($j+1);?>)" >
    </div>

    <?php
    }
    ?>
    <div class="w3-col s2">
      {!! Form::open(['route' => ['imagenes.store'], 'method' => 'POST' ,'class'=>"form-horizontal" ,'files' => true, 'enctype'=>'multipart/form-data']) !!}
      <label for="urlimagen">
      <img  type="file" name="path" id="imagen_view2" class="demo w3-opacity w3-hover-opacity-off" src="{{ asset('storage/newimage.png') }}" width="120px" height="120px" >
      </label>
      <input id="urlimagen" name="urlimagen" type="file" style="display: none;" />
      {{ Form::hidden('idarticulo',  $art->idarticulo) }}
      {!! Form::submit('Guardar', ['id'=>'button1' ,'class' => 'w3-button w3-block  w3-round-small w3-tiny w3-green']) !!}
      {!! Form::close() !!}
    </div>
  </div>

  <div class="w3-container">
    <h4><strong>Caracteristicas</strong></h4>
    <div class="w3-row w3-large">
      <div class="w3-col s6">
        <p><i class="fa fa-fw fa-file-text"></i> Categoria</p>
        <p><i class="fa fa-fw fa-archive"></i> Stock</p>
        <p><i class="fa fa-fw fa-money"></i> Precio</p>
        <p><i class="fa fa-fw fa-barcode"></i> Codigo Barras</p>
        <p><i class="fa fa-fw fa-exclamation-triangle"></i> Nivel Depreciacion</p>
      </div>
      <div class="w3-col s6">
        <p><i class="fa fa-fw fa-angle-right"></i>{{$art->categoria->nombre}}</p>
        <p><i class="fa fa-fw fa-angle-right"></i>{{$art->stock}}</p>
        <p><i class="fa fa-fw fa-angle-right"></i>{{$art->precio}}</p>
        <p><i class="fa fa-fw fa-angle-right"></i>{{$art->codpro}}</p>
        <p><i class="fa fa-fw fa-angle-right"></i>{{$deprecat}}</p>
      </div>
    </div>
    <hr>
    
    
    <h4><strong>Detalles</strong></h4>
    <p>{{$art->descr}}</p>
    <hr>
 
    
  </div>
  <hr>
  
<!-- End page content -->
</div>

<div id="modify" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom w3-padding-large">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('modify').style.display='none'" class="fa fa-remove w3-button w3-xlarge w3-right w3-transparent"></i>
      <h2 class="w3-wide">Editar Producto</h2>
      @include('Articulos.editar')
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(window).on('load',function(){
        document.getElementById('modify').style.display='block';
    });
</script>

<script>
// Script to open and close sidebar when on tablets and phones


// Slideshow Apartment Images
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
  }
  x[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " w3-opacity-off";
}
</script>

@endsection