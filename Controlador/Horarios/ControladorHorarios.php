<?php require_once "../../Modelo/conexion.php";
header("Content-Type: application/json"); // muestra el json còmo objeto

$Obj = new Conexion();
$pdo = $Obj->Conectar();


if ($_POST) {    
    //verificamos que la accion exista
    if (isset($_POST['accion'])) {
        if ($_POST['accion'] == "insertar") {
            $nombres = $_POST['nmedico'];           
            $dingreso = $_POST['d_ingreso']; 
            $dsalida = $_POST['d_salida']; 
            $ingreso = $_POST['hingreso']; 
            $salida = $_POST['hsalida'];          
            $estado = 'A';                

            $sql = "INSERT INTO tbl_horario (MED_ID, HOR_DIA_INGRESO, HOR_DIA_SALIDA, HOR_HORA_INGRESO, HOR_HORA_SALIDA, HOR_ESTADO) VALUES (:nombres, :dingreso, :dsalida, :ingreso, :salida, :estado)";
            $query = $pdo->prepare($sql);
            //BINDPARAM Vincula un parámetro al nombre de variable especificado
            $query->bindParam(':nombres', $nombres, PDO::PARAM_INT);
            $query->bindParam(':dingreso', $dingreso, PDO::PARAM_STMT);
            $query->bindParam(':dsalida', $dsalida, PDO::PARAM_STMT);
            $query->bindParam(':ingreso', $ingreso, PDO::PARAM_STR);
            $query->bindParam(':salida', $salida, PDO::PARAM_STR);
            $query->bindParam(':estado', $estado, PDO::PARAM_STR_CHAR);           
            $rs = $query->execute();

            if ($rs) {
                $response["success"] = true;
                $response["mensaje"] = "Se inserto correctamente";
            } else {
                $response["success"] = false;
                $response["mensaje"] = "No se inserto correctamente";
            }
            echo json_encode($response);
            exit;
        } elseif ($_POST['accion'] == "actualizar") {

            $codigo = $_POST['eidHor'];
            $nemedico = $_POST['nemedico'];
            $ed_ingreso = $_POST['ed_ingreso']; 
            $ed_salida = $_POST['ed_salida']; 
            $ehingreso = $_POST['ehingreso'];
            $ehsalida = $_POST['ehsalida'];
            

            // "UPDATE tbl_medico SET ESP_ID = '$especialidad', MED_NOMBRES = '$nombres', MED_P_APELLIDO = '$P_Apellido', MED_S_APELLIDO = ' $S_Apellido', MED_GENERO = '$genero', MED_FECHA_NAC = '$f_naci', MED_DIRECCION = '$dir',  MED_CORREO = '$correo', MED_TELEFONO = '$telef', MED_TIPO_DNI = ' $t_dni', MED_DNI = ' $dni' WHERE MED_ID = '$codigo' 
            $sqlu = "UPDATE tbl_horario SET MED_ID = :nemedico, HOR_DIA_INGRESO = :ed_ingreso, HOR_DIA_SALIDA = :ed_salida, HOR_HORA_INGRESO = :ehingreso , HOR_HORA_SALIDA = :ehsalida WHERE HOR_ID = '$codigo' ";
            $queryu = $pdo->prepare($sqlu);
            $queryu->bindParam(':nemedico', $nemedico, PDO::PARAM_INT);
            $queryu->bindParam(':ed_ingreso', $ed_ingreso, PDO::PARAM_STMT);
            $queryu->bindParam(':ed_salida', $ed_salida, PDO::PARAM_STMT);
            $queryu->bindParam(':ehingreso', $ehingreso, PDO::PARAM_STMT);
            $queryu->bindParam(':ehsalida', $ehsalida, PDO::PARAM_STMT);
            $rsu = $queryu->execute();

            if ($rsu) {
                $response["success"] = true;
                $response["mensaje"] = "Se modifico correctamente";
                
            } else {
                $response["success"] = false;
                $response["mensaje"] = "No se modifico correctamente";
                
            }
            echo json_encode($response);
            exit;

        } elseif ($_POST['accion'] == "eliminar") {

            $codigoEl = $_POST['idHorEl'];
            $sqle = "DELETE FROM tbl_horario  where HOR_ID = '$codigoEl'";
            $querye = $pdo->prepare($sqle);
            $rse = $querye->execute();

            if ($rse) {
                $response["success"] = true;
                $response["mensaje"] = "Se elimino correctamente";
                
            } else {
                $response["success"] = false;
                $response["mensaje"] = "No se elimino correctamente";
                
            }
            echo json_encode($response);
            exit;

           
        } else {
            //mostramos en formato json cuando no exista ninguna accion
            $response["success"] = false;
            $response['mensaje'] = "no existe la accion insertar, actualizar o eliminar"; //es opcional esto

            echo json_encode($response);
            exit;
        }
        
    }
}
    ?>