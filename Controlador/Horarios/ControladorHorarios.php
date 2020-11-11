<?php include "../../Conexion/conexion.php";
header("Content-Type: application/json"); // muestra el json còmo objeto

$Obj = new Conexion();
$pdo = $Obj->Conectar();


if ($_POST) {

    
    //verificamos que la accion exista
    if (isset($_POST['accion'])) {
        if ($_POST['accion'] == "insertar") {
            $nombres = $_POST['nmedico'];
            $fecha = $_POST['fecha'];
            $ingreso = $_POST['hingreso']; 
            $salida = $_POST['hsalida'];          
            $estado = 'A';                

            $sql = "INSERT INTO tbl_horario (MED_ID, HOR_DIAS, HOR_INGRESO, HOR_SALIDA, HOR_ESTADO) VALUES (:nombres, :fecha, :ingreso, :salida, :estado)";
            $query = $pdo->prepare($sql);
            //BINDPARAM Vincula un parámetro al nombre de variable especificado
            $query->bindParam(':nombres', $nombres, PDO::PARAM_INT);
            $query->bindParam(':fecha', $fecha, PDO::PARAM_STMT);
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

            $codigo = $_POST['idHor'];
            $nemedico = $_POST['nemedico'];
            $efecha = $_POST['efecha'];
            $ehingreso = $_POST['ehingreso'];
            $ehsalida = $_POST['ehsalida'];
            

            // "UPDATE tbl_medico SET ESP_ID = '$especialidad', MED_NOMBRES = '$nombres', MED_P_APELLIDO = '$P_Apellido', MED_S_APELLIDO = ' $S_Apellido', MED_GENERO = '$genero', MED_FECHA_NAC = '$f_naci', MED_DIRECCION = '$dir',  MED_CORREO = '$correo', MED_TELEFONO = '$telef', MED_TIPO_DNI = ' $t_dni', MED_DNI = ' $dni' WHERE MED_ID = '$codigo' 
            $sqlu = "UPDATE tbl_horario SET MED_ID = :nemedico, HOR_DIAS = :efecha, HOR_INGRESO = :ehingreso, HOR_SALIDA = :ehsalida WHERE HOR_ID = '$codigo' ";
            $queryu = $pdo->prepare($sqlu);
            $queryu->bindParam(':nemedico', $nemedico, PDO::PARAM_INT);
            $queryu->bindParam(':efecha', $efecha, PDO::PARAM_STR);
            $queryu->bindParam(':ehingreso', $ehingreso, PDO::PARAM_STR);
            $queryu->bindParam(':ehsalida', $ehsalida, PDO::PARAM_STR);
            $rsu = $queryu->execute();

            if ($rsu) {
                $response["success"] = true;
                $response["mensaje"] = "Se modifico correctamente";
            } else {
                $response["success"] = false;
                $response["mensaje"] = "No se modifico correctamente";
                $response["consulta"] = $queryu;
                $response["execute"] = $rsu;
            }
            echo json_encode($response);
            exit;
        } elseif ($_POST['accion'] == "eliminar") {

            $codigo = $_POST['idHorEl'];
            $sqle = "UPDATE tbl_horario SET HOR_ESTADO = 'I' where HOR_ID = '$codigo'";
            $querye = $pdo->prepare($sqle);
            $rse = $querye->execute();

            if ($rse) {
                $response["success"] = true;
                $response["mensaje"] = "Se elimino correctamente";
                $response["co"] = $querye;
                $response["exe"] = $rse;
            } else {
                $response["success"] = false;
                $response["mensaje"] = "No se elimino correctamente";
                $response["co"] = $querye;
                $response["exe"] = $rse;
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