<?php
require_once '../../Modelo/conexion.php';

$ob = new Conexion();
?>
<div class="modal fade" id="AgregarUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-users" aria-hidden="true"></i> Agregar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form novalidate enctype="multipart/form-data" id="formUsuario" name="formuUsuario" method="POST">
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="rol">Rol de usuario</label>
                            <select class="form-control input" id="rol" name="rol">
                                <option value=""> Seleccione una opción </option>
                                <?php
                                $con = $ob->Conectar();
                                $q = "SELECT ROL_ID, ROL_DESCRIPCION FROM	tbl_rol WHERE ROL_ESTADO = 'A'";
                                $que = $con->prepare($q);
                                $que->execute();
                                $result = $que->fetchAll();
                                foreach ($result  as $val) { ?>
                                    <option value="<?php echo $val['ROL_ID'] ?>"><?php echo $val['ROL_DESCRIPCION']  ?> </option>
                                <?php }  ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="correoUsu">Correo Electrónico</label>
                            <input type="text" class="form-control  input" id="correoUsu" name="correoUsu" placeholder="Ejemplo: usuario123@hotmail.com">
                        </div>

                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="claveUsu">Contraseña</label>
                            <input type="password" class="form-control input" id="claveUsu" name="claveUsu">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="nombresUsu">Nombres</label>
                            <input type="text" class="form-control input" id="nombresUsu" name="nombresUsu" placeholder="Ejemplo: Martin">
                        </div>
                    </div>


                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="apellidoPUsu">Apellido Paterno</label>
                            <input type="text" class="form-control input" id="apellidoPUsu" name="apellidoPUsu" placeholder="Ejemplo: Paz">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="apellidoMUsu">Apellido Materno</label>
                            <input type="text" class="form-control input" id="apellidoMUsu" name="apellidoMUsu" placeholder="Ejemplo: Altamirano">
                        </div>

                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i> Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="validarFormularioUsu();" name="btnGuardarUsu" id="btnGuardarUsu"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>