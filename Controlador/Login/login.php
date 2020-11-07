<?php

include '../../Conexion/conexion.php';
session_start();

$objeto = new Conexion();
$cn = $objeto->Conectar();

$user = $_POST['usuario'];
$pass = $_POST['password'];
$_SESSION['tiempo'] = time();


$sql = "SELECT * FROM tbl_usuario INNER JOIN tbl_rol ON tbl_usuario.ROL_ID = tbl_rol.ROL_ID WHERE tbl_usuario.USU_CORREO = '$user' and tbl_usuario.USU_CLAVE = '$pass' ";
$query = $cn->prepare($sql);
$query->execute();
$result = $query->fetchAll();
if (validarUsuario($user, $cn) == true) {
    foreach ($result as $res) {
        $rol = $res['ROL_ID'];
    }
    $_SESSION['usuario'] = $user;
    if (@$rol) {
        switch ($rol) {
            case ("1"):
                echo "<script>location.href='../../Vistas/Menu/contenido_vista.php'</script>";

                break;
            case ("2"): echo "<script>location.href='../../Vistas/Menu/contenido_vista.php'</script>";

                break;
        }
    } else {
        if ((isset($_SESSION['n'])) && (isset($_SESSION['usuario']))) {
            $dato = $_SESSION['usuario'];
            if ($dato === $user) {
                $_SESSION['n'] = $_SESSION['n'] + 1;
                $int = $_SESSION['n'];
                if ($int >= 5) {
                    //modificamos el estado del usuario
                    $sql1 = "update tbl_usuario set usu_estado='I' where usu_correo='$user'";
                    $querysql1 = $cn->prepare($sql1);
                    $querysql1->execute();
                    $mensaje2 = 'Lo sentimos, su usuario ha sido bloqueado';
                    echo "<script type='text/javascript'>alert('$mensaje2');</script>";
                    header('refresh:0.1;url=../../Vistas/Login/login.php');
                    limpiarSession();
                } else {
                    echo "<script type='text/javascript'>alert('$int intento, Usuario y/o Password Incorrecto');window.location= '../../Vistas/Login/login.php'</script>";
                    
                }
            } else {
                $_SESSION['n'] = 1;
                $_SESSION['usuario'] = $user;
                echo "<script type='text/javascript'>alert('Usuario  y/o Contraseña incorrecto');window.location= '../../Vistas/Login/login.php'</script>";
            }
        } else {
            $_SESSION['n'] = 1;
            $_SESSION['usuario'] = $user;
            echo "<script type='text/javascript'>alert('Usuario  y/o Contraseña incorrecto');window.location= '../../Vistas/Login/login.php'</script>";
        }
    }
} elseif (validarEstado($user, $cn) == true) {
	echo "<script type='text/javascript'>alert('El usuario esta inactivo, por favor comuniquese con el administrador');window.location= '../../Vistas/Login/login.php'</script>";
} elseif ($user == "" && $pass == "" ) {
	echo "<script type='text/javascript'>alert( 'Ingrese un usuario y/o una contraseña');window.location= '../../Vistas/Login/login.php'</script>";
}

else {
	echo "<script type='text/javascript'>alert('Usuario y/o Contraseña no existen');window.location= '../../Vistas/Login/login.php'</script>";
}

function validarUsuario($usu, $pdo2) {
    $sqlus = "SELECT * FROM tbl_usuario WHERE tbl_usuario.USU_CORREO='$usu' AND USU_ESTADO='A'";
    $querysqluser = $pdo2->prepare($sqlus);
    $querysqluser->execute();
    $numeroDeFilas = $querysqluser->rowCount();
    # Si son 0 o menos, significa que no existe
    if ($numeroDeFilas <= 0) {
        return false;
    } else {
        return true;
    }
}

function validarEstado($usu, $pdo2) {
	
	$sqlus =" SELECT * FROM	tbl_usuario	INNER JOIN tbl_rol	ON tbl_usuario.USU_ID = tbl_rol.USU_ID WHERE tbl_usuario.USU_CORREO = '$usu' AND tbl_usuario.USU_ESTADO = 'I'";
	$querysqluser = $pdo2->prepare($sqlus);
    $querysqluser->execute();
    $numeroDeFilas = $querysqluser->rowCount();
    # Si son 0 o menos, significa que no existe
    if ($numeroDeFilas <= 0) {
        return false;
    } else {
        return true;
    }
}

function limpiarSession() {
    unset($_SESSION['n']);
    unset($_SESSION['usuario']);
}

?>




