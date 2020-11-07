<?php

$db = mysqli_connect("localhost", "root", "", "citasmedicas");
$sql = "SELECT * FROM tbl_especialidades  WHERE	ESP_ESTADO = 'A'";
mysqli_set_charset($db, "utf8");
if (!$result = mysqli_query($db, $sql)) die("No se encontraron datos ");
$especialidades = array();
while ($row = mysqli_fetch_array($result)) {
    $id = $row['ESP_ID'];
    $descripcion = $row['EP_DESCRIPCION'];   
    $estado = $row['ESP_ESTADO'];
    if ( $estado = $row['ESP_ESTADO'] == 'A') {

        $estado = $row['ESP_ESTADO'] = "<span class='badge badge-success'><i class='fa fa-check'></i> Activo</span>";
    }    
    $especialidades[]=array( 'ESP_ID'=>$id,
                     'EP_DESCRIPCION'=>$descripcion,                     
                     'ESP_ESTADO'=>$estado);
}
mysqli_close($db);
$data["data"]= $especialidades;
$resultadoJson=json_encode($data);
echo $resultadoJson;