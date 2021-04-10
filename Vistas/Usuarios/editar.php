<?php
require_once '../../Modelo/conexion.php';

$ob = new Conexion();
?>
<div class="modal fade" id="EditarUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-users" aria-hidden="true"></i> Editar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form novalidate enctype="multipart/form-data" id="formEditarUsuario"  method="POST">
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="erol">Rol de usuario</label>
                            <input type="hidden" class="form-control " id="eidUsu" name="eidUsu">
                                                    <select class="form-control" id="erol" name="erol">
                                <option value="" id="Erol"> Seleccione una opción </option>
                                <?php
                                $con = $ob->Conectar();
                                $q = "SELECT ROL_ID, ROL_DESCRIPCION FROM	tbl_rol WHERE ROL_ESTADO = 'A'";
                                $que = $con->prepare($q);
                                $que->execute();
                                $result = $que->fetchAll();
                                foreach ($result  as $val) { ?>
                                    <option  value="<?php echo $val['ROL_ID'] ?>"><?php echo $val['ROL_DESCRIPCION']  ?> </option>
                                <?php }  ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="ecorreoUsu">Correo Electrónico</label>
                            <input type="text" class="form-control  " id="ecorreoUsu" name="ecorreoUsu">
                        </div>

                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="eclaveUsu">Contraseña</label>
                            <input type="password" class="form-control " id="eclaveUsu" name="eclaveUsu">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="enombresUsu">Nombres</label>
                            <input type="text" class="form-control" id="enombresUsu" name="enombresUsu">
                        </div>
                    </div>


                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="eapellidoPUsu">Apellido Paterno</label>
                            <input type="text" class="form-control" id="eapellidoPUsu" name="eapellidoPUsu">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="eapellidoMUsu">Apellido Materno</label>
                            <input type="text" class="form-control" id="eapellidoMUsu" name="eapellidoMUsu">
                        </div>

                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i> Cerrar</button>
                <button type="button" class="btn btn-primary"  name="btnEditarUsu" id="btnEditarUsu"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modificar</button>
            </div>
            </form>
        </div>
    </div>
</div>