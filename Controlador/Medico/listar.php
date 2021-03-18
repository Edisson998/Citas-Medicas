<?php
require_once '../../Modelo/conexion.php';

$ob = new Conexion();
$con = $ob->Conectar();


$sql = "SELECT * FROM tbl_medico INNER JOIN tbl_especialidades ON tbl_medico.ESP_ID = tbl_especialidades.ESP_ID WHERE	MED_ESTADO = 'A'";
$que = $con->prepare($sql);
$que->execute();
$result = $que->fetchAll();

$medico = array();

foreach ($result as $row) {
    $id = $row['MED_ID'];
    $nombres = $row['MED_NOMBRES'];
    $apellidoP = $row['MED_P_APELLIDO'];
    $apellidoM = $row['MED_S_APELLIDO'];
    //$t_dni = $row['MED_TIPO_DNI'];        
    if ($t_dni = $row['MED_TIPO_DNI'] == 'C') {
        $t_dni = $row['MED_TIPO_DNI'] = 'Cédula';
    } elseif ($t_dni = $row['MED_TIPO_DNI'] == 'P') {
        $t_dni = $row['MED_TIPO_DNI'] = 'Pasaporte';
    } else {
        $t_dni = $row['MED_TIPO_DNI'] = 'RUC';
    }
    $dni = $row['MED_DNI'];
    $espeid = $row['ESP_ID'];
    $espedes = $row['EP_DESCRIPCION'];
    $genero = $row['MED_GENERO'];
    if ($genero = $row['MED_GENERO'] == 'F') {
        $genero = $row['MED_GENERO'] = 'Femenino';
    } else {
        $genero = $row['MED_GENERO'] = 'Masculino';
    }
    $f_naci = $row['MED_FECHA_NAC'];
    $dir = $row['MED_DIRECCION'];
    $correo = $row['MED_CORREO'];
    $tel = $row['MED_TELEFONO'];
    $estado = $row['MED_ESTADO'];
    if ($estado = $row['MED_ESTADO'] == 'A') {

        $estado = $row['MED_ESTADO'] = "<span class='badge badge-success'><i class='fa fa-check'></i> Activo</span>";
    }

    $medico[] = array(
        'MED_ID' => $id,
        'MED_NOMBRES' => $nombres,
        'MED_P_APELLIDO' => $apellidoP,
        'MED_S_APELLIDO' => $apellidoM,
        'MED_TIPO_DNI' => $t_dni,
        'MED_DNI' => $dni,
        'ESP_ID' => $espeid,
        'EP_DESCRIPCION' => $espedes,
        'MED_GENERO' => $genero,
        'MED_FECHA_NAC' => $f_naci,
        'MED_DIRECCION' => $dir,
        'MED_CORREO' => $correo,
        'MED_TELEFONO' => $tel,
        'MED_ESTADO' => $estado
    );
}

$con = null;
$data["data"] = $medico;
$resultadoJson = json_encode($data);
echo $resultadoJson;
