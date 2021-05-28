<div class="modal fade" id="modal_actualizar_material" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header bg-warning text-white">
        <h5 class="modal-title text-white" id="staticBackdropLabel">ACTUALIZAR TIPO DE MATERIAL</h5>
        </div>
        <div class="modal-body">
<form action="">
    <div class="form-group">    
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                <label for="id">ID</label>
                <input type="text" id="id_TipMat" name="id_TipMat" readonly class="form-control">
            </div>
            <div class="form-group">
            <label for="update_description_TipMat">Tipo de Material</label>
                <input type="text"  autocomplete="off" name="update_description_TipMat" id="update_description_TipMat" class="form-control" maxlength="20">
            </div>
            </div>
        </div>
    </div>
</form>
        </div>
        <div class="modal-footer button_flex">
            <button class="btn btn-warning text-white button_style_2 cerrar_modal_2" onclick="Edit_TipMaterial()" data-dismiss="modal" id="TipMat">Actualizar</button>
            <button type="button" class="btn btn-danger button_style_2" data-dismiss="modal">Cancelar</button>
        </div>
    </div>
    </div>
</div>