@extends('layouts/app')
@section('contenido')


<header class="w3-container w3-xlarge">
    <p class="w3-left">Categorias</p>
    <p class="w3-right">
      <i class="fa fa-user w3-margin-right"></i>
      <i class="fa fa-search"></i>
    </p>
</header>



<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>
            <a href="newcat"><button class="btn btn-success">Nuevo</button></a>
        </h3>
        @include('Categorias.search')
    </div>
</div>
<div class="w3-responsive" align="center">
    <div class="col-lg-12 col-md-12 col-sm col-xs-12">
        <table class="table table-striped table-bordered table-condensed table-hover">
            <thead>
                <th>idcategoria</th>
                <th>nombre</th>
                <th>descripcion</th>
                 <th>condicion</th>
                 <th>opciones</th>
            </thead>
            @foreach($categorias as $cat)
            <tr>
                <td>{{$cat->idcategoria}}</td>
                <td>{{$cat->nombre}}</td>
                <td>{{$cat->descr}}</td>
                <td>{{$cat->condicion}}</td> 
                <td><a href="{{URL::action('CategoriaController@edit',$cat->idcategoria)}}"><button class="btn btn-info">Editar</button></a></td> 
            </tr>
            @endforeach
        </table>
        {{$categorias->render()}}
    </div>
</div>

@endsection
  



