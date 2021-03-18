<?php
require_once '../../Modelo/conexion.php';

$ob = new Conexion();
?>

<link href="../../sweetalert/sweetalert2.min.css" rel="stylesheet">

<div class="modal fade" id="EditarHorariodModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-clock-o " aria-hidden="true"></i> Editar Horario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="needs-validation" novalidate enctype="multipart/form-data" id="formEditarHorario" name="formEditarHorario" method="POST">

          <div class="form-row">

            <div class="form-group col-md-6">

              <input type="hidden" class="form-control" id="eidHor" name="eidHor">

              <strong><label for="nombres">Médico</label></strong>
              <select class="form-control " id="nemedico" name="nemedico">
                <option selected id="neMedico" value="">Seleccione una opcion</option>
                <?php
                $con = $ob->Conectar();
                $q = "SELECT MED_ID, MED_NOMBRES, MED_P_APELLIDO FROM	tbl_medico	 WHERE MED_ESTADO = 'A'";
                $que = $con->query($q);
                $que->execute();
                $result = $que->fetchAll();
                foreach ($result  as $val) { ?>
                  <option value="<?php echo $val['MED_ID'] ?>"><?php echo $val['MED_NOMBRES'] . ' ' . $val['MED_P_APELLIDO'] ?> </option>
                <?php }  ?>

              </select>

            </div>

            <div class="form-group col-md-6">

              <strong><label for="ed_ingreso">Dia de Ingreso</label></strong>
              <select id="ed_ingreso" name="ed_ingreso" class="form-control input">
                <option selected id="eD_ingreso" value="">Seleccione una opción</option>
                <option value="Lu">Lunes</option>
                <option value="Ma">Martes</option>
                <option value="Mi">Miercoles</option>
                <option value="Ju">Jueves</option>
                <option value="Vi">Viernes</option>
                <option value="Sa">Sábado</option>
                <option value="Do">Domingo</option>
              </select>

            </div>


          </div>

          <div class="form-row">

            <div class="form-group col-md-6">

              <strong><label for="nombres">Dia de Salida</label></strong>
              <select id="ed_salida" name="ed_salida" class="form-control input">
                <option selected id="eD_salida" value="">Seleccione una opción</option>
                <option value="Lu">Lunes</option>
                <option value="Ma">Martes</option>
                <option value="Mi">Miercoles</option>
                <option value="Ju">Jueves</option>
                <option value="Vi">Viernes</option>
                <option value="Sa">Sábado</option>
                <option value="Do">Domingo</option>
              </select>

            </div>

            <div class="form-group col-md-6">

              <strong><label for="nombres">Hora de Ingreso</label></strong>
              <input type="time" class="form-control input  " id="ehingreso" name="ehingreso">

            </div>

          </div>


          <div class="form-row">

            <div class="form-group col-md-6">

              <strong><label for="nombres">Hora de Salida</label></strong>
              <input type="time" class="form-control input " id="ehsalida" name="ehsalida">

            </div>

          </div>
      </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i> Cerrar</button>
        <button type="button" class="btn btn-primary" name="btnEditarHorario" id="btnEditarHorario"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script src="../../sweetalert/sweetalert2.all.min.js"></script>