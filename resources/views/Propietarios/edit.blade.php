@extends('layouts/app')
@section('contenido')

<br>

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar Propietario</h3>
        @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
            </ul>
        </div>
        @endif
        
        {!!Form::model($propietario,['method'=>'PATCH','route'=>['propietario.update',$propietario->idpropietario]])!!}
                         <!--12:39 8-36-->
            {{Form::token()}}
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="{{$propietario->nombre}}"/>
                </div>
            </div>
            
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <label for="DNI">DNI</label>
                <input type="text" name="dni"  class="form-control"  value="{{$propietario->dni}}"/>                
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" class="form-control"  value="{{$propietario->telefono}}"/>            
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{$propietario->email}}"/>            
            </div>

             <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <label for="oficina">Oficina</label>
                <input type="text" name="oficina" class="form-control" value="{{$propietario->oficina}}"/>            
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <label for="observaciones">Observaciones</label>
                <input type="text" name="observaciones" class="form-control"  value="{{$propietario->observaciones}}"/>            
            </div>           

             <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" style="margin-top: 15px;">
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <button class="btn btn-danger" type="reset">Cancelar</button>
                </div>
            </div>
        {!!Form::close()!!}
    </div>
</div>
@endsection