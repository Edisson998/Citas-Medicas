<?php session_start();
if(isset($_SESSION['usuario']) !== ""){
	header('Location: ../../Vistas/Menu/contenido_vista.php');
}else{
	header('Location: ../../Vistas/Loginlogin.php');
}
?>