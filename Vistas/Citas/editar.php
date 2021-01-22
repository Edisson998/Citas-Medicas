<?php
require_once '../../Conexion/conexion.php';

$ob = new Conexion();

?>
<link href="../../sweetalert/sweetalert2.min.css" rel="stylesheet">
<div class="modal fade" id="EditarCita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5  class="modal-title" i><i class="fa fa-medkit" aria-hidden="true"></i> Editar Cita </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form novalidate enctype="multipart/form-data" id="formEditarCita" method="POST">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="especialidad">Especialidad</label>
                            <input type="hidden"  class="form-control" id="EidCit" name="EidCit">

                            <select class="form-control" id="Eespecialidad" name="Eespecialidad">

                                <option selected id="EEspecialidad" value="">Seleccione una opcion</option>
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
                            <select class="form-control" id="Enmedico" name="nEmedico">
                                <option selected id="EnMedico" value="">Seleccione una opcion</option>


                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="Paciente">Paciente</label>
                            <select class="form-control" id="EPaciente" name="EPaciente">
                                <option selected id="Epaciente" value="">Seleccione una opcion</option>

                                <?php $q = "SELECT * FROM	tbl_paciente	 WHERE PAC_ESTADO = 'A'";
                                $que = $con->query($q);
                                foreach ($que  as $val) { ?>
                                    <option value="<?php echo $val['PAC_ID'] ?>"><?php echo $val['PAC_NOMBRES'] . ' ' . $val['PAC_P_APELLIDO'] ?> </option>
                                <?php }  ?>

                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="fecha">Fecha y Hora de la Cita</label>
                            <input type="input" class="form-control " id="Efecha" name="Efecha">
                        </div>
                    </div>



                    <div class="form-row">
                        <div class="form-group col-md-12">

                            <label for="obs">Observaciones </label>
                            <textarea type="text" class="form-control" id="Eobs" name="Eobs"></textarea>

                        </div>

                    </div>

            </div>
            <div class="modal-footer">
                
                <button type="button" class="btn btn-info btn-sm" onclick="actualizar();"  name="btnEditarCita" id="btnEditarCita"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modificar</button>
                <br>
                <button type="button" class="btn btn-danger btn-sm" onclick="eliminar();" name="btnEliminarCita" id="btnEliminarCita"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</button>

            </div>
            </form>
        </div>
    </div>
</div>
<script src="../../Complementos_Plantilla/js/jquery.min.js"></script>
<script src="../../sweetalert/sweetalert2.all.min.js"></script>
<script src="../../jquery/jquery-1.10.2.min.js"></script>
<script src="../../Controlador/citas/calendario/js/calendario.js"></script>