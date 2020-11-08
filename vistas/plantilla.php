<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Respuestos mundiales</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" href="vistas/img/plantilla/logotipo.png">

   <!--=====================================
  PLUGINS DE CSS
  ======================================-->

  <!-- Bootstrap 3.3.7 -->
  <!-- <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css"> -->
  <!-- <link rel="stylesheet" href="vistas/dist/css/publico/fontawesome.css"> -->
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css"> -->

  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">
  
  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->

  <!-- style publico -->
  <link rel="stylesheet" href="vistas/dist/css/publico/owl.carousel.min.css">
  <link rel="stylesheet" href="vistas/dist/css/publico/owl.theme.default.min.css">
  <link rel="stylesheet" href="vistas/dist/css/publico/main.css">
  <link rel="stylesheet" href="vistas/dist/css/publico/all.css">
  <link rel="stylesheet" href="vistas/dist/css/publico/fontawesome.css">

   <!-- DataTables -->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="vistas/plugins/iCheck/all.css">

   <!-- Daterange picker -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.css">

  <!-- Morris chart -->
  <link rel="stylesheet" href="vistas/bower_components/morris.js/morris.css">

  <!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->

  <!-- jQuery 3 -->
  <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
  
  <!-- Bootstrap 3.3.7 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <!-- <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->

  <!-- FastClick -->
  <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>
  
  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.min.js"></script>

  <!-- DataTables -->
  <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

  <!-- SweetAlert 2 -->
  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
   <!-- By default SweetAlert2 doesn't support IE. To enable IE 11 support, include Promise polyfill:-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

  <!-- iCheck 1.0.1 -->
  <script src="vistas/plugins/iCheck/icheck.min.js"></script>

  <!-- InputMask -->
  <script src="vistas/plugins/input-mask/jquery.inputmask.js"></script>
  <script src="vistas/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="vistas/plugins/input-mask/jquery.inputmask.extensions.js"></script>

  <!-- jQuery Number -->
  <script src="vistas/plugins/jqueryNumber/jquerynumber.min.js"></script>

  <!-- daterangepicker http://www.daterangepicker.com/-->
  <script src="vistas/bower_components/moment/min/moment.min.js"></script>
  <script src="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- Morris.js charts http://morrisjs.github.io/morris.js/-->
  <script src="vistas/bower_components/raphael/raphael.min.js"></script>
  <script src="vistas/bower_components/morris.js/morris.min.js"></script>

  <!-- ChartJS http://www.chartjs.org/-->
  <script src="vistas/bower_components/Chart.js/Chart.js"></script>


</head>

<!--=====================================
CUERPO DOCUMENTO
======================================-->

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page">
  <div class="spinner-cover">
		<div class="spinner-inner">
			<div class="spinner">
			  <div class="rect1"></div>
			  <div class="rect2"></div>
			  <div class="rect3"></div>
			  <div class="rect4"></div>
			  <div class="rect5"></div>
			</div>
		</div>
	</div>
	<div class="spinner-cover">
		<div class="spinner-inner">
			<div class="spinner">
			  <div class="rect1"></div>
			  <div class="rect2"></div>
			  <div class="rect3"></div>
			  <div class="rect4"></div>
			  <div class="rect5"></div>
			</div>
		</div>
  </div>
 
  <?php

  if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){

   echo '<div class="wrapper">';

    /*=============================================
    CABEZOTE
    =============================================*/

    include "modulos/cabezote.php";

    /*=============================================
    MENU
    =============================================*/

    include "modulos/menu.php";

    /*=============================================
    CONTENIDO
    =============================================*/

    if(isset($_GET["ruta"])){

      if($_GET["ruta"] == "inicio" ||
         $_GET["ruta"] == "usuarios" ||
         $_GET["ruta"] == "categorias" ||
         $_GET["ruta"] == "productos" ||
         $_GET["ruta"] == "ejemplo" ||
         $_GET["ruta"] == "clientes" ||
         $_GET["ruta"] == "ventas" ||
         $_GET["ruta"] == "crear-venta" ||
         $_GET["ruta"] == "editar-venta" ||
         $_GET["ruta"] == "reportes" ||
         $_GET["ruta"] == "salir"){

        include "modulos/".$_GET["ruta"].".php";

      }else{

        include "modulos/404.php";

      }

    }else{

      include "modulos/inicio.php";

    }

    /*=============================================
    FOOTER
    =============================================*/

    include "modulos/footer.php";

    echo '</div>';

  }else{

    if(isset($_GET["ruta"])){
      if($_GET["ruta"] == "inicio" ||
        $_GET["ruta"] == "productos" ||
        $_GET["ruta"] == "servicios" ||
        $_GET["ruta"] == "nosotros" ||
        $_GET["ruta"] == "blog" ||
        $_GET["ruta"] == "contactanos" ||
        $_GET["ruta"] == "carrito" ||
        $_GET["ruta"] == "checkout" ||
        $_GET["ruta"] == "blog1" ||
        $_GET["ruta"] == "blog2"){
        include "modulos/publico/header.php";
        include "modulos/publico/".$_GET["ruta"].".php";
        include "modulos/publico/footer.php";
      } else {
        if ($_GET["ruta"] == "login") {
          include "modulos/login.php";
        } else{
          include "modulos/404.php";
        }
      }
    } else {
      include "modulos/publico/header.php";
      include "modulos/publico/inicio.php";
      include "modulos/publico/footer.php";
    }
  }

  ?>


  <script src="vistas/js/plantilla.js"></script>
  <script src="vistas/js/usuarios.js"></script>
  <script src="vistas/js/categorias.js"></script>
  <script src="vistas/js/productos.js"></script>
  <script src="vistas/js/clientes.js"></script>
  <script src="vistas/js/ventas.js"></script>
  <script src="vistas/js/reportes.js"></script>

  <script src="vistas/dist/js/publico/owl.carousel.min.js"></script>
  <script src="vistas/dist/js/publico/main.js"></script>

  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEJB50fEW1KSVljAMhJvBSTjdaR5JlgpA&callback=initMap""
  type="text/javascript"></script>

  <script>
    var map;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 4.736312, lng: -74.089197},
            zoom: 18
        });

        var marker = new google.maps.Marker({
          position: {lat: 4.736312, lng: -74.089197},
          map: map,
	        title: 'Repuestos mundiales'
        });
    }

  </script>

</body>
</html>
