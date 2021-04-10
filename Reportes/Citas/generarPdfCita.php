<?php 
if (strlen($_GET['desde'])>0 and strlen($_GET['hasta'])>0) {
    
$desde = $_GET['desde'];
$hasta = $_GET['hasta'];

$verDesde = date('d/m/Y', strtotime($desde));
$verHasta = date('d/m/Y', strtotime($hasta));

}else{

 $desde = '1111-01-01';
 $hasta = '9999-12-30'; 

 $verDesde = '__/__/____';
 $verHasta = '__/__/____';

}
require_once '../../fpdf/fpdf.php';
require_once '../../Modelo/conexion.php';

$ob = new Conexion();
$con = $ob->Conectar();

$pdf=new FPDF();

$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Arial', '',9);
$pdf->Cell(50,10,'Hoy:' .date('d-m-Y').'',0);
$pdf->ln(15);

$pdf->SetFont("Arial","B", 15);
$pdf->Cell(35);
$pdf->Cell(120,10,"Reportes de citas",0,0,"C");
$pdf->ln(10);
$pdf->Cell(60,8,'',0);
$pdf->Cell(100,8,'Desde:' .$verDesde.'Hasta: ' .$verHasta,0);
$pdf->ln(23);

$pdf->SetFillColor(232,232,232);
$pdf->SetFont("Times", "B", 10);
$pdf->Cell(33,7,utf8_decode("Especialidad"),1,0,"C",1);
$pdf->Cell(55,7,utf8_decode("Médico"),1,0,"C",1);
$pdf->Cell(33,7,"Paciente",1,0,"C",1);
$pdf->Cell(35,7,"Dia y Hora de la cita",1,0,"C",1);

$sqlReport = "SELECT * FROM	tbl_cita WHERE CONVERT ( tbl_cita.start, DATE ) BETWEEN '$desde ' AND '$hasta'";
$que = $con->prepare($sqlReport);
$que->execute();
$result = $que->fetchAll();


$pdf->SetFont("Times","",10);

foreach ($result as $row)
{
$pdf->Cell(33,7,$row['EP_DESCRIPCION'],1,0,"C");
$pdf->Cell(55,7,$row['MED_NOMBRES'],1,0,"C");
$pdf->Cell(35,7,$row['PAC_NOMBRES'],1,0,"C");
$pdf->Cell(33,7,$row['start'],1,0,"C");


}


$pdf->Output();



?>