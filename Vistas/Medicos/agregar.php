<?php
$con = mysqli_connect('localhost', 'root', '', 'citasmedicas');
?>
<div class="modal fade" id="AgregarMedicoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user-md" aria-hidden="true"></i> Agregar Médico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form novalidate enctype="multipart/form-data" id="formMedico" method="POST">
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="nombres">Nombres</label>
                            <input type="text" class="form-control nombres input" id="nombres" name="nombres" placeholder="Ejemplo: Juan " >

                        </div>
                        <div class="form-group col-md-6">
                            <label for="P_Apellido">Primer Apellido</label>
                            <input type="text" class="form-control P_Apellido input" id="P_Apellido" name="P_Apellido" placeholder="Ejemplo: Castro" >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="S_Apellido">Segundo Apellido</label>
                            <input type="text" class="form-control input" id="S_Apellido" name="S_Apellido" placeholder="Ejemplo: Villareal" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="genero">Género</label>
                            <select id="genero" name="genero" class="form-control input" required>
                                <option selected id="Genero" value="">Seleccione una opción</option>
                                <option value="F">Femenino</option>
                                <option value="M">Masculino</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-6">

                            <label for="especialidad">Especialidad</label>

                            <select class="form-control" id="especialidad" name="especialidad">
                                <option selected id="Especialidad" value="">Seleccione una opcion</option>
                                <?php $q = "SELECT ESP_ID, EP_DESCRIPCION FROM tbl_especialidades";
                                $que = $con->query($q);
                                foreach ($que  as $val) { ?>
                                    <option value="<?php echo $val['ESP_ID'] ?>"><?php echo $val['EP_DESCRIPCION']  ?> </option>
                                <?php }  ?>

                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="t_dni">Tipo de Documento</label>
                            <select id="t_dni" name="t_dni" class="form-control input">
                                <option selected id="T_dni" value="">Seleccione una opción</option>
                                <option value="C">Cédula</option>
                                <option value="R">RUC</option>
                                <option value="P">Pasaporte</option>
                            </select>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="dni">Documento de Identidad</label>
                            <input type="text" class="form-control input" maxlength="13" id="dni" name="dni" placeholder="Ejemplo: 1712345678" >
                        </div>

                        <div class="form-group col-md-6">
                            <label for="f_naci">Fecha de Nacimiento</label>
                            <input type="date" class="form-control input" id="f_naci" name="f_naci">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="correo">Correo Electrónico</label>
                            <input type="email" class="form-control input" id="correo" name="correo" placeholder="Ejemplo: ejempo@gmail.com" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="telef">Teléfono</label>
                            <input type="text" class="form-control input" maxlength="11" id="telef" name="telef" placeholder="Ejemplo: 0984575858" >
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="dir">Dirección</label>
                            <input type="text" class="form-control input" id="dir" name="dir" placeholder="Ejemplo: Av. Alegria y Felicia" >
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i> Cerrar</button>
                <button type="button" class="btn btn-primary" name="btnGuardarMedico" id="btnGuardarMedico"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>