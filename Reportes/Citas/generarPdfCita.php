<?php 
require_once '../../Modelo/conexion.php';
$ob = new Conexion();
$pdo= $ob->Conectar();





$idPacTicket = $_POST['EidCit'];

$sql="SELECT CIT_ID, EP_DESCRIPCION , CONCAT(tbl_medico.MED_NOMBRES,' ',tbl_medico.MED_P_APELLIDO) as Nombres	, CONCAT(tbl_paciente.PAC_NOMBRES,' ', tbl_paciente.PAC_P_APELLIDO) as NombresP, CONVERT( tbl_cita.`start`, DATE) as start FROM	tbl_cita INNER JOIN	tbl_medico ON tbl_cita.MED_ID = tbl_medico.MED_ID	INNER JOIN tbl_especialidades	ON 	tbl_cita.ESP_ID = tbl_especialidades.ESP_ID	INNER JOIN	tbl_paciente ON tbl_cita.PAC_ID = tbl_paciente.PAC_ID WHERE CIT_ID = '$idPacTicket'";
$que = $pdo->prepare($sql);
$que->execute();
$result = $que->fetchAll();


require_once '../../fpdf/fpdf.php';

require_once '../../PlantillaReportes/plantilla.php';



$pdf=new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();


// CABECERA
$pdf->SetFont('Helvetica','',14);

$pdf->Cell(30,5,'Medi Center',0,0,'C');

$pdf->SetFont('Helvetica','',14);

$pdf->Cell(270,5,'Fecha: 28/10/2019',0,0,'C');
 
// DATOS HOSPITAL       
$pdf->Ln(15);
$pdf->Cell(190,5,'Comprobante de cita',0,1,'C');


$pdf->Ln(10);


// COLUMNAS
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont("Times", "B", 10);
$pdf->Cell(40,7,utf8_decode("Especialidad"),0,0,"C",1);
$pdf->Cell(55,7,utf8_decode("Médico"),0,0,"C",1);
$pdf->Cell(55,7,"Paciente",0,0,"C",1);
$pdf->Cell(40,7,"Dia y Hora de la cita",0,0,"C",1);
$pdf->ln();
 
// PRODUCTOS
foreach ($result as $row)
{

$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont("Times", "", 10);
$pdf->Cell(40,7,utf8_decode($row['EP_DESCRIPCION']),0,0,"C",1);
$pdf->Cell(55,7,utf8_decode($row['Nombres']),0,0,"C",1);
$pdf->Cell(55,7,utf8_decode($row['NombresP']),0,0,"C",1);
$pdf->Cell(40,7,$row['start'],0,0,"C",1);
$pdf->ln();

}


 
// PIE DE PAGINA
$pdf->Ln(10);
$pdf->Cell(190,0,'ESTE TICKET TIENE VALIDEZ ',0,1,'C');
$pdf->Ln(3);
$pdf->Cell(190,0,'HASTA (DIA DE LA CITA VA AQUI)',0,1,'C');
 
$pdf->Output('ticket.pdf','i');

?>