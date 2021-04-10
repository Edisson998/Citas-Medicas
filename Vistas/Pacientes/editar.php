<?php
$con = mysqli_connect('localhost', 'root', '', 'citasmedicas');
?>
<div class="modal fade" id="EditarPacienteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user" aria-hidden="true"></i> Editar Paciente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form  id="formEditarPaciente" method="POST" >
                    <div class="form-row">
                    
                            
                            
                        <div class="form-group col-md-6">
                            <label for="EidPacienteP">Nombres</label>
                            <input type="hidden" class="form-control "  id="EidPacienteP" name="EidPacienteP"  >
                           
                            <input type="text" class="form-control Enombres input" id="EnombresP" name="EnombresP" >
                        
                        </div>
                        <div class="form-group col-md-6">
                            <label for="EP_ApellidoP">Primer Apellido</label>
                            <input type="text" class="form-control EP_Apellido input" id="EP_ApellidoP" name="EP_ApellidoP" >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ES_ApellidoP">Segundo Apellido</label>
                            <input type="text" class="form-control input " id="ES_ApellidoP" name="ES_ApellidoP" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Egenero">Género</label>
                            <select id="EgeneroP" name="Ed_generoP" class="form-control " >
                                <option selected id="genero_valP"  >Seleccione una opción</option>
                                <option value="F">Femenino</option>
                                <option value="M">Masculino</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-row">                        

                        <div class="form-group col-md-6">
                            <label for="Ed_t_dniP">Tipo de Documento</label>
                            <select id="Et_dniP" name="Ed_t_dniP" class="form-control " >
                                <option selected id="E_t_dniP" >Seleccione una opción</option>
                                <option value="C">Cédula</option>
                                <option value="R">RUC</option>
                                <option value="P">Pasaporte</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="EdniP">Documento de Identidad</label>
                            <input type="text" class="form-control input" maxlength="13" id="EdniP" name="EdniP">
                        </div>

                    </div>

                    <div class="form-row">
                        

                        <div class="form-group col-md-6">
                            <label for="Ef_naciP">Fecha de Nacimiento</label>
                            <input type="date" class="form-control input " id="Ef_naciP" name="Ef_naciP">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="EcorreoP">Correo Electrónico</label>
                            <input type="email" class="form-control input" id="EcorreoP" name="EcorreoP">
                        </div>
                    </div>

                    <div class="form-row">
                        
                        <div class="form-group col-md-6">
                            <label for="EtelefP">Teléfono</label>
                            <input type="text" class="form-control input" maxlength="10" id="EtelefP" name="EtelefP">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="EdirP">Dirección</label>
                            <input type="text" class="form-control input" id="EdirP" name="EdirP" >
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i> Cerrar</button>
                <button type="button" class="btn btn-primary" name="btnEditarPaciente" id="btnEditarPaciente"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modificar</button>
            </div>
            </form>
        </div>
    </div>
</div>