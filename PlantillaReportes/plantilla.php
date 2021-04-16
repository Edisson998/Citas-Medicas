<?php  
require_once '../../fpdf/fpdf.php';

class PDF extends FPDF
{
function header()
{
//$this->Image("../../img/favicon.png",170,8,20,20);



}

function footer()
{
$this->SetY(-15);
$this->SetFont("Arial","BI", 15);
$this->Cell(0,10,"Pagina ".$this->PageNo().'/{nb}',0,0,"C");
}
}
?>