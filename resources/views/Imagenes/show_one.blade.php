<?php 
$name = "defaul.jpg";
if  (count($imagenes)>0)
{
	$name = $imagenes[0]->urlimagen;
}
?>
<img src="{{ asset('storage/'.$name) }}" WIDTH="150px" height="200px"></img>