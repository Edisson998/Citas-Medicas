<?php
require_once '../../Controlador/GlobalFuntion.php';
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <!--<meta name="viewport" content="width=decive-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0"> !-->
  <title>Ingreso al Sistema</title>
  <!-- Usamos los estilos de la carpeta css/login.css!-->
  <link rel="stylesheet" href="<?php echo SERVERURL?>css/login.css">
  <!-- Usamos el icono que se visualizara en el browser!-->
  <link rel="icon" type="image/x-svg" href="<?php echo SERVERURL?>img/icono.svg">
  <!--!-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>

<body>

  <form class="login" id="formlogin" action="<?php echo SERVERURL?>Controlador/Login/login.php" method="post" name="login">
    <h2>Centro Médico</h2>
    <img src="<?php echo SERVERURL ?>img/icono.svg">
    <input type="text" id="usuario" name="usuario" placeholder="Correo Electrónico" class="bordes" required />
    <input type="password" id="password" name="password" placeholder="Contraseña" class="bordes" />
    <input type="submit" id="btningresar" value="Ingresar"></input>

  </form>

  <script src="<?php echo SERVERURL ?>jquery/jquery-3.5.1.min.js"></script>

  <script src="<?php echo SERVERURL ?>sweetalert/sweetalert2.all.min.js"></script>

</body>

</html>