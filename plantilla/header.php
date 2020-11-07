<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Menú</title>

  <!-- Bootstrap -->
  <link href="../../Complementos_Plantilla/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../../Complementos_Plantilla/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../../Complementos_Plantilla/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../../Complementos_Plantilla/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="../../Complementos_Plantilla/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="../../Complementos_Plantilla/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="../../Complementos_Plantilla/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../../Complementos_Plantilla/build/css/custom.min.css" rel="stylesheet">

  <!-- Usamos el icono que se visualizara en el browser!-->
  <link rel="icon" type="image/x-svg" href="../../img/icono.svg">

  <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">

</head>

<?php

include '../../Conexion/conexion.php';

$ob = new Conexion();
$co = $ob->Conectar();

$usuario = $_SESSION['usuario'];
if ($usuario == "") {

  header('Location: ../../Vistas/Login/login.php');
} else {

  
  if ((time() - $_SESSION['tiempo']) > 60 * 60 * 1) {


    header('Location: ../../Controlador/Login/cerrar.php');
  } else {

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
                      <li><a href="../../Vistas/Menu/contenido_vista.php"><i class="fa fa-home"></i> Inicio</a></li>
                    </ul>

                  </div>
                  <div class="menu_section">
                    <h3>Mantenimientos</h3>
                    <ul class="nav side-menu">
                      <li><a><i class="fa fa-cogs"></i>Ajustes<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="../../Vistas/Medicos/listar.php">Médicos</a></li>
                          <li><a href="../../Vistas/Especialidades/listar.php">Especialidades</a></li>
                          <li><a href="project_detail.html">Project Detail</a></li>
                          <li><a href="contacts.html">Contacts</a></li>
                          <li><a href="profile.html">Profile</a></li>
                        </ul>
                      </li>
                      <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="page_403.html">403 Error</a></li>
                          <li><a href="page_404.html">404 Error</a></li>
                          <li><a href="page_500.html">500 Error</a></li>
                          <li><a href="plain_page.html">Plain Page</a></li>
                          <li><a href="login.html">Login Page</a></li>
                          <li><a href="pricing_tables.html">Pricing Tables</a></li>
                        </ul>
                      </li>                      
                      <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                    </ul>
                  </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
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
                        <a class="dropdown-item" href="javascript:;"> Profile</a>                     
                        <a class="dropdown-item" href="../../Controlador/Login/cerrar.php"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesión</a>
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
                                <li><a href="../../Vistas/Menu/contenido_vista.php"><i class="fa fa-home"></i> Inicio</a></li>

                              </ul>
                            </div>
                            <div class="menu_section">
                              <h3>Live On</h3>
                              <ul class="nav side-menu">
                                <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                                  <ul class="nav child_menu">
                                    <li><a href="e_commerce.html">E-commerce</a></li>
                                    <li><a href="projects.html">Projects</a></li>
                                    <li><a href="project_detail.html">Project Detail</a></li>
                                    <li><a href="contacts.html">Contacts</a></li>
                                    <li><a href="profile.html">Profile</a></li>
                                  </ul>
                                </li>
                                <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                                  <ul class="nav child_menu">
                                    <li><a href="page_403.html">403 Error</a></li>
                                    <li><a href="page_404.html">404 Error</a></li>
                                    <li><a href="page_500.html">500 Error</a></li>
                                    <li><a href="plain_page.html">Plain Page</a></li>
                                    <li><a href="login.html">Login Page</a></li>
                                    <li><a href="pricing_tables.html">Pricing Tables</a></li>
                                  </ul>
                                </li>
                                <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                                  <ul class="nav child_menu">
                                    <li><a href="#level1_1">Level One</a>
                                    <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                                      <ul class="nav child_menu">
                                        <li class="sub_menu"><a href="level2.html">Level Two</a>
                                        </li>
                                        <li><a href="#level2_1">Level Two</a>
                                        </li>
                                        <li><a href="#level2_2">Level Two</a>
                                        </li>
                                      </ul>
                                    </li>
                                    <li><a href="#level1_2">Level One</a>
                                    </li>
                                  </ul>
                                </li>
                                <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                              </ul>
                            </div>

                          </div>
                          <!-- /sidebar menu -->

                          <!-- /menu footer buttons -->
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
                                  <a class="dropdown-item" href="javascript:;"> Profile</a>
                                  <a class="dropdown-item" href="../../Controlador/Login/cerrar.php"><i class="fa fa-sign-out pull-right"></i>Cerrar Sesión</a>
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