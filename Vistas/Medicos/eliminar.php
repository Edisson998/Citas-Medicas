
<div class="modal fade" id="EliminarMedicoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user-md" aria-hidden="true"></i> Eliminar Médico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEliminarMedico" method="POST" action="../../Controlador/Medico/ControladorMedico.php">
                    <input type="hidden" id="idMedicoEl" name="idMedicoEl">
                     <h3 class="text-center">¿ Seguro que desea eliminar este registro ?</h3>
                     
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i> Cerrar</button>
                <button type="button" class="btn btn-danger" id="btnEliminarMedico" name="btnEliminarMedico"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</button>
            </div>
        </div>
        </form>
    </div>
</div>