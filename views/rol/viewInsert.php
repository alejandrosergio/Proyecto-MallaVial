<div class="modal fade" id="modal_insertar_rol" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
            <h5 class="modal-title" id="staticBackdropLabel">AÑADIR ROL</h5>
            </div>
            <div class="modal-body">
            <form id="Form-Insert-Rol">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                <label for="insert_Description_Rol">Tipo de Rol</label>
                                    <input type="text" autocomplete="off" name="insert_Description_Rol" id="insert_Description_Rol" class="form-control" autocomplete="off" maxlength="50">
                                </div>
                            </div>
                        </div>
            </form>
            </div>
            <div class="modal-footer button_flex">
                <button class="btn btn-info button_style_insert_2 cerrar_modal_2" type="button" class="btn btn-info" onclick="Insert_Rol()" id="TipRol" data-dismiss="modal">Añadir</button>
                <button type="button" class="btn btn-danger button_style_insert_2" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>