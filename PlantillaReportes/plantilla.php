<?php  
include '../../fpdf/fpdf.php';

class PDF extends FPDF
{
function header()
{
$this->Image("../../img/favicon.png",5,5,30);
$this->Image("../../img/favicon.png",170,15,30,10);
$this->ln(25);

}

function footer()
{
$this->SetY(-15);
$this->SetFont("Arial","BI", 15);
$this->Cell(0,10,"Pagina ".$this->PageNo().'/{nb}',0,0,"C");
}
}
?>