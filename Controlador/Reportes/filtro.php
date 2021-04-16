<?php
require_once '../../Modelo/conexion.php';


$Obj = new Conexion();
$pdo = $Obj->Conectar();


$columns = array('CIT_ID','EP_DESCRIPCION','Nombres', 'NombresP', 'start');

$query = "SELECT * FROM  reportecita  WHERE ";

if($_POST["is_date_search"] == "yes")
{
 $query .= 'start BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
 $query .= '
  (EP_DESCRIPCION LIKE "%'.$_POST["search"]["value"].'%" 
  OR Nombres LIKE "%'.$_POST["search"]["value"].'%" 
  OR NombresP LIKE "%'.$_POST["search"]["value"].'%" 
  OR start LIKE "%'.$_POST["search"]["value"].'%")
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY CIT_ID ASC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ',  ' . $_POST['length'];
}

$resultado = $pdo->prepare($query . $query1);
$resultado->execute();
$number_filter_row = $resultado->fetchAll();

$data = array();
$filtered_rows = $resultado->rowCount();

foreach($number_filter_row as $row)
{
 $fecha=date("d/m/Y", strtotime($row["start"]));			
 $sub_array = array();
 $sub_array[] = $row["EP_DESCRIPCION"];
  $sub_array[] = $row["Nombres"];
 $sub_array[] = $row["NombresP"];
 $sub_array[] = $fecha;
 
 $data[] = $sub_array;
}

function get_all_data($pdo)
{
 $sql = "SELECT CIT_ID, EP_DESCRIPCION , CONCAT(tbl_medico.MED_NOMBRES,' ',tbl_medico.MED_P_APELLIDO) as Nombres	, CONCAT(tbl_paciente.PAC_NOMBRES,' ', tbl_paciente.PAC_P_APELLIDO) as NombresP, CONVERT( tbl_cita.`start`, DATE) as start FROM	tbl_cita INNER JOIN	tbl_medico ON tbl_cita.MED_ID = tbl_medico.MED_ID	INNER JOIN tbl_especialidades	ON 	tbl_cita.ESP_ID = tbl_especialidades.ESP_ID	INNER JOIN	tbl_paciente ON tbl_cita.PAC_ID = tbl_paciente.PAC_ID";
 $query = $pdo->prepare($sql);
 $query->execute();
 $resulta = $query->fetchAll();  
 return $query->rowCount();
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  $filtered_rows,
 "recordsFiltered" => get_all_data($pdo),
 "data"    => $data
);

echo json_encode($output);

?>