<?php 
session_start();
//Limpiamos la sesion 
header('Location: ../../Vistas/Login/login.php');
$_SESSION['usuario'] = "";



?>