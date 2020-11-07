<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <!--<meta name="viewport" content="width=decive-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0"> !-->
  <title>Ingreso al Sistema</title>
  <!-- Usamos los estilos de la carpeta css/login.css!-->
  <link rel="stylesheet" href="../../css/login.css">
  <!-- Usamos el icono que se visualizara en el browser!-->
  <link rel="icon" type="image/x-svg" href="../../img/icono.svg">  
  <!--!-->
 <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>

<body>
  <form class="login" id="formlogin" action="../../Controlador/Login/login.php" method="post" name="login">
    <h2>Centro Médico</h2>
    <img src="../../img/icono.svg">
    <input type="text" id="usuario" name="usuario" placeholder="Usuario" class="bordes" autofocus />
    <input type="password" id="password" name="password" placeholder="Contraseña" class="bordes" />
    <input type="submit" id="btningresar" value="Ingresar"></input>
    <?php  if(!empty($errores)): ?>
          <ul>
          <span class="badge badge-pill badge-danger"><?php echo $errores; ?></span>
          </ul>
        <?php  endif; ?>
  </form>

  <script src="../../jquery/jquery-3.5.1.min.js"></script>
  
  <script src="../../sweetalert/sweetalert2.all.min.js"></script>

</body>

</html>