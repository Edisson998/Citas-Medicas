<div class="modal fade" id="EliminarPacienteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user" aria-hidden="true"></i> Eliminar Paciente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEliminarPaciente" method="POST">
                    <input type="hidden" id="idPacienteEl" name="idPacienteEl">
                     <h3 class="text-center">¿ Seguro que desea eliminar este registro ?</h3>
                     
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i> Cerrar</button>
                <button type="button" class="btn btn-danger" id="btnEliminarPaciente" name="btnEliminarPaciente"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</button>
            </div>
        </div>
        </form>
    </div>
</div>