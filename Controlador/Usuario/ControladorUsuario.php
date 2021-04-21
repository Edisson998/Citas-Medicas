<?php 
session_start();
require_once "../../Modelo/conexion.php";
header("Content-Type: application/json"); // muestra el json còmo objeto

$Obj = new Conexion();
$pdo = $Obj->Conectar();


if ($_POST) {

    
    //verificamos que la accion exista
    if (isset($_POST['accion'])) {
        if ($_POST['accion'] == "insertar") {
            $rol = $_POST['rol'];
            $correoUsu = $_POST['correoUsu'];
            $claveUsu = md5($_POST['claveUsu']);
            $claveUsu2 = base64_encode ($claveUsu);
            $nombresUsu = $_POST['nombresUsu'];
            $apellidoPUsu = $_POST['apellidoPUsu'];
            $apellidoMUsu = $_POST['apellidoMUsu'];
            $estado = 'A';
            $c_registro =  date('Y-m-d');        

            $sql = "INSERT INTO tbl_usuario (ROL_ID, USU_CORREO, USU_CLAVE, USU_NOMBRES, USU_P_PELLIDO, USU_S_APELLIDO, USU_ESTADO, USU_CREACION_REGISTRO) VALUES (:rol, :correoUsu, :claveUsu2, :nombresUsu, :apellidoPUsu, :apellidoMUsu, :estado, :c_registro)";
            $query = $pdo->prepare($sql);
            //BINDPARAM Vincula un parámetro al nombre de variable especificado
            $query->bindParam(':rol', $rol, PDO::PARAM_INT);
            $query->bindParam(':correoUsu', $correoUsu, PDO::PARAM_STR);
            $query->bindParam(':claveUsu2', $claveUsu2, PDO::PARAM_STR);
            $query->bindParam(':nombresUsu', $nombresUsu, PDO::PARAM_STR);
            $query->bindParam(':apellidoPUsu', $apellidoPUsu, PDO::PARAM_STR);
            $query->bindParam(':apellidoMUsu', $apellidoMUsu, PDO::PARAM_STR);
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

            $codigo = $_POST['eidUsu'];
            $erol = $_POST['erol'];
            $ecorreoUsu = $_POST['ecorreoUsu'];
            $eclaveUsu = md5($_POST['eclaveUsu']);
            $eclaveUsu2 = base64_encode ($eclaveUsu);
            $enombresUsu = $_POST['enombresUsu'];
            $eapellidoPUsu = $_POST['eapellidoPUsu'];
            $eapellidoMUsu = $_POST['eapellidoMUsu'];
          

            // "UPDATE tbl_medico SET ESP_ID = '$especialidad', MED_NOMBRES = '$nombres', MED_P_APELLIDO = '$P_Apellido', MED_S_APELLIDO = ' $S_Apellido', MED_GENERO = '$genero', MED_FECHA_NAC = '$f_naci', MED_DIRECCION = '$dir',  MED_CORREO = '$correo', MED_TELEFONO = '$telef', MED_TIPO_DNI = ' $t_dni', MED_DNI = ' $dni' WHERE MED_ID = '$codigo' 
            $sqlu = "UPDATE tbl_usuario SET ROL_ID = :erol, USU_CORREO = :ecorreoUsu, USU_CLAVE = :eclaveUsu2, USU_NOMBRES = :enombresUsu, USU_P_PELLIDO = :eapellidoPUsu, USU_S_APELLIDO = :eapellidoMUsu WHERE USU_ID = '$codigo' ";
            $queryu = $pdo->prepare($sqlu);
            $queryu->bindParam(':erol', $erol, PDO::PARAM_INT);
            $queryu->bindParam(':ecorreoUsu', $ecorreoUsu, PDO::PARAM_STR);
            $queryu->bindParam(':eclaveUsu2', $eclaveUsu2, PDO::PARAM_STR);
            $queryu->bindParam(':enombresUsu', $enombresUsu, PDO::PARAM_STR);
            $queryu->bindParam(':eapellidoPUsu', $eapellidoPUsu, PDO::PARAM_STR);
            $queryu->bindParam(':eapellidoMUsu', $eapellidoMUsu, PDO::PARAM_STR);
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

            $codigoEl = $_POST['idUsuEl'];
            $sqle = "DELETE FROM tbl_usuario ' where USU_ID = '$codigoEl'";
            $querye = $pdo->prepare($sqle);
            $rse = $querye->execute();

            if ($rse && $_SESSION['usuario'] == "") {
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
