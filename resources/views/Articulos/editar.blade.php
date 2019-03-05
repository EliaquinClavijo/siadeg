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

    
{!!Form::model($art,['method'=>'PATCH','route'=>['articulo.update',$art->idarticulo],'files'=>'true'])!!}
        {{Form::token()}}

        <p><input type="text" name="codpro"  class="w3-input w3-border" required value="{{$art->codpro}}"/></p> 

        <p><input type="text" name="nombre" class="w3-input w3-border" required value="{{$art->nombre}}"/></p> 
            
        <div class="form-group">
                    <select name="idcategoria" class="w3-input w3-border">
                        @foreach($categorias as $cat)
                            @if($cat->idcategoria == $art->idcategoria)
                                <option value="{{$cat->idcategoria}}" selected>
                                    {{$cat->nombre}}
                                </option>
                            @else
                                <option value="{{$cat->idcategoria}}">
                                    {{$cat->nombre}}
                                </option>
                            @endif
                        
                        @endforeach
                    </select>
        </div>
        <p style="margin-top: 10px;"><input type="text" name="descr"  class="w3-input w3-border" required value="{{$art->descr}}"/></p>

        <p><input type="number" name="stock" class="w3-input w3-border" required value="{{$art->stock}}"/></p>                
            
        <p><input type="number" name="precio" class="w3-input w3-border" required value="{{$art->precio}}"/></p>               
            
            
        <p><input type="number" name="porcent" class="w3-input w3-border" required value="{{$art->porcent}}"/></p>                
            
        <div class="w3-input w3-border">
            {!! Form::label('estado','¿Activar ?', ['class' => 'col-sm-2 control-label']); !!}
        <div class="col-sm-12" align="center">
                {!! Form::radio('estado', '1') !!} Si &nbsp;&nbsp;&nbsp;
                {!! Form::radio('estado', '0') !!} No
        </div>
        </div>
        <br>
  
        <button type="submit" class="w3-button w3-padding-large w3-green w3-margin-bottom" onclick="document.getElementById('subscribe').style.display='none'">Guardar</button>     

            
                       
{!!Form::close()!!}