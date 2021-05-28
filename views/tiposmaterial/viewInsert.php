<div class="modal fade" id="modal_insertar_material" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header bg-info text-white">
        <h5 class="modal-title" id="staticBackdropLabel">AÑADIR TIPO DE MATERIAL</h5>
        </div>
        <div class="modal-body">
<form>
    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
            <label for="description_material">Tipo de Material</label>
                <input type="text"  autocomplete="off" name="description_material" id="description_material" class="form-control" maxlength="20">
            </div>
        </div>
    </div>
</form>
</div>
        <div class="modal-footer button_flex">
        <button class="btn btn-info button_style_insert_2 cerrar_modal_2" onclick="Insert_Material()" data-dismiss="modal" id="TipMat">Añadir</button>
            <button type="button" class="btn btn-danger button_style_insert_2" data-dismiss="modal">Cancelar</button>
        </div>
    </div>
    </div>
</div>