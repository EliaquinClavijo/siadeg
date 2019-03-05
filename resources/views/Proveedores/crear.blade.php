@extends('layouts/app')
@section('contenido')

<br>

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Nuevo Proveedor</h3>
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
        
        {!!Form::open(array('url'=>'proveedor','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
        {{Form::token()}}
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre..."/>
                </div>
            </div>
            
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <label for="ruc">RUC</label>
                <input type="text" name="ruc"  class="form-control" placeholder="ruc..."/>                
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" class="form-control" placeholder="telefono..."/>            
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" placeholder="email..."/>            
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <label for="observaciones">Observaciones</label>
                <input type="text" name="observaciones" class="form-control" placeholder="observaciones..."/>            
            </div>

            
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" style="margin-top: 15px;">
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <button class="btn btn-danger" type="reset">Cancelar</button>
                </div>
            </div>
        </div>            
        {!!Form::close()!!}
    </div>
</div>
@endsection