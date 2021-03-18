<?php
require_once "../../../Modelo/conexion.php";
header("Content-Type: application/json"); // muestra el json como objeto

$Obj = new Conexion();
$pdo = $Obj->Conectar();



$sentenciaSQL = $pdo->prepare("SELECT  EP_DESCRIPCION AS title, tbl_cita.CIT_ID, tbl_cita.ESP_ID, tbl_cita.MED_ID, tbl_cita.PAC_ID, tbl_cita.`start`, tbl_cita.CIT_OBSERVACIONES, tbl_cita.CIT_ESTADO, tbl_cita.CIT_CREACION_REGISTRO,	tbl_cita.textColor, tbl_cita.`end`, CONCAT(tbl_medico.MED_NOMBRES,' ',tbl_medico.MED_P_APELLIDO) as Nombres	, CONCAT(tbl_paciente.PAC_NOMBRES,' ', tbl_paciente.PAC_P_APELLIDO) as NombresP, tbl_especialidades.EP_DESCRIPCION FROM	tbl_cita INNER JOIN	tbl_medico ON tbl_cita.MED_ID = tbl_medico.MED_ID	INNER JOIN tbl_especialidades	ON 	tbl_cita.ESP_ID = tbl_especialidades.ESP_ID	INNER JOIN	tbl_paciente	ON 		tbl_cita.PAC_ID = tbl_paciente.PAC_ID");
$sentenciaSQL->execute();

$resultado = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resultado);
