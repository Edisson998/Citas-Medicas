<?php
require_once '../../Modelo/conexion.php';
header("Content-Type: application/json"); // muestra el json còmo objeto
$ob = new Conexion();
$pdo = $ob->Conectar();


$codigocit = $_POST['EidCit'];
$espE = $_POST['Eespecialidad'];
$medE = $_POST['nEmedico'];
$pacE = $_POST['EPaciente'];
$startE = $_POST['Efecha'];
$estadoCita = $_POST['estadoCit'];
$colorEstado = $_POST['colorEstado'];
$obsE = $_POST['Eobs'];

$sqlEsp = "SELECT EP_DESCRIPCION FROM tbl_especialidades WHERE ESP_ID ='$espE'";
$que = $pdo->prepare($sqlEsp);
$que->execute();
$result = $que->fetchAll();

$sqlMed = "SELECT MED_NOMBRES, MED_P_APELLIDO FROM tbl_medico WHERE MED_ID ='$medE'";
$que = $pdo->prepare($sqlMed);
$que->execute();
$medico = $que->fetchAll();

$sqlPac = "SELECT PAC_NOMBRES, PAC_P_APELLIDO FROM tbl_paciente WHERE PAC_ID ='$pacE'";
$que = $pdo->prepare($sqlPac);
$que->execute();
$paciente = $que->fetchAll();



require_once '../../fpdf/fpdf.php';

require_once '../../PlantillaReportes/plantilla.php';



$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();


// CABECERA
$pdf->SetFont('Helvetica', 'B', 14);

$pdf->Cell(30, 5, 'Medi Center', 0, 0, 'C');
$pdf->Image('../../img/pildora.png', 15, 15, -800);
$pdf->SetFont('Helvetica', 'B', 14);

$diassemana = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

$fecha = $diassemana[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y');


$pdf->Cell(235, 5, 'Fecha: ' . $fecha, 0, 0, 'C');
// DATOS HOSPITAL       
$pdf->Ln(15);
$pdf->Cell(190, 5, 'Comprobante de cita', 0, 1, 'C');
$pdf->Ln(10);


// COLUMNAS
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont("Times", "B", 10);
$pdf->Cell(40, 7, utf8_decode("Especialidad"), 0, 0, "C", 1);
$pdf->Cell(55, 7, utf8_decode("Médico"), 0, 0, "C", 1);
$pdf->Cell(55, 7, "Paciente", 0, 0, "C", 1);
$pdf->Cell(40, 7, "Dia y Hora de la cita", 0, 0, "C", 1);
$pdf->ln();

// Datos

$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont("Times", "", 10);
foreach ($result as $row) {
    $pdf->Cell(40, 7, utf8_decode($row['EP_DESCRIPCION']), 0, 0, "C", 1);
}
foreach ($medico as $row) {
    $pdf->Cell(55, 7, utf8_decode($row['MED_NOMBRES'] . ' ' . $row['MED_P_APELLIDO']), 0, 0, "C", 1);
}
foreach ($paciente as $row) {
    $pdf->Cell(55, 7, utf8_decode($row['PAC_NOMBRES'] . ' ' . $row['PAC_P_APELLIDO']), 0, 0, "C", 1);
}
date_default_timezone_set('Europe/Madrid');
// Unix
setlocale(LC_TIME, 'es_ES.UTF-8');
// En windows
setlocale(LC_TIME, 'spanish');
$fechaf =  strftime("%A, %d de %B a las %H:%M", strtotime($startE));

$pdf->Cell(40, 7, $fechaf, 0, 0, "C", 1);
$pdf->ln();

date_default_timezone_set('Europe/Madrid');
// Unix
setlocale(LC_TIME, 'es_ES.UTF-8');
// En windows
setlocale(LC_TIME, 'spanish');

$inicio = strftime("%A, %d de %B del %Y a las %H horas y %M minutos", strtotime($startE));


// PIE DE PAGINA
$pdf->Ln(10);
$pdf->Cell(190, 0, 'ESTE COMPROBANTE TIENE VALIDEZ ', 0, 1, 'C');
$pdf->SetFont("Times", "B", 10);
$pdf->Ln(5);
$pdf->Cell(190, 0, 'HASTA: ' . $inicio, 0, 1, 'C');
$pdf->SetFont("Times", "B", 8);
$pdf->Ln(5);
$pdf->Cell(190, 0, 'Nota: Llegar 15 minutos antes', 0, 1, 'C');

$pdf->Output('ticketCita.pdf', 'i');
