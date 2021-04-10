<?php
require_once '../../Modelo/conexion.php';

$ob = new Conexion();
$con = $ob->Conectar();
$sql = "SELECT * FROM tbl_paciente WHERE PAC_ESTADO = 'A'";
$que = $con->prepare($sql);
$que->execute();
$result = $que->fetchAll();

$paciente = array();

foreach ($result as $row) {
    $id = $row['PAC_ID'];
    $nombres = $row['PAC_NOMBRES'];
    $apellidoP = $row['PAC_P_APELLIDO'] ;
    $apellidoM = $row['PAC_S_APELLIDO'] ;
    //$t_dni = $row['MED_TIPO_DNI'];        
    if ( $t_dni = $row['PAC_TIPO_DNI'] == 'C') {
        $t_dni = $row['PAC_TIPO_DNI'] = 'Cédula';
    }elseif($t_dni = $row['PAC_TIPO_DNI'] == 'P'){
        $t_dni = $row['PAC_TIPO_DNI'] = 'Pasaporte';
    }else{
        $t_dni = $row['PAC_TIPO_DNI'] = 'RUC';
    }  
    $dni = $row['PAC_DNI'] ;     
    $genero = $row['PAC_GENERO'];
    if ( $genero = $row['PAC_GENERO'] == 'F') {
        $genero= $row['PAC_GENERO'] = 'Femenino';
    }else{
        $genero= $row['PAC_GENERO'] = 'Masculino';
    } 
    $f_naci = $row['PAC_FECHA_NAC'];
    $dir = $row['PAC_DIRECCION'];
    $correo = $row['PAC_CORREO'];
    $tel = $row['PAC_TELEFONO'];
    $estado = $row['PAC_ESTADO'];
    if ( $estado = $row['PAC_ESTADO'] == 'A') {

        $estado = $row['PAC_ESTADO'] = "<span class='badge badge-success'><i class='fa fa-check'></i> Activo</span>";
    }
    
    $paciente[]=array( 'PAC_ID'=>$id,
                     'PAC_NOMBRES'=>$nombres,
                     'PAC_P_APELLIDO'=>$apellidoP,
                     'PAC_S_APELLIDO'=>$apellidoM,
                     'PAC_TIPO_DNI'=>$t_dni,                     
                     'PAC_DNI'=>$dni,                     
                     'PAC_GENERO'=>$genero,
                     'PAC_FECHA_NAC'=>$f_naci,
                     'PAC_DIRECCION'=>$dir,
                     'PAC_CORREO'=>$correo,
                     'PAC_TELEFONO'=>$tel,
                     'PAC_ESTADO'=>$estado);
}
$con = null;
$data["data"]= $paciente;
$resultadoJson=json_encode($data);
echo $resultadoJson;