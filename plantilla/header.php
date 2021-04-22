<?php

include_once '../../Modelo/conexion.php';
require_once '../../Controlador/GlobalFuntion.php';

$ob = new Conexion();
$co = $ob->Conectar();

$usuario = $_SESSION['usuario'];
if ($usuario == "") {

  header('Location: ../../Vistas/Login/login.php');
} else {

  //sino, calculamos el tiempo transcurrido
  $fechaGuardada = $_SESSION["ultimoAcceso"];
  $ahora = date("Y-n-j H:i:s");
  $tiempo_transcurrido = (strtotime($ahora) - strtotime($fechaGuardada));

  //comparamos el tiempo transcurrido

  if ($tiempo_transcurrido >= 280) {


    header('Location: ../../Controlador/Login/cerrar.php');
  } else {
    $_SESSION["ultimoAcceso"] = $ahora;
    $sql = "select * from tbl_usuario where USU_CORREO='$usuario'";
    $query = $co->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();


    foreach ($result as $res) {
      $rol = $res['ROL_ID'];
      $nombre = $res['USU_NOMBRES'];
      $apellidoP = $res['USU_P_PELLIDO'];
      $apellidoM = $res['USU_S_APELLIDO'];
    }



?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <!-- Meta, title, CSS, favicons, etc. -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>Menú</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">
      <!-- Bootstrap -->
      <link href="<?php echo SERVERURL ?>Complementos_Plantilla/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
      <!-- Font Awesome -->
      <link href="<?php echo SERVERURL ?>Complementos_Plantilla/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
      <!-- NProgress -->
      <link href="<?php echo SERVERURL ?>Complementos_Plantilla/vendors/nprogress/nprogress.css" rel="stylesheet">
      <!-- iCheck -->
      <link href="<?php echo SERVERURL ?>Complementos_Plantilla/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

      <!-- bootstrap-progressbar -->
      <link href="<?php echo SERVERURL ?>Complementos_Plantilla/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
      <!-- JQVMap -->
      <link href="<?php echo SERVERURL ?>Complementos_Plantilla/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
      <!-- bootstrap-daterangepicker -->
      <link href="<?php echo SERVERURL ?>Complementos_Plantilla/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

      <!-- Custom Theme Style -->
      <link href="<?php echo SERVERURL ?>Complementos_Plantilla/build/css/custom.min.css" rel="stylesheet">

      <!-- Usamos el icono que se visualizara en el browser!-->
      <link rel="icon" type="image/x-svg" href="<?php echo SERVERURL ?>img/icono.svg">

      <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">

      <link rel="stylesheet" href="<?php echo SERVERURL ?>Controlador/citas/calendario/css/fullcalendar.min.css">

      <link rel="stylesheet" href="<?php echo SERVERURL ?>PluginsReportes/datepicker/datepicker3.css">



    </head>

    <?php if ($rol == 1) { ?>

      <body class="nav-md">
        <div class="container body">
          <div class="main_container">
            <div class="col-md-3 left_col">
              <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                  <a href="index.html" class="site_title"><i class="fa fa-hospital-o"></i> <span>Administración</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <!-- <div class="profile clearfix">
                  <div class="profile_pic">
                    <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                  </div>
                  <div class="profile_info">
                    <span>Welcome,</span>
                    <h2>John Doe</h2>
                  </div>
                </div>
                 /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                  <div class="menu_section">

                    <h3>Inicio</h3>
                    <ul class="nav side-menu">
                      <li><a href="<?php echo SERVERURL ?>Vistas/Inicio/contenido_vista.php"><i class="fa fa-home"></i> Inicio</a></li>
                    </ul>

                  </div>
                  <div class="menu_section">
                    <h3>Mantenimientos</h3>
                    <ul class="nav side-menu">
                      <li><a><i class="fa fa-cogs"></i>Ajustes<span class="fa fa-chevron-down"></span></a>

                        <ul class="nav child_menu">
                          <li><a href="<?php echo SERVERURL ?>Vistas/Usuarios/listar.php">Usuarios</a></li>
                          <li><a href="<?php echo SERVERURL ?>Vistas/Medicos/listar.php">Médicos</a></li>
                          <li><a href="<?php echo SERVERURL ?>Vistas/Especialidades/listar.php">Especialidades</a></li>
                          <li><a href="<?php echo SERVERURL ?>Vistas/Horarios/listar.php">Horarios</a></li>
                          <li><a href="<?php echo SERVERURL ?>Vistas/Pacientes/listar.php">Pacientes</a></li>
                          <li><a href="<?php echo SERVERURL ?>Vistas/Citas/calendario.php">Citas</a></li>
                        </ul>
                      </li>
                      <li><a><i class="fa fa-file-archive-o"></i> Reportes <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="<?php echo SERVERURL ?>Vistas/Reportes/reporteCita.php">Citas</a></li>

                        </ul>
                      </li>
                    </ul>
                  </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons  -->
                <div class="sidebar-footer hidden-small">

                  <a data-toggle="tooltip" data-placement="top" title="Cerrar Sesión" href="<?php echo SERVERURL ?>Controlador/Login/cerrar.php">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                  </a>
                </div>
                <!-- /menu footer buttons -->
              </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
              <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                  <ul class=" navbar-right">
                    <li class="nav-item dropdown open" style="padding-left: 15px;">
                      <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                        <?php echo $nombre . ' ' . $apellidoP . ' ' . $apellidoM; ?>
                      </a>
                      <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo SERVERURL ?>Controlador/Login/cerrar.php"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesión</a>
                      </div>
                    </li>



                  </ul>
                </nav>
              </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col " id="contenido" role="main">
              <div class="">
              <?php } else {  ?>

                <body class="nav-md">
                  <div class="container body">
                    <div class="main_container">
                      <div class="col-md-3 left_col">
                        <div class="left_col scroll-view">
                          <div class="navbar nav_title" style="border: 0;">
                            <a href="index.html" class="site_title"><i class="fa fa-hospital-o"></i> <span>Recepción</span></a>
                          </div>

                          <div class="clearfix"></div>

                          <!-- menu profile quick info -->
                          <!-- <div class="profile clearfix">
                  <div class="profile_pic">
                    <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                  </div>
                  <div class="profile_info">
                    <span>Welcome,</span>
                    <h2>John Doe</h2>
                  </div>
                </div>
                 /menu profile quick info -->

                          <br />

                          <!-- sidebar menu -->
                          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                              <h3>Inicio</h3>
                              <ul class="nav side-menu">
                                <li><a href="<?php echo SERVERURL ?>Vistas/Inicio/contenido_vista.php"><i class="fa fa-home"></i> Inicio</a></li>
                              </ul>
                            </div>

                            <div class="menu_section">
                              <h3>Departamentos</h3>
                              <ul class="nav side-menu">
                                <li><a><i class="fa fa-cogs"></i>Acciones<span class="fa fa-chevron-down"></span></a>

                                  <ul class="nav child_menu">
                                    <li><a href="<?php echo SERVERURL ?>Vistas/Pacientes/listar.php">Pacientes</a></li>
                                    <li><a href="<?php echo SERVERURL ?>Vistas/Citas/calendario.php">Citas</a></li>
                                  </ul>
                                </li>
                                <li><a><i class="fa fa-file-archive-o"></i> Reportes <span class="fa fa-chevron-down"></span></a>
                                  <ul class="nav child_menu">
                                    <li><a href="<?php echo SERVERURL ?>Vistas/Reportes/reporteCita.php">Citas</a></li>

                                  </ul>
                                </li>
                              </ul>
                            </div>




                          </div>
                          <!-- /sidebar menu -->

                          <!-- /menu footer buttons 
                          <div class="sidebar-footer hidden-small">
                            <a data-toggle="tooltip" data-placement="top" title="Settings">
                              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Lock">
                              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </a>
                          </div>
                           /menu footer buttons -->
                        </div>
                      </div>

                      <!-- top navigation -->
                      <div class="top_nav">
                        <div class="nav_menu">
                          <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                          </div>
                          <nav class="nav navbar-nav">
                            <ul class=" navbar-right">
                              <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                  <?php echo $nombre . ' ' . $apellidoP . ' ' . $apellidoM; ?>
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="<?php echo SERVERURL ?>Controlador/Login/cerrar.php"><i class="fa fa-sign-out pull-right"></i>Cerrar Sesión</a>
                                </div>
                              </li>
                            </ul>
                          </nav>
                        </div>
                      </div>
                      <!-- /top navigation -->

                      <!-- page content -->
                      <div class="right_col" role="main">
                        <div class="">
                    <?php }
                }
              } ?>