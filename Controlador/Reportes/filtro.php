<?php
require_once '../../Modelo/conexion.php';


$Obj = new Conexion();
$pdo = $Obj->Conectar();


$columns = array('EP_DESCRIPCION','Nombres', 'NombresP', 'start');

$query = "select * from reporteCita WHERE ";

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
 $query .= 'ORDER BY CIT_ID DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ',  ' . $_POST['length'];
}

$resultado = $pdo->prepare($query . $query1);
$resultado->execute();
$result = $resultado->fetchAll();




//$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

//$result = mysqli_query($connect, $query . $query1);

$data = array();

foreach($result as $row)
{
 $fecha=date("d/m/Y", strtotime($row["start"]));			
 $sub_array = array();
 $sub_array[] = $row["EP_DESCRIPCION"];
  $sub_array[] = $row["Nombres"];
 $sub_array[] = $row["NombresP"];
 $sub_array[] = $fecha;
 
 $data[] = $sub_array;
}

function get_all_data($pdo,$result)
{
 $sql = "select * from reporteCita";
 $query = $pdo->prepare($sql);
 $query->execute();
 $result = $query->fetchAll();  
 return ($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($pdo,$result),
 "recordsFiltered" => $result,
 "data"    => $data
);

echo json_encode($output);

?>