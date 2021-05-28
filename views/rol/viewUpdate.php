<div class="modal fade" id="modal_actualizar_rol" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
        <div class="modal-header bg-warning text-white">
        <h5 class="modal-title text-white" id="staticBackdropLabel">ACTUALIZAR ROL</h5>
        </div>
        <div class="modal-body">
            <form id="Form-Update-Tic">
                <h2 display="FORM UPDATE"></h2>
                        <div class="row">
                            <div class="col-md-12">
                            <div class="form-group">
                            <label for="id_Rol">ID</label>
                                <input type="text" id="id_Rol" name="id_Rol" readonly class="form-control">
                            </div>
                            <div class="form-group">
                            <label for="update_description_Rol">Rol</label> 
                                <input type="text"  autocomplete="off" name="update_description_Rol" id="update_description_Rol" class="form-control" maxlength="50">
                            </div>
                            </div>
            </form>
        </div>
        <div class="modal-footer button_flex">
            <button class="btn btn-warning text-white button_style_2 cerrar_modal_2" onclick="Edit_Rol()" data-dismiss="modal" id="TipRol">Actualizar</button>
            <button type="button" class="btn btn-danger button_style_2" data-dismiss="modal">Cancelar</button>
        </div>
        </div>
    </div>
</div>