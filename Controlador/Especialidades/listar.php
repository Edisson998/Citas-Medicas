<?php

require_once '../../Modelo/conexion.php';

$ob = new Conexion();
$con = $ob->Conectar();

$sql = "SELECT * FROM tbl_especialidades  WHERE	ESP_ESTADO = 'A'";
$que = $con->prepare($sql);
$que->execute();
$result = $que->fetchAll();

$especialidades = array();

foreach ($result as $row) {
    $id = $row['ESP_ID'];
    $descripcion = $row['EP_DESCRIPCION'];
    $estado = $row['ESP_ESTADO'];
    if ($estado = $row['ESP_ESTADO'] == 'A') {

        $estado = $row['ESP_ESTADO'] = "<span class='badge badge-success'><i class='fa fa-check'></i> Activo</span>";
    }
    $especialidades[] = array(
        'ESP_ID' => $id,
        'EP_DESCRIPCION' => $descripcion,
        'ESP_ESTADO' => $estado
    );
}
$con = null;
$data["data"] = $especialidades;
$resultadoJson = json_encode($data);
echo $resultadoJson;
