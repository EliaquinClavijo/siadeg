@extends('layouts/app')
@section('contenido')

<br>

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar Categoria</h3>
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
        
        {!!Form::model($categoria,['method'=>'PATCH','route'=>['categoria.update',$categoria->idcategoria]])!!}
                         <!--12:39 8-36-->
            {{Form::token()}}
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="{{$categoria->nombre}}"/>
                </div>
            </div>
            
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <label for="descr">descripcion</label>
                <input type="text" name="descr"  class="form-control" value="{{$categoria->descr}}"/>                
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <label for="condicion">condicion</label>
                <input type="text" name="condicion" class="form-control" value="{{$categoria->condicion}}"/>                
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