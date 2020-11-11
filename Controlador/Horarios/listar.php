<?php

$db = mysqli_connect("localhost", "root", "", "citasmedicas");
$sql = "SELECT * FROM	tbl_horario	INNER JOIN tbl_medico ON tbl_horario.MED_ID = tbl_medico.MED_ID WHERE HOR_ESTADO = 'A'";
mysqli_set_charset($db, "utf8");
if (!$result = mysqli_query($db, $sql)) die("No se encontraron datos ");
$horarios = array();
while ($row = mysqli_fetch_array($result)) {
    $id = $row['HOR_ID'];
    $idMed = $row['MED_ID'];
    $nombreMed = $row['MED_NOMBRES'] . ' ' . $row['MED_P_APELLIDO'];
    $hfecha = $row['HOR_DIAS'];
    $hingreso = $row['HOR_INGRESO'];   
    $hsalida = $row['HOR_SALIDA'];      
    $hestado= $row['HOR_ESTADO'];
    if ( $hestado = $row['HOR_ESTADO'] == 'A') {

        $hestado = $row['HOR_ESTADO'] = "<span class='badge badge-success'><i class='fa fa-check'></i> Activo</span>";
    }    
    $horarios[]=array( 'HOR_ID'=>$id,
                     'MED_ID'=>$idMed, 
                     'MED_NOMBRES' =>$nombreMed,
                     'HOR_DIAS'=>$hfecha,
                     'HOR_INGRESO'=>$hingreso,                    
                     'HOR_SALIDA'=>$hsalida,                     
                     'HOR_ESTADO'=>$hestado);
}
mysqli_close($db);
$data["data"]= $horarios;
$resultadoJson=json_encode($data);
echo $resultadoJson;