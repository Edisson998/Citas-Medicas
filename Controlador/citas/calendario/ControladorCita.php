<?php 
include "../../../Modelo/conexion.php";
header("Content-Type: application/json"); // muestra el json còmo objeto

$Obj = new Conexion();
$pdo = $Obj->Conectar();


if ($_POST) {

    
    //verificamos que la accion exista
    if (isset($_POST['accion'])) {
        if ($_POST['accion'] == "agregar") {
            
        $esp = $_POST['especialidad'];
        $med = $_POST['nmedico'];
        $pac = $_POST['Paciente'];
        $start = $_POST['fecha'];
        $obs = $_POST['obs'];
        $est = 'A';
        $creg = date('Y-m-d');
        $color = '#000000';
        $end = date('Y-m-d');

        $sentenciaSQL = ("INSERT INTO tbl_cita(ESP_ID, MED_ID, PAC_ID, start, CIT_OBSERVACIONES, CIT_ESTADO, CIT_CREACION_REGISTRO,textColor, end) values (:esp, :med, :pac, :start, :obs, :est, :creg, :color, :end )");
        $query = $pdo->prepare($sentenciaSQL);
        $query->bindParam(':esp', $esp, PDO::PARAM_INT);
        $query->bindParam(':med', $med, PDO::PARAM_INT);
        $query->bindParam(':pac', $pac, PDO::PARAM_INT);
        $query->bindParam(':start', $start, PDO::PARAM_STMT);
        $query->bindParam(':obs', $obs, PDO::PARAM_STR);
        $query->bindParam(':est', $est, PDO::PARAM_STR_CHAR);
        $query->bindParam(':creg', $creg, PDO::PARAM_STMT);
        $query->bindParam(':color', $color, PDO::PARAM_STR);
        $query->bindParam(':end', $end, PDO::PARAM_STMT);
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

        $codigocit = $_POST['EidCit'];
        $espE = $_POST['Eespecialidad'];
        $medE = $_POST['nEmedico'];
        $pacE = $_POST['EPaciente'];
        $startE = $_POST['Efecha'];
        $obsE = $_POST['Eobs'];
       


        $sqlu = "UPDATE tbl_cita SET ESP_ID = :espE, MED_ID = :medE, PAC_ID = :pacE, start = :startE, CIT_OBSERVACIONES = :obsE WHERE CIT_ID = '$codigocit' ";
        $queryu = $pdo->prepare($sqlu);
        $queryu->bindParam(':espE', $espE, PDO::PARAM_INT);
        $queryu->bindParam(':medE', $medE, PDO::PARAM_INT);
        $queryu->bindParam(':pacE', $pacE, PDO::PARAM_INT);
        $queryu->bindParam(':startE', $startE, PDO::PARAM_STMT);
        $queryu->bindParam(':obsE', $obsE, PDO::PARAM_STR);
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

            $codigoCitEl = $_POST['EidCit'];

            $sqle = "DELETE FROM tbl_cita WHERE CIT_ID = ' $codigoCitEl' ";
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
