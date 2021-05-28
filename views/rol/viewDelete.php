<!-- MODAL ELIMINAR USUARIO -->
<div class="modal fade" id="modal_eliminar_rol" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-danger  text-white">
                <h5 class="modal-title" id="staticBackdropLabel">ELIMINAR ROL</h5>
            </div>
            <div class="modal-body">
                <form action="" method="">
                    <div class="alert alert-danger text-center" role="alert">
                        <p class="font-weight-bold">¿Está seguro de que desea eliminar este rol?</p>
                        <p class="font-italic">Esta acción no se puede deshacer.</p>

                    </div>
            </div>
            <div class="modal-footer button_flex">
                <button type="button" class="btn btn-danger button_style_2" id="delete_Rol" onclick="Delete_Rol()" data-dismiss="modal">Eliminar</button>
                <button type="button" class="btn btn-secondary button_style_2" data-dismiss="modal">Cancelar</button>
            </div>
                </form>
        </div>
    </div>
</div>