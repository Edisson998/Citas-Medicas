<?php
require_once '../../Modelo/conexion.php';

$ob = new Conexion();

?>

<Style>
    .buttonGC {
        font-size: 11.3px;
        margin-top: 0.8%;
    }
</Style>
<link href="../../sweetalert/sweetalert2.min.css" rel="stylesheet">
<div class="modal fade" id="EditarCita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" i><i class="fa fa-medkit" aria-hidden="true"></i> Editar Cita </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form novalidate enctype="multipart/form-data" id="formEditarCita" action="../../Reportes/Citas/generarPdfCita.php" method="POST">

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="Eespecialidad">Especialidad</label>
                            <input type="hidden" class="form-control" id="EidCit" name="EidCit">
                            <select class="form-control" id="Eespecialidad" name="Eespecialidad">
                                <option selected id="EEspecialidad" value="">Seleccione una opcion</option>
                                <?php
                                $con = $ob->Conectar();
                                $q = "SELECT ESP_ID, EP_DESCRIPCION FROM tbl_especialidades";
                                $que = $con->prepare($q);
                                $que->execute();
                                $result = $que->fetchAll();
                                foreach ($result  as $val) {
                                ?>
                                    <option value="<?php echo $val['ESP_ID'] ?>"><?php echo $val['EP_DESCRIPCION']  ?> </option>
                                <?php }  ?>

                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="nEmedico">Médico </label>
                            <select class="form-control" id="nEmedico" name="nEmedico">
                                <option selected id="EnMedico" value="">Seleccione una opcion</option>
                            </select>
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="EPaciente">Paciente</label>
                            <select class="form-control " id="EPaciente" name="EPaciente">
                                <option selected id="Epaciente" value="">Seleccione una opcion</option>
                                <?php $q = "SELECT * FROM	tbl_paciente	 WHERE PAC_ESTADO = 'A'";
                                $que = $con->query($q);
                                foreach ($que  as $val) { ?>
                                    <option value="<?php echo $val['PAC_ID'] ?>"><?php echo $val['PAC_NOMBRES'] . ' ' . $val['PAC_P_APELLIDO'] ?> </option>
                                <?php }  ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="Efecha">Fecha y Hora de la Cita</label>
                            <input type="input" class="form-control " id="Efecha" name="Efecha">
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="estadoCit">Estado de la Cita </label>
                            <select class="form-control" id="estadoCit" name="estadoCit">
                                <option selected id="estadoCita" value="">Seleccione una opcion</option>
                                <option id="" value="PA">Atendido</option>
                                <option id="" value="PNA">No Atendido</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="colorEstado">Color</label>
                            <select class="form-control" id="colorEstado" name="colorEstado">
                                <option selected id="estadoCita" value="">Seleccione una opcion</option>
                                <option id="" value="#00FF00">Verde</option>
                                <option id="" value="#FF0000">Rojo</option>
                            </select>
                        </div>



                    </div>

                    <div class="form-row">



                        <div class="form-group col-md-12">
                            <label for="Eobs">Observaciones </label>
                            <textarea type="text" class="form-control" id="Eobs" name="Eobs"></textarea>
                        </div>

                    </div>

            </div>

            <div class="modal-footer">
                <br>
                <a href="../../Reportes/Citas/generarPdfCita.php" class="btn btn-secondary btn-sm buttonGC" target="_blank" name="btnGenerarCita" id="btnGenerarCita"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Generar Comprobante</a>
                <br>
                <button type="button" class="btn btn-info btn-sm " onclick="actualizar();" name="btnEditarCita" id="btnEditarCita"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modificar</button>
                <br>
                <button type="button" class="btn btn-danger btn-sm " onclick="eliminar();" name="btnEliminarCita" id="btnEliminarCita"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</button>

                <br>
            </div>

            </form>
        </div>
    </div>
</div>
<script src="../../jquery/jquery.min.js"></script>
<script src="../../sweetalert/sweetalert2.all.min.js"></script>
<script src="../../jquery/jquery-1.10.2.min.js"></script>
<script src="../../Controlador/citas/calendario/js/calendario.js"></script>