<div class="modal fade" id="EditarEspecialidadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-book" aria-hidden="true"></i>  Editar Especialidad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="needs-validation" novalidate enctype="multipart/form-data" id="formEditarEspecialidad" method="POST">
          <div class="form-row">
            <input type="hidden" class="form-control" id="idEsp" name="idEsp">

            <div class="form-group col-md-12">
              <strong><label for="nombres">Especialidad</label></strong>
              <input type="text" class="form-control  input" id="editarEspecialidad" name="editarEspecialidad" >
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i> Cerrar</button>
        <button type="button" class="btn btn-primary" name="btnEditarEspecialidad" id="btnEditarEspecialidad"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>