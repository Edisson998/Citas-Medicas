<?php

include_once '../../Modelo/conexion.php';
error_reporting(0);
$ob = new Conexion();
$co = $ob->Conectar();


$Object = new DateTime();
$fecha_actual = $Object->format("Y");

// consulta del mes de enero

$desdee = $fecha_actual.'-01-00 00:00:00';
$hastae = $fecha_actual.'-01-31 11:59:00';
$sql = "select COUNT(*) from tbl_cita where start between '$desdee' and '$hastae'";
$result = $co->query($sql);//$pdo sería el objeto conexión
$enero = $result->fetchColumn();
// febreo

$desdef = $fecha_actual.'-02-00 00:00:00';
$hastaf = $fecha_actual.'-02-28 11:59:00';
$sql = "select COUNT(*) from tbl_cita where start between '$desdef' and '$hastaf'";
$result = $co->query($sql);//$pdo sería el objeto conexión
$febrero = $result->fetchColumn();
// marzo

$desdem = $fecha_actual.'-03-01 00:00:00';
$hastam = $fecha_actual.'-03-31 11:59:00';
$sql = "select COUNT(*) from tbl_cita where start between '$desdem' and '$hastam'";
$result = $co->query($sql);//$pdo sería el objeto conexión
$marzo = $result->fetchColumn();
// abril

$desdea = $fecha_actual.'-04-00 00:00:00';
$hastaa = $fecha_actual.'-04-31 11:59:00';
$sql = "select COUNT(*) from tbl_cita where start between '$desdea' and '$hastaa'";
$result = $co->query($sql);//$pdo sería el objeto conexión
$abril = $result->fetchColumn();
// mayo

$desdema = $fecha_actual.'-05-00 00:00:00';
$hastama = $fecha_actual.'-05-30 11:59:00';
$sql = "select COUNT(*) from tbl_cita where start between '$desdema' and '$hastama'";
$result = $co->query($sql);//$pdo sería el objeto conexión
$mayo = $result->fetchColumn();
// junio

$desdem = $fecha_actual.'-06-00 00:00:00';
$hastam = $fecha_actual.'-06-30 11:59:00';
$sql = "select COUNT(*) from tbl_cita where start between '$desdem' and '$hastam'";
$result = $co->query($sql);//$pdo sería el objeto conexión
$junio = $result->fetchColumn();
// julio

$desdej = $fecha_actual.'-07-00 00:00:00';
$hastaj = $fecha_actual.'-07-31 11:59:00';
$sql = "select COUNT(*) from tbl_cita where start between '$desdej' and '$hastaj'";
$result = $co->query($sql);//$pdo sería el objeto conexión
$julio = $result->fetchColumn();
// agosto

$desdeag = $fecha_actual.'-08-00 00:00:00';
$hastaag = $fecha_actual.'-08-31 11:59:00';
$sql = "select COUNT(*) from tbl_cita where start between '$desdeag' and '$hastaag'";
$result = $co->query($sql);//$pdo sería el objeto conexión
$agosto = $result->fetchColumn();
// semptiembre

$desdes = $fecha_actual.'-09-00 00:00:00';
$hastas = $fecha_actual.'-09-30 11:59:00';
$sql = "select COUNT(*) from tbl_cita where start between '$desdes' and '$hastas'";
$result = $co->query($sql);//$pdo sería el objeto conexión
$semptiembre = $result->fetchColumn();
// octubre

$desdes = $fecha_actual.'-10-00 00:00:00';
$hastao = $fecha_actual.'-10-31 11:59:00';
$sql = "select COUNT(*) from tbl_cita where start between '$desdes' and '$hastao'";
$result = $co->query($sql);//$pdo sería el objeto conexión
$octubre = $result->fetchColumn();
// noviembre

$desden = $fecha_actual.'-11-00 00:00:00';
$hastan = $fecha_actual.'-11-30 11:59:00';
$sql = "select COUNT(*) from tbl_cita where start between '$desden' and '$hastan'";
$result = $co->query($sql);//$pdo sería el objeto conexión
$noviembre = $result->fetchColumn();
// diciembre

$desded = $fecha_actual.'-12-00 00:00:00';
$hastad = $fecha_actual.'-12-31 11:59:00';
$sql = "select COUNT(*) from tbl_cita where start between '$desded' and '$hastad'";
$result = $co->query($sql);//$pdo sería el objeto conexión
$diciembre = $result->fetchColumn();
