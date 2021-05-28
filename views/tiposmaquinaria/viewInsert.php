<div class="modal fade" id="modal_insertar_maquinaria" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header bg-info text-white">
        <h5 class="modal-title" id="staticBackdropLabel">AÑADIR TIPO DE MAQUINARIA</h5>
        </div>
        <div class="modal-body">
<form>
    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
            <label for="description_maquinaria">Tipo de Maquinaria</label>
                <input type="text"  autocomplete="off" name="description_maquinaria" id="description_maquinaria" class="form-control" maxlength="30">
            </div>
        </div>
    </div>
</form>
</div>
        <div class="modal-footer button_flex">
        <button class="btn btn-info button_style_insert_2 cerrar_modal_2 " onclick="Insert_Maquinaria()" data-dismiss="modal" id="TipMaq">Añadir</button>
            <button type="button" class="btn btn-danger button_style_insert_2" data-dismiss="modal">Cancelar</button>
        </div>
    </div>
    </div>
</div>