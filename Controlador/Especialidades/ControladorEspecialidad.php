<?php include "../../Modelo/conexion.php";
header("Content-Type: application/json"); // muestra el json còmo objeto

$Obj = new Conexion();
$pdo = $Obj->Conectar();


if ($_POST) {

    
    //verificamos que la accion exista
    if (isset($_POST['accion'])) {
        if ($_POST['accion'] == "insertar") {
            
            $nombreEsp= $_POST['especialidad'];         
            $estadoEsp = 'A';
            $c_registroEsp =  date('Y-m-d');
           
            $sql = "INSERT INTO tbl_especialidades (EP_DESCRIPCION,ESP_ESTADO,ESP_CREACION_REGISTRO) VALUES (:nombreEsp,:estadoEsp,:c_registroEsp)";
            $query = $pdo->prepare($sql);
            //BINDPARAM Vincula un parámetro al nombre de variable especificado           
            $query->bindParam(':nombreEsp', $nombreEsp, PDO::PARAM_STR);          
            $query->bindParam(':estadoEsp', $estadoEsp, PDO::PARAM_STR_CHAR);
            $query->bindParam(':c_registroEsp', $c_registroEsp, PDO::PARAM_STMT);
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

            $codigoesp = $_POST['idEsp'];
            $esp = $_POST['editarEspecialidad'];
           

            $sqlu = "UPDATE tbl_especialidades SET EP_DESCRIPCION = :esp WHERE ESP_ID = '$codigoesp' ";
            $queryu = $pdo->prepare($sqlu);           
            $queryu->bindParam(':esp', $esp, PDO::PARAM_STR);           
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

            $codigoEspEl = $_POST['idEspEl'];
            $sqle = "DELETE FROM tbl_especialidades where ESP_ID = '$codigoEspEl'";
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