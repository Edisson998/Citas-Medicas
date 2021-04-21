<?php require_once "../../Modelo/conexion.php";
header("Content-Type: application/json"); // muestra el json còmo objeto

$Obj = new Conexion();
$pdo = $Obj->Conectar();


if ($_POST) {

    
    //verificamos que la accion exista
    if (isset($_POST['accion'])) {
        if ($_POST['accion'] == "insertar") {
            $nombres = $_POST['nombres'];
            $P_Apellido = $_POST['P_Apellido'];
            $S_Apellido = $_POST['S_Apellido'];
            $genero = $_POST['genero'];
            $f_naci = $_POST['f_naci'];
            $dir = $_POST['dir'];
            $correo = $_POST['correo'];
            $telef = $_POST['telef'];
            $t_dni  = $_POST['t_dni'];
            $dni = $_POST['dni'];
            $estado = 'A';
            $c_registro =  date('Y-m-d');
            $especialidad = $_POST['especialidad'];



            $sql = "INSERT INTO tbl_medico (ESP_ID,MED_NOMBRES, MED_P_APELLIDO, MED_S_APELLIDO,MED_GENERO, MED_FECHA_NAC, MED_DIRECCION,MED_CORREO,MED_TELEFONO,MED_TIPO_DNI,MED_DNI,MED_ESTADO,MED_CREACION_REGISTRO) VALUES (:especialidad,:nombres,:P_Apellido,:S_Apellido,:genero,:f_naci,:dir,:correo,:telef,:t_dni,:dni,:estado,:c_registro)";
            $query = $pdo->prepare($sql);
            //BINDPARAM Vincula un parámetro al nombre de variable especificado
            $query->bindParam(':especialidad', $especialidad, PDO::PARAM_INT);
            $query->bindParam(':nombres', $nombres, PDO::PARAM_STR);
            $query->bindParam(':P_Apellido', $P_Apellido, PDO::PARAM_STR);
            $query->bindParam(':S_Apellido', $S_Apellido, PDO::PARAM_STR);
            $query->bindParam(':genero', $genero, PDO::PARAM_STR_CHAR);
            $query->bindParam(':f_naci', $f_naci, PDO::PARAM_STMT);
            $query->bindParam(':dir', $dir, PDO::PARAM_STR);
            $query->bindParam(':correo', $correo, PDO::PARAM_STR);
            $query->bindParam(':telef', $telef, PDO::PARAM_INT);
            $query->bindParam(':t_dni', $t_dni, PDO::PARAM_STR_CHAR);
            $query->bindParam(':dni', $dni, PDO::PARAM_STMT);
            $query->bindParam(':estado', $estado, PDO::PARAM_STR_CHAR);
            $query->bindParam(':c_registro', $c_registro, PDO::PARAM_STMT);
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

            $codigo = $_POST['EidMedico'];
            $nombres = $_POST['Enombres'];
            $P_Apellido = $_POST['EP_Apellido'];
            $S_Apellido = $_POST['ES_Apellido'];
            $genero = $_POST['Ed_genero'];
            $f_naci = $_POST['Ef_naci'];
            $dir = $_POST['Edir'];
            $correo = $_POST['Ecorreo'];
            $telef = $_POST['Etelef'];
            $t_dni  = $_POST['Ed_t_dni'];
            $dni = $_POST['Edni'];
            $especialidad = $_POST['Ed_especialidad'];

            // "UPDATE tbl_medico SET ESP_ID = '$especialidad', MED_NOMBRES = '$nombres', MED_P_APELLIDO = '$P_Apellido', MED_S_APELLIDO = ' $S_Apellido', MED_GENERO = '$genero', MED_FECHA_NAC = '$f_naci', MED_DIRECCION = '$dir',  MED_CORREO = '$correo', MED_TELEFONO = '$telef', MED_TIPO_DNI = ' $t_dni', MED_DNI = ' $dni' WHERE MED_ID = '$codigo' 
            $sqlu = "UPDATE tbl_medico SET ESP_ID = :especialidad, MED_NOMBRES = :nombres, MED_P_APELLIDO = :P_Apellido, MED_S_APELLIDO = :S_Apellido, MED_GENERO = :genero, MED_FECHA_NAC = :f_naci, MED_DIRECCION = :dir,  MED_CORREO = :correo, MED_TELEFONO = :telef, MED_TIPO_DNI = :t_dni, MED_DNI = :dni WHERE MED_ID = '$codigo' ";
            $queryu = $pdo->prepare($sqlu);
            $queryu->bindParam(':especialidad', $especialidad, PDO::PARAM_STMT);
            $queryu->bindParam(':nombres', $nombres, PDO::PARAM_STR);
            $queryu->bindParam(':P_Apellido', $P_Apellido, PDO::PARAM_STR);
            $queryu->bindParam(':S_Apellido', $S_Apellido, PDO::PARAM_STR);
            $queryu->bindParam(':genero', $genero, PDO::PARAM_STR_CHAR);
            $queryu->bindParam(':f_naci', $f_naci, PDO::PARAM_STMT);
            $queryu->bindParam(':dir', $dir, PDO::PARAM_STR);
            $queryu->bindParam(':correo', $correo, PDO::PARAM_STR);
            $queryu->bindParam(':telef', $telef, PDO::PARAM_INT);
            $queryu->bindParam(':t_dni', $t_dni, PDO::PARAM_STR_CHAR);
            $queryu->bindParam(':dni', $dni, PDO::PARAM_STMT);
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

            $codigo = $_POST['idMedicoEl'];
            $sqle = "DELETE FROM tbl_medico  where MED_ID = '$codigo'";
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