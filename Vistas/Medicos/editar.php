<?php
$con = mysqli_connect('localhost', 'root', '', 'citasmedicas');
?>
<div class="modal fade" id="EditarMedicoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user-md" aria-hidden="true"></i> Editar Médico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form  id="formEditarMedico" method="POST" action="../../Controlador/Medico/ControladorMedico.php">
                    <div class="form-row">
                    
                            
                            
                        <div class="form-group col-md-6">
                            <label for="nombres">Nombres</label>
                            <input type="hidden" class="form-control "  id="EidMedico" name="EidMedico" placeholder="Ej: Juan " >
                           
                            <input type="text" class="form-control Enombres input" id="Enombres" name="Enombres" placeholder="Ej: Juan " >
                        
                        </div>
                        <div class="form-group col-md-6">
                            <label for="P_Apellido">Primer Apellido</label>
                            <input type="text" class="form-control EP_Apellido input" id="EP_Apellido" name="EP_Apellido" placeholder="Ej: Castro" >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="S_Apellido">Segundo Apellido</label>
                            <input type="text" class="form-control input " id="ES_Apellido" name="ES_Apellido" placeholder="Ej: Villareal" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Egenero">Género</label>
                            <select id="Egenero" name="Ed_genero" class="form-control " >
                                <option selected id="genero_val"  >Seleccione una opción</option>
                                <option value="F">Femenino</option>
                                <option value="M">Masculino</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-6">

                            <label for="Eespecialidad">Especialidad</label>
                         
                            <select class="form-control " name="Ed_especialidad" id="Eespecialidad">
                                
                                <option selected="" id="E_especialidad" value="">Seleccione una opcion</option>
                                <?php $q = "SELECT * FROM tbl_especialidades";
                                $que = $con->query($q);
                                while ($val = $que->fetch_assoc()) {
                                    echo ' <option value="' . $val['ESP_ID'] . '">' . $val['EP_DESCRIPCION'] . '</option>';
                                }
                                ?>
                            </select>

                           
                            
                        </div>

                        <div class="form-group col-md-6">
                            <label for="Et_dni">Tipo de Documento</label>
                            <select id="Et_dni" name="Ed_t_dni" class="form-control " >
                                <option selected id="E_t_dni" >Seleccione una opción</option>
                                <option value="C">Cédula</option>
                                <option value="R">RUC</option>
                                <option value="P">Pasaporte</option>
                            </select>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="dni">Documento de Identidad</label>
                            <input type="text" class="form-control input" maxlength="13" id="Edni" name="Edni" placeholder="Ej: 1712345678" >
                        </div>

                        <div class="form-group col-md-6">
                            <label for="f_naci">Fecha de Nacimiento</label>
                            <input type="date" class="form-control input " id="Ef_naci" name="Ef_naci">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="correo">Correo Electrónico</label>
                            <input type="email" class="form-control input" id="Ecorreo" name="Ecorreo" placeholder="Ej: ejempo@gmail.com" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="telef">Teléfono</label>
                            <input type="text" class="form-control input" maxlength="10" id="Etelef" name="Etelef" placeholder="Ej: 0984575858" >
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="dir">Dirección</label>
                            <input type="text" class="form-control input" id="Edir" name="Edir" placeholder="Ej: Av: Alegria y Felicia" >
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i> Cerrar</button>
                <button type="button" class="btn btn-primary" name="btnEditarMedico" id="btnEditarMedico"><i class="fa fa-floppy-o" aria-hidden="true"></i> Editar</button>
            </div>
            </form>
        </div>
    </div>
</div>