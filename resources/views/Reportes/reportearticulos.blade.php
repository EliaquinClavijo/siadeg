<!DOCTYPE html>
<html>
<?php
$to_time = time();
?>
  <head>
    <style type="text/css">
      
.table5
{
    width:680px;
    border-radius: 0.3em;
    overflow: hidden;
    box-shadow: 0px 0px 0px black;
    border-collapse:collapse;
    border-spacing:0;
    margin-top: 3px;
    
}

.table5 td
{
  border: 1px solid #9F9E9E;
  
}

.table5-1 td
{
  text-align: center; 
  vertical-align: middle;
  font-size: 12px;
  background-color:#ddd;
}

.table5-2 td
{
  font-size: 10px;
}


    </style>
    <meta charset="utf-8">
    <title>Index Page</title>
  </head>
  <body>
    <script type="text/php">
    if (isset($pdf)) {
                $x = 485;
                $y = 30;
                $text = " Pagina {PAGE_NUM} / {PAGE_COUNT}";
                echo $text;
                $font = null;
                $size = 12;
                $color = array(0,0,0);
                $word_space = 0.0;  //  default
                $char_space = 0.0;  //  default
                $angle = 0.0;   //  default
                $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
            }
  </script>

  <table  class="table5" align="center">
    <tbody>
      <tr class="table5-1">
        <td style="width: 20%;"><font color="#990000"><span style="font-weight:bold">CodProducto</span></font></td>
        <td style="width: 20%;"><font color="#990000"><span style="font-weight:bold">Descripcion.</span></font></td>
        <td style="width: 20%;"><font color="#990000"><span style="font-weight:bold">Precio</span></font></td>
        <td style="width: 20%;"><font color="#990000"><span style="font-weight:bold">Time in stock</span></font></td>
        <td style="width: 20%;"><font color="#990000"><span style="font-weight:bold">Depreciacion  </span></font></td>
    </tbody>
</table>

<table class="table5" align="center">
        
    <tbody>
            @foreach($articulos as $art)
            <tr class="table5-2">
                <td align="center" style="width: 20%;">{{$art->codpro}}</td>
                <td align="center" style="width: 20%;">{{$art->descr}}</td>
                <td align="center" style="width: 20%;">{{$art->precio}}</td>
                <?php
                $from_time = strtotime($art->created_at);
                $minutes = round(abs($to_time - $from_time) / 60,2). " minute";
                $val = round(abs($to_time - $from_time) / 60,2);
                ?>
                <td align="center" style="width: 20%;">{{$minutes}}</td>
                <td align="center" style="width: 20%;">{{round(($art->porcent)*$val/525600,8). "%"}}</td>   
            </tr>
    @endforeach
    </tbody>
</table>
  </div>
  </body>
</html>