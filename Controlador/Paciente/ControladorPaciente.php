<?php include "../../Conexion/conexion.php";
header("Content-Type: application/json"); // muestra el json còmo objeto

$Obj = new Conexion();
$pdo = $Obj->Conectar();


if ($_POST) {

    
    //verificamos que la accion exista
    if (isset($_POST['accion'])) {
        if ($_POST['accion'] == "insertar") {
            $nombres = $_POST['nombresP'];
            $P_Apellido = $_POST['P_ApellidoP'];
            $S_Apellido = $_POST['S_ApellidoP'];
            $genero = $_POST['generoP'];
            $f_naci = $_POST['f_naciP'];
            $dir = $_POST['dirP'];
            $correo = $_POST['correoP'];
            $telef = $_POST['telefP'];
            $t_dni  = $_POST['t_dniP'];
            $dni = $_POST['dniP'];
            $estado = 'A';
            $c_registro =  date('Y-m-d');
       



            $sql = "INSERT INTO tbl_paciente (PAC_NOMBRES, PAC_P_APELLIDO, PAC_S_APELLIDO,PAC_GENERO, PAC_FECHA_NAC, PAC_DIRECCION, PAC_CORREO , PAC_TELEFONO, PAC_TIPO_DNI, PAC_DNI, PAC_ESTADO, PAC_CREACION_REGISTRO) VALUES (:nombres,:P_Apellido,:S_Apellido,:genero,:f_naci,:dir,:correo,:telef,:t_dni,:dni,:estado,:c_registro)";
            $query = $pdo->prepare($sql);
            //BINDPARAM Vincula un parámetro al nombre de variable especificado
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

            $codigo = $_POST['EidPacienteP'];
            $nombres = $_POST['EnombresP'];
            $P_Apellido = $_POST['EP_ApellidoP'];
            $S_Apellido = $_POST['ES_ApellidoP'];
            $genero = $_POST['Ed_generoP'];
            $f_naci = $_POST['Ef_naciP'];
            $dir = $_POST['EdirP'];
            $correo = $_POST['EcorreoP'];
            $telef = $_POST['EtelefP'];
            $t_dni  = $_POST['Ed_t_dniP'];
            $dni = $_POST['EdniP'];            

            $sqlu = "UPDATE tbl_paciente SET PAC_NOMBRES = :nombres, PAC_P_APELLIDO = :P_Apellido, PAC_S_APELLIDO = :S_Apellido, PAC_GENERO = :genero, PAC_FECHA_NAC = :f_naci, PAC_DIRECCION = :dir,  PAC_CORREO = :correo, PAC_TELEFONO = :telef, PAC_TIPO_DNI = :t_dni, PAC_DNI = :dni WHERE PAC_ID = '$codigo' ";
            $queryu = $pdo->prepare($sqlu);            
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

            $codigo = $_POST['idPacienteEl'];
            $sqle = "UPDATE tbl_paciente SET PAC_ESTADO = 'I' where PAC_ID = '$codigo'";
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