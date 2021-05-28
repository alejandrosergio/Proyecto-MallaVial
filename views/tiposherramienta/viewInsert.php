<div class="modal fade" id="modal_insertar_herramienta" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header bg-info text-white">
        <h5 class="modal-title" id="staticBackdropLabel">AÑADIR TIPO DE HERRAMIENTA</h5>
        </div>
        <div class="modal-body">
<form id="Form-Insert-Daño">
    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
            <label for="description_herramienta">Tipo de Herramienta</label>
                <input type="text"  autocomplete="off" name="description_herramienta" id="description_herramienta" class="form-control" maxlength="30">
            </div>
        </div>
    </div>
</form>
</div>
        <div class="modal-footer button_flex">
        <button class="btn btn-info button_style_insert_2 cerrar_modal_2" onclick="Insert_Herramienta()" data-dismiss="modal" id="TipHer">Añadir</button>
            <button type="button" class="btn btn-danger button_style_insert_2" data-dismiss="modal">Cancelar</button>
        </div>
    </div>
    </div>
</div>