
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
        
        <p></p>

        {!!Form::open(array('url'=>'articulo','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
        {{Form::token()}}
        
            <p><input type="text" name="codpro"  class="w3-input w3-border" placeholder="Codigo de Barras (Prueba)"/></p>               
            
            
            <p><input type="text" name="nombre" class="w3-input w3-border" placeholder="Nombre del Producto"/></p>
                
            
            <select name="idcategoria" class="w3-input w3-border">
                        @foreach($categorias as $cat)
                        <option value="{{$cat->idcategoria}}">
                            {{$cat->nombre}}
                        </option>
                        @endforeach
            </select>
        
            
            <p style="margin-top: 10px;"><input type="text" name="descr"  class="w3-input w3-border" placeholder="Descripcion del producto"/></p>

            <p><input type="number" name="stock" class="w3-input w3-border" placeholder="Stock"/></p>                
            
            <p><input type="number" name="precio" class="w3-input w3-border" placeholder="Precio"/></p>               
            
            
            <p><input type="number" name="porcent" class="w3-input w3-border" placeholder="Porcentaje de Depreciacion anual"/></p>                
            
            <div class="w3-input w3-border">
            {!! Form::label('estado','¿Activar ?', ['class' => 'col-sm-2 control-label']); !!}
            <div class="col-sm-12">
                {!! Form::radio('estado', '1') !!} Si &nbsp;&nbsp;&nbsp;
                {!! Form::radio('estado', '0') !!} No
            </div>
            </div>
            <br>
  
             <button type="submit" class="w3-button w3-padding-large w3-green w3-margin-bottom" onclick="document.getElementById('subscribe').style.display='none'">Guardar</button> 

        {!!Form::close()!!}

