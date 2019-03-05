@extends('layouts/app')
@section('contenido')


<header class="w3-container w3-xlarge">
    <p class="w3-left">Proveedores</p>
    <p class="w3-right">
      <i class="fa fa-user w3-margin-right"></i>
      <i class="fa fa-search"></i>
    </p>
</header>



<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>
            <a href="newprov"><button class="btn btn-success">Nuevo</button></a>
        </h3>
        @include('Proveedores.search')
    </div>
</div>
<div class="w3-responsive" align="center">
    <div class="col-lg-12 col-md-12 col-sm col-xs-12">
        <table class="table table-striped table-bordered table-condensed table-hover">
            <thead>
                <th>idproveedor</th>
                <th>nombre</th>
                <th>ruc</th>
                 <th>telefono</th>
                 <th>email</th>
                 <th>observaciones</th>
                 <th>opciones</th>
            </thead>
            @foreach($proveedores as $prov)
            <tr>
                <td>{{$prov->idproveedor}}</td>
                <td>{{$prov->nombre}}</td>
                <td>{{$prov->ruc}}</td>
                <td>{{$prov->telefono}}</td> 
                <td>{{$prov->email}}</td> 
                <td>{{$prov->observaciones}}</td> 
                <td><a href="{{URL::action('ProveedorController@edit',$prov->idproveedor)}}"><button class="btn btn-info">Editar</button></a></td> 
            </tr>
            @endforeach
        </table>
        {{$proveedores->render()}}
    </div>
</div>

@endsection
  



