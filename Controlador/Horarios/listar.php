<?php
require_once '../../Modelo/conexion.php';

$ob = new Conexion();
$con = $ob->Conectar();
$sql = "SELECT * FROM	tbl_horario	INNER JOIN tbl_medico ON tbl_horario.MED_ID = tbl_medico.MED_ID WHERE HOR_ESTADO = 'A'";
$que = $con->prepare($sql);
$que->execute();
$result = $que->fetchAll();

$horarios = array();

foreach($result as $row) {
    $id = $row['HOR_ID'];
    $idMed = $row['MED_ID'];
    $nombreMed = $row['MED_NOMBRES'] . ' ' . $row['MED_P_APELLIDO'];
    $d_ingreso = $row['HOR_DIA_INGRESO'];
    if ( $d_ingreso = $row['HOR_DIA_INGRESO'] == 'Lu') {

        $d_ingreso = $row['HOR_DIA_INGRESO'] = "Lunes";

    }elseif ( $d_ingreso = $row['HOR_DIA_INGRESO'] == 'Ma') {
        
        $d_ingreso = $row['HOR_DIA_INGRESO'] = "Martes";

    } elseif ( $d_ingreso = $row['HOR_DIA_INGRESO'] == 'Mi') {
        
        $d_ingreso = $row['HOR_DIA_INGRESO'] = "Miercoles";

    } elseif ( $d_ingreso = $row['HOR_DIA_INGRESO'] == 'Ju') {
        
        $d_ingreso = $row['HOR_DIA_INGRESO'] = "Jueves";

    }elseif ( $d_ingreso = $row['HOR_DIA_INGRESO'] == 'Vi') {
       
        $d_ingreso = $row['HOR_DIA_INGRESO'] = "Viernes";

    }elseif ( $d_ingreso = $row['HOR_DIA_INGRESO'] == 'Sa') {
        
        $d_ingreso = $row['HOR_DIA_INGRESO'] = "Sabado";

    }elseif ( $d_ingreso = $row['HOR_DIA_INGRESO'] == 'Do') {
        
        $d_ingreso = $row['HOR_DIA_INGRESO'] = "Domingo";

    }

    $d_salida = $row['HOR_DIA_SALIDA']; 
    if ( $d_salida = $row['HOR_DIA_SALIDA'] == 'Lu') {

        $d_salida = $row['HOR_DIA_SALIDA'] = "Lunes";

    }elseif ( $d_salida = $row['HOR_DIA_SALIDA'] == 'Ma') {
        
        $d_salida = $row['HOR_DIA_SALIDA'] = "Martes";

    } elseif ( $d_salida = $row['HOR_DIA_SALIDA'] == 'Mi') {
        
        $d_salida = $row['HOR_DIA_SALIDA'] = "Miercoles";

    } elseif ( $d_salida = $row['HOR_DIA_SALIDA'] == 'Ju') {
        
        $d_salida = $row['HOR_DIA_SALIDA'] = "Jueves";

    }elseif ( $d_salida = $row['HOR_DIA_SALIDA'] == 'Vi') {
       
        $d_salida = $row['HOR_DIA_SALIDA'] = "Viernes";

    }elseif ( $d_salida = $row['HOR_DIA_SALIDA'] == 'Sa') {
        
        $d_salida = $row['HOR_DIA_SALIDA'] = "Sabado";

    }elseif ( $d_salida = $row['HOR_DIA_SALIDA'] == 'Do') {
        
        $d_salida = $row['HOR_DIA_SALIDA'] = "Domingo";

    }
    
    $hingreso = $row['HOR_HORA_INGRESO'];   
    $hsalida = $row['HOR_HORA_SALIDA'];      
    $hestado= $row['HOR_ESTADO'];
    if ( $hestado = $row['HOR_ESTADO'] == 'A') {

        $hestado = $row['HOR_ESTADO'] = "<span class='badge badge-success'><i class='fa fa-check'></i> Activo</span>";
    }    
    $horarios[]=array( 'HOR_ID'=>$id,
                     'MED_ID'=>$idMed, 
                     'MED_NOMBRES' =>$nombreMed,
                     'HOR_DIA_INGRESO'=>$d_ingreso,
                     'HOR_DIA_SALIDA'=>$d_salida,
                     'HOR_HORA_INGRESO'=>$hingreso,                    
                     'HOR_HORA_SALIDA'=>$hsalida,                     
                     'HOR_ESTADO'=>$hestado);
}
$con = null;
$data["data"]= $horarios;
$resultadoJson=json_encode($data);
echo $resultadoJson;