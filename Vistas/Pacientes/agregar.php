<?php
$con = mysqli_connect('localhost', 'root', '', 'citasmedicas');
?>
<div class="modal fade" id="AgregarPacienteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user" aria-hidden="true"></i> Agregar Paciente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form novalidate enctype="multipart/form-data" id="formPaciente" name="formuPaciente" method="POST">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nombresP">Nombres</label>
                            <input type="text" class="form-control nombres input" id="nombresP" name="nombresP" placeholder="Ejemplo: Camilo ">

                        </div>
                        <div class="form-group col-md-6">
                            <label for="P_ApellidoP">Primer Apellido</label>
                            <input type="text" class="form-control P_Apellido input" id="P_ApellidoP" name="P_ApellidoP" placeholder="Ejemplo: Castro">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="S_Apellido">Segundo Apellido</label>
                            <input type="text" class="form-control input" id="S_ApellidoP" name="S_ApellidoP" placeholder="Ejemplo: Villareal">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="generoP">Género</label>
                            <select id="generoP" name="generoP" class="form-control input">
                                <option selected id="GeneroP" value="">Seleccione una opción</option>
                                <option value="F">Femenino</option>
                                <option value="M">Masculino</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="t_dniP">Tipo de Documento</label>
                            <select id="t_dniP" name="t_dniP" class="form-control input">
                                <option selected id="T_dniP" value="">Seleccione una opción</option>
                                <option value="C">Cédula</option>
                                <option value="R">RUC</option>
                                <option value="P">Pasaporte</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="dniP">Documento de Identidad</label>
                            <input type="text" class="form-control input" maxlength="13" id="dniP" name="dniP" placeholder="Ejemplo: 1712345678">
                        </div>

                    </div>

                    <div class="form-row">


                        <div class="form-group col-md-6">
                            <label for="f_naciP">Fecha de Nacimiento</label>
                            <input type="date" class="form-control input" id="f_naciP" name="f_naciP">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="correoP">Correo Electrónico</label>
                            <input type="email" class="form-control input" id="correoP" name="correoP" placeholder="Ejemplo: ejemplo@gmail.com">
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="telefP">Teléfono</label>
                            <input type="text" class="form-control input" maxlength="11" id="telefP" name="telefP" placeholder="Ejemplo: 0984575858">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="dirP">Dirección</label>
                            <input type="text" class="form-control input" id="dirP" name="dirP" placeholder="Ejemplo: Av. Alegria y Felicia">
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i> Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="validarFormularioPac();" name="btnGuardarPaciente" id="btnGuardarPaciente"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>