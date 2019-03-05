@extends('layouts/app')
@section('contenido')


<style type="text/css">
  @media (max-width: 600px){
  #vista
    {
      padding-top: 100px;
    }
  }
</style>

<header class="w3-container w3-xlarge">
    <p class="w3-left">Inventario</p>
</header>

<div id="subscribe" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom w3-padding-large">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('subscribe').style.display='none'" class="fa fa-remove w3-button w3-xlarge w3-right w3-transparent"></i>
      <h2 class="w3-wide">Nuevo Producto</h2>
       @include('Articulos.crear')
    </div>
  </div>
</div>



<div class="w3-row w3-grayscale">
    <div class="container" align="w3-center" style="padding-left: 10px; margin-top: 8px;">
      <div class="w3-row-padding" style="margin:0 -14px;">
        <div class="w3-quarter" id="buscar1">
             <button class="w3-button w3-green w3-margin-bottom" onclick="document.getElementById('subscribe').style.display='block'">Nuevo Producto</button>
        </div>
        <div class="w3-threequarter" style="margin-top: 0px; text-align: left;">
             @include('Articulos.search')
        </div>
      </div>  
    </div>
</div>
<br>
 @yield('contenido1')
@endsection
  



