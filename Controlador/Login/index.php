<?php session_start();
if (isset($_SESSION['usuario'])){
	header('Location: ../../Vistas/Login/CenterMedicine.php');
}else{
	header('Location: login.php');
}	
?>