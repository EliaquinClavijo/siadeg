@extends('layouts/app')
@section('contenido')


<header class="w3-container w3-xlarge">
    <p class="w3-left">Propietarios</p>
    <p class="w3-right">
      <i class="fa fa-user w3-margin-right"></i>
      <i class="fa fa-search"></i>
    </p>
</header>



<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>
            <a href="newprop"><button class="btn btn-success">Nuevo</button></a>
        </h3>
        @include('Propietarios.search')
    </div>
</div>
<div class="w3-responsive" align="center">
    <div class="col-lg-12 col-md-12 col-sm col-xs-12">
        <table class="table table-striped table-bordered table-condensed table-hover">
            <thead>
                <th>idpropietario</th>
                <th>nombre</th>
                <th>DNI</th>
                 <th>telefono</th>
                 <th>email</th>
                 <th>oficina</th>
                 <th>observaciones</th>
                 <th>opciones</th>
            </thead>
            @foreach($propietarios as $prop)
            <tr>
                <td>{{$prop->idpropietario}}</td>
                <td>{{$prop->nombre}}</td>
                <td>{{$prop->dni}}</td>
                <td>{{$prop->telefono}}</td> 
                <td>{{$prop->email}}</td> 
                <td>{{$prop->oficina}}</td> 
                <td>{{$prop->observaciones}}</td> 
                <td><a href="{{URL::action('PropietarioController@edit',$prop->idpropietario)}}"><button class="btn btn-info">Editar</button></a></td> 
            </tr>
            @endforeach
        </table>
        {{$propietarios->render()}}
    </div>
</div>

@endsection
  



