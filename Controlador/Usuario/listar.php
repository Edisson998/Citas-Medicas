<?php
require_once '../../Modelo/conexion.php';

$ob = new Conexion();
$con = $ob->Conectar();


$sql = "SELECT * FROM	tbl_usuario	INNER JOIN tbl_rol ON tbl_usuario.ROL_ID = tbl_rol.ROL_ID WHERE	USU_ESTADO = 'A'";
$que = $con->prepare($sql);
$que->execute();
$result = $que->fetchAll();

$usuario = array();

foreach ($result as $row) {
    $idUsu = $row['USU_ID'];
    $idRol= $row['ROL_ID'];
    $rolDes= $row['ROL_DESCRIPCION'];
    $usuCorreo = $row['USU_CORREO'];
    $usuClave = $row['USU_CLAVE'];
    $usuNombres = $row['USU_NOMBRES'];    
    $usuApellidoP = $row['USU_P_PELLIDO'];
    $usuApellidoM = $row['USU_S_APELLIDO'];
    $usuEstado = $row['USU_ESTADO'];
    if ($usuEstado = $row['USU_ESTADO'] == 'A') {

        $usuEstado = $row['USU_ESTADO'] = "<span class='badge badge-success'><i class='fa fa-check'></i> Activo</span>";
    }
    $cregistro = $row['USU_CREACION_REGISTRO'];   
   
   

    $usuario[] = array(
        'USU_ID' => $idUsu,
        'ROL_ID' => $idRol,
        'ROL_DESCRIPCION' => $rolDes,
        'USU_CORREO' => $usuCorreo,
        'USU_CLAVE' => $usuClave,
        'USU_NOMBRES' => $usuNombres,
        'USU_P_PELLIDO' => $usuApellidoP,
        'USU_S_APELLIDO' => $usuApellidoM,
        'USU_ESTADO' => $usuEstado,
        'USU_CREACION_REGISTRO' => $cregistro
    );
}

$con = null;
$data["data"] = $usuario;
$resultadoJson = json_encode($data);
echo $resultadoJson;
