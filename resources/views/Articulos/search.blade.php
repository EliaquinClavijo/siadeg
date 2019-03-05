{!! Form::open(array('url'=>'articulo','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}

<div class="w3-row">
<div class="w3-quarter" style="padding-right:7px;" id="varios">
	<div class="w3-row">
		<div class="w3-half" style="padding-right:7px;" id="varios">
  			<select name="view" class="w3-input w3-border">
                        <option value="Tabla">Vista Tabla</option>
                        <option value="Cuadricula">Vista Cuadricula</option>                    
      </select>
  			
  		</div>
		<div class="w3-half">
	 <select name="type" class="w3-input w3-border">
                        <option value="idarticulo">Codigo</option>
                        <option value="nombre">Nombre</option>
                        <option value="descr">Descripcion</option>            
      </select>
  		</div>
  		
  	</div>
</div>
<div class="w3-half" id="searchtext1">
<input type="text" id="searchText" name="searchText" placeholder="Search..."  class="w3-input w3-border" >
</div>
<div class="w3-quarter"  id="buscar1" >
<button class="w3-round w3-button" type="submit"><i class="fa fa-search"></i></button>	
</div>
</div>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script type="text/javascript">
  $(window).on('load',function(){
        console.log("here.");
        document.getElementById('searchText').focus();
    });
</script>
{{Form::close()}}
