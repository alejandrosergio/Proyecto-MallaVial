/* <-- MODALES --> */

// ABRIR MODAL ELIMINAR BODEGA
function delete_cellars(id){
    $("#modal_eliminar_bodega .modal-body .id").val(id);
    rows1 = validateForeing("tblmaterial","tblbodega_bod_id",id);
    rows2 = validateForeing("tblmaquinaria","tblbodega_bod_id",id);
    rows3 = validateForeing("tblherramienta","tblbodega_bod_id",id);
    rows  = rows1+rows2+rows3;
}

// ABRIR MODAL ACTUALIZAR BODEGA
function update_cellars(id,des,dir,zon){
    $("#modal_actualizar_bodega .modal-body .id").val(id);
    $("#modal_actualizar_bodega .modal-body .cellardesc2").val(des);
    $("#modal_actualizar_bodega .modal-body .cellardire2").val(dir);
    $("#cellarzon2 option[value='"+zon+"']").attr("selected",true);
}

// ---AJAX---

// INSERTAR BODEGA
function insert_cellar() {
    //captura del valor de los inputs dentro de variables
    descripcion = $("#cellardesc").val();
    direccion = $("#cellardire").val();
    zona = $("#cellarzon").val();
    //condicion para evitar campos vacios
    if (descripcion.length == 0 || direccion.length == 0 || zona.length == 0){ 
        //retirar el data-dismiss para que no se cierre la modal
        $(".cerrar_modal_2").removeAttr("data-dismiss");
        //Alerta
        alertas("¡Los campos no pueden quedar vacíos!","#17a2b8");
    }else{
        //poner el data-dismiss para que se cierre la modal
        $(".cerrar_modal_2").attr("data-dismiss","modal");
        //Captura de datos del form
        let dataString = $('#form_insertar_bodega').serialize();
        let accion = "&insert_cellar=1";
        dataString = dataString + accion;
        $.ajax({
        method:"POST",
        url:'index.php?ruta=C_cellar',
        data:dataString,
        success: function(){
            $('#logcellar').load('index.php?ruta=C_cellar #logcellar');
            alertas_crud("success","¡Bodega Registrada con éxito!","#28a745");
        }
    });
    }
}

// ELIMINAR BODEGA
function delete_cellar() {
    if(rows == 1 || rows == 2 || rows == 3){
        alertas("¡Acción denegada! El registro se encuentra asociado a otro","#17a2b8");
      }else if(rows ==0){
    let dataString = $('#form_eliminar_bodega').serialize();
    let accion = "&delete_cellar=1";
    dataString = dataString + accion;
    $.ajax({
    method:"POST",
    url:'index.php?ruta=C_cellar',
    data:dataString,
    success: function(){
        $('#logcellar').load('index.php?ruta=C_cellar #logcellar');
        alertas_crud("success","¡Bodega Eliminada con éxito!","#dc3545");
    }
});
}
}

// EDITAR BODEGA
function update_cellar(){
    //captura del valor de los inputs dentro de variables
    descripcion = $("#cellardesc2").val();
    direccion = $("#cellardire2").val();
    
    //condicion para evitar campos vacios
    if(descripcion.length == 0 || direccion.length == 0){
        //retirar el data-dismiss para que no se cierre la modal
        $(".cerrar_modal_2").removeAttr("data-dismiss");
        //Alerta
        alertas("¡Los campos no pueden quedar vacíos!","#ffc107");
    }else{
        //poner el data-dismiss para que se cierre la modal
        $(".cerrar_modal_2").attr("data-dismiss","modal");
        //Captura de datos del form
        let dataString = $('#form_actualizar_bodega').serialize();
        let accion = "&update_cellar=1";
        dataString = dataString + accion;
        $.ajax({
        method:"POST",
        url:'index.php?ruta=C_cellar',
        data:dataString,
        success: function(){
            $('#logcellar').load('index.php?ruta=C_cellar #logcellar');
            alertas_crud("success","¡Bodega Actualizada con éxito!","#28a745");
        }
        });
    }
}