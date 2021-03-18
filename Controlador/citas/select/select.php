<?php
require_once '../../../Modelo/conexion.php';

$ob = new Conexion();
$con = $ob->Conectar();


//aqui obtenemos el valor del select
$id_esp = filter_input(INPUT_POST, 'id_especialidad');
$id_Eesp = filter_input(INPUT_POST, 'id_especialidadE');



if($id_esp = filter_input(INPUT_POST, 'id_especialidad')) {


//aqui hacemos la consulta usando el valor del select como condicion

    $sql = "SELECT MED_ID, MED_NOMBRES, MED_P_APELLIDO FROM tbl_medico WHERE ESP_ID = $id_esp";
    $query = $con->prepare($sql);
    $query->execute();
    $datos = $query->fetchAll();


//aqui hacemos la condicion de que si hay registros en la base retorne el resultado

    if (count($datos) == 0 ) {
        echo '<option value="0">No hay registros </option>';
    } else {

        echo '<option selected  id="nmedico" value="" >Seleccione una opcion</option>';
        
        foreach ($datos as $val) {

            echo ' <option value="' . $val['MED_ID'] . '">' . $val['MED_NOMBRES' ] . ' ' . $val['MED_P_APELLIDO' ] .'</option>';


        }
    }

}elseif ($id_Eesp = filter_input(INPUT_POST, 'id_especialidadE')){


    $sqlU = "SELECT MED_ID, MED_NOMBRES, MED_P_APELLIDO FROM tbl_medico WHERE ESP_ID = $id_Eesp";
    $queryU = $con->prepare($sqlU);
    $queryU->execute();
    $datosU = $queryU->fetchAll();


//aqui hacemos la condicion de que si hay registros en la base retorne el resultado

    if (count($datosU) == 0) {
        echo '<option value="0">No hay registros </option>';
    } else {

        echo '<option selected  id="nEmedico" value="" >Seleccione una opcion</option>';
        foreach ($datosU as $val) {

            echo ' <option value="' . $val['MED_ID'] . '">' . $val['MED_NOMBRES' ] . ' ' . $val['MED_P_APELLIDO' ] .'</option>';


        }
    }


}