<?php

require_once '../../Modelo/conexion.php';
require_once '../../Controlador/GlobalFuntion.php';

$ob = new Conexion();

?>

<link href="<?php echo SERVERURL?>sweetalert/sweetalert2.min.css" rel="stylesheet">


<div class="modal fade" id="AgregarCita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-medkit" aria-hidden="true"></i> Agregar Cita </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form novalidate enctype="multipart/form-data" id="formCita" name="formuCita" method="POST">

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="especialidad">Especialidad</label>

                            <select class="form-control input especialidad" id="especialidad" name="especialidad">

                                <option selected id="Especialidad" value="">Seleccione una opcion</option>
                                <?php
                                $con = $ob->Conectar();
                                $q = "SELECT ESP_ID, EP_DESCRIPCION FROM tbl_especialidades";
                                $que = $con->prepare($q);
                                $que->execute();
                                $result = $que->fetchAll();
                                foreach ($result  as $val) { ?>
                                    <option value="<?php echo $val['ESP_ID'] ?>"><?php echo $val['EP_DESCRIPCION']  ?> </option>
                                <?php }  ?>

                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="nmedico">Médico </label>
                            <select class="form-control input nmedico" id="nmedico" name="nmedico">
                                <option selected id="nMedico" value="">Seleccione una opcion</option>
                            </select>
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="Paciente">Paciente</label>
                            <select class="form-control input paciente selectpicker" data-live-search="true" id="Paciente" name="Paciente">
                                <option selected id="paciente" value="">Seleccione una opcion</option>

                                <?php $q = "SELECT * FROM	tbl_paciente	 WHERE PAC_ESTADO = 'A'";
                                $que = $con->query($q);
                                foreach ($que  as $val) {
                                ?>
                                    <option value="<?php echo $val['PAC_ID'] ?>"><?php echo $val['PAC_NOMBRES'] . ' ' . $val['PAC_P_APELLIDO'] ?> </option>
                                <?php }  ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="fecha">Fecha y Hora de la Cita</label>
                            <input type="input" class="form-control input" id="fecha" name="fecha">
                        </div>

                    </div>



                    <div class="form-row">

                        <div class="form-group col-md-12">
                            <label for="obs">Observaciones </label>
                            <textarea type="text" class="form-control input" id="obs" name="obs"></textarea>
                        </div>

                    </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary  btn-lg " data-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i> Cerrar</button>
                <br>
                <button type="button" onclick="validarFormulario();" class="btn btn-primary btn-lg" name="btnAgregarCita" id="btnAgregarCita"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>

            </div>

            </form>
        </div>
    </div>
</div>
<script src="<?php echo SERVERURL?>jquery/jquery.min.js"></script>
<script src="<?php echo SERVERURL?>sweetalert/sweetalert2.all.min.js"></script>
<script src="<?php echo SERVERURL?>jquery/jquery-1.10.2.min.js"></script>
<script src="<?php echo SERVERURL?>Controlador/citas/calendario/js/calendario.js"></script>