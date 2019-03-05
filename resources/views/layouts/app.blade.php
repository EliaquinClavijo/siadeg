<!DOCTYPE html>
<html>
<title>Sistema Almacen</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="{{ asset('css/app.css') }}" rel="stylesheet" />
<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
#imagen_view
{
   width:80%;
   margin-bottom:-6px;
}

#vista
    {
      padding-top: 15px;
    }

@media (max-width: 600px){
  
    
    #buscar1
    {
      text-align: center;
     
    }

    
    #imagen_view{
        width:100%;
        height: 200px;
      margin-bottom:-6px;
    }
    #imagen_view1{
        height: 60px;
      
    }
     #imagen_view2{
        height:70%;
        width:150%;
    }

    #button1{
  
        width: 160%;
    }
    #varios
    {
      padding-bottom: 8px;
    }
    #searchtext1
    {
      padding-right: 8px;
    }

}

@media (max-width: 600px){
    
    #images_main{
      text-align:center;
      align-items: center;
      justify-content: center;
      padding-left: 20px;
    
     #caja1{
      background-color:#fff;
      
    }
        
}


</style>
<body class="w3-content" style="max-width:1200px">



<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-collapse w3-top" style="z-index:3;width:250px; margin-top:15px;" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide"><b>Sis. Almacen</b></h3>
  </div>
  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
    <a href="#" class="w3-bar-item w3-button">Principal</a>
    <a href="#" class="w3-bar-item w3-button">Usuarios</a>
    <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block  w3-left-align" id="myBtn">
      Articulos
    </a>
    <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
      <a href="{{url('home')}}" class="w3-bar-item w3-button">Inventario</a>
      <a href="{{url('homecat')}}" class="w3-bar-item w3-button">Categorias</a>
      <a href="{{url('homeprov')}}" class="w3-bar-item w3-button">Proveedores</a>
      <a href="{{url('homeprop')}}" class="w3-bar-item w3-button">Propietarios</a>
      <a href="#" class="w3-bar-item w3-button">Control de vencimiento</a>
      <a href="{{url('reporteProductos')}}" class="w3-bar-item w3-button">Reporte Inventario</a>
    </div>
    <a href="#" class="w3-bar-item w3-button">Administracion</a>
   
  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <div class="w3-bar-item w3-padding-24 w3-wide">LOGO</div>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px">

  <!-- Push down content on small screens -->
  
  <!-- Top header -->
  
  <div id="vista" class="w3-container">
  @yield('contenido')
  </div>
  <!-- End page content -->
</div>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function () {

            $(".infoU").click(function (e) {
                var currID = $(this).attr("data-id");
                console.log(currID);
                var oModalEdit = $('#modify');
                oModalEdit.find('input[name="ID"]').val(currID);
                
                
            });
        });

</script>



<script type="text/javascript">



// Accordion 
function myAccFunc() {
  var x = document.getElementById("demoAcc");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}

// Click on the "Jeans" link on page load to open the accordion for demo purposes
document.getElementById("myBtn").click();


// Open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}




</script>

</body>
</html>
