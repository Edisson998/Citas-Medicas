<?php

include '../mensajes_error/configuracion.php';
session_start();
$_SESSION['usuario'] = "";


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Error 403 </title>

    <!-- Bootstrap -->
    <link href="<?php echo SERVERURL ?>Complementos_Plantilla/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo SERVERURL ?>Complementos_Plantilla/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo SERVERURL ?>Complementos_Plantilla/vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo SERVERURL ?>Complementos_Plantilla/build/css/custom.min.css" rel="stylesheet">

    <!-- Usamos el icono que se visualizara en el browser!-->
   <link rel="icon" type="image/x-svg" href="../../img/icono.svg">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- page content -->
        <div class="col-md-12">
          <div class="col-middle">
            <div class="text-center text-center">
              <h1 class="error-number">403</h1>
              <h2>Acceso Denegado</h2>
              <p>Se requiere autenticación completa para acceder a este recurso. 
                <br><br>
                <a href="#" class="btn btn-info"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Volver</a>
              </p>
             
            </div>
          </div>
        </div>
        <!-- /page content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo SERVERURL ?>Complementos_Plantilla/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="<?php echo SERVERURL ?>Complementos_Plantilla/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo SERVERURL ?>Complementos_Plantilla/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo SERVERURL ?>Complementos_Plantilla/vendors/nprogress/nprogress.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo SERVERURL ?>Complementos_Plantilla/build/js/custom.min.js"></script>
  </body>
</html>