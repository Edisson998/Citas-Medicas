<?php
$con = mysqli_connect('localhost', 'root', '', 'citasmedicas');
?>
<div class="modal fade" id="AgregarHorariodModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-clock-o " aria-hidden="true"></i> Agregar Horario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="needs-validation" novalidate enctype="multipart/form-data" id="formHorario" method="POST">

          <div class="form-row">
            <div class="form-group col-md-6">
              <strong><label for="nombres">Médico</label></strong>
              <select class="form-control input nmedico"  id="nmedico" name="nmedico">                                
                                <option selected  id="nMedico" value="" >Seleccione una opcion</option>
                                <?php $q = "SELECT MED_ID, MED_NOMBRES, MED_P_APELLIDO FROM	tbl_medico	 WHERE MED_ESTADO = 'A'";
                                $que = $con->query($q);
                                foreach ($que  as $val) { ?>
                                    <option value="<?php echo $val['MED_ID'] ?>"><?php echo $val['MED_NOMBRES'].' '. $val['MED_P_APELLIDO'] ?> </option>
                               <?php }  ?> 
                               
                            </select></div>

            <div class="form-group col-md-6">
              <strong><label for="nombres">Fecha</label></strong>
              <input type="date" class="form-control  input fecha" id="fecha" name="fecha" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <strong><label for="nombres">Hora de Ingreso</label></strong>
              <input type="time" class="form-control  input hingreso" id="hingreso" name="hingreso" required>
            </div>

            <div class="form-group col-md-6">
              <strong><label for="nombres">Hora de Salida</label></strong>
              <input type="time" class="form-control  input hsalida" id="hsalida" name="hsalida" required>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i> Cerrar</button>
        <button type="button" class="btn btn-primary" name="btnGuardarHorario" id="btnGuardarHorario"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>