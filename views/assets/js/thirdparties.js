/* FUNCION ENVIAR ID A LA MODAL DE ELIMINAR */

function deleteThirdparties(id){
    $("#modal_eliminar_tercero .modal-body .id_delete").val(id);
}

/* FUNCION ENVIAR DATOS A LA MODAL DE DETALLE */

function detailThirdparties(id,docu,name,name2,ape,ape2,corre,dcc,tel,fecha,estado,rol,tdoc){

$("#modal_detalle_tercero .modal-body .id ").val(id);  $("#modal_detalle_tercero .modal-body .docu ").val(docu);  $("#modal_detalle_tercero .modal-body .name ").val(name);  $("#modal_detalle_tercero .modal-body .name2 ").val(name2);  $("#modal_detalle_tercero .modal-body .ape ").val(ape);  $("#modal_detalle_tercero .modal-body .ape2 ").val(ape2);  $("#modal_detalle_tercero .modal-body .corre ").val(corre);  $("#modal_detalle_tercero .modal-body .dcc ").val(dcc);  $("#modal_detalle_tercero .modal-body .tel ").val(tel);  $("#modal_detalle_tercero .modal-body .fecha ").val(fecha);  $("#modal_detalle_tercero .modal-body .estado ").val(estado);  $("#modal_detalle_tercero .modal-body .rol ").val(rol);  $("#modal_detalle_tercero .modal-body .tdoc ").val(tdoc);

}

/* FUNCION ENVIAR DATOS A LA MODAL DE ACTUALIzAR */

function editThird(id,docu,name,name2,ape,ape2,corre,dcc,tel,tdoc,rol){  

$("#modal_actualizar_tercero .modal-body .id ").val(id);  $("#modal_actualizar_tercero .modal-body .docu ").val(docu);  $("#modal_actualizar_tercero .modal-body .name ").val(name);  $("#modal_actualizar_tercero .modal-body .name2 ").val(name2);  $("#modal_actualizar_tercero .modal-body .ape ").val(ape);  $("#modal_actualizar_tercero .modal-body .ape2 ").val(ape2);  $("#modal_actualizar_tercero .modal-body .corre ").val(corre);  $("#modal_actualizar_tercero .modal-body .dcc ").val(dcc);  $("#modal_actualizar_tercero .modal-body .tel ").val(tel);

$("#select_editar_tercero_tdoc option[value='"+tdoc+"']").attr("selected",true);
$("#select_editar_tercero_rol option[value='"+rol+"']").attr("selected",true);

}

/* AJAX */

/* insertar tercero */
function insertar_tercero(){

    docu = $("#docu_insert_tercero").val();  name1 = $("#name_tercero_i").val();  ape1 = $("#ape_tercero_i").val();  ape2 = $("#ape2_tercero_i").val();  correo = $("#corre_tercero_i").val();  drc = $("#drc_tercero_i").val(); tel = $("#tel_insert_tercero").val(); rol = $("#rol_tercero_i").val(); tdoc = $("#tdoc_tercero_i").val();

    if (docu.length>10 || docu.length<8) {
        $(".cerrar_modal_2").removeAttr("data-dismiss");
        alertas("¡Ingresa un documento válido!","#17a2b8");
        return false;
    }
    if (tel.length>10 || tel.length<7) {
        $(".cerrar_modal_2").removeAttr("data-dismiss");
        alertas("¡Ingresa un teléfono válido!","#17a2b8");
        return false;
    }

    if (docu.length == 0 || name1.length == 0 || ape1.length == 0 || ape2.length == 0 || correo.length == 0 || drc.length == 0 || tel.length == 0  || rol.length == 0 || tdoc.length == 0){ 
        $(".cerrar_modal_2").removeAttr("data-dismiss");
        alertas("¡Los campos no pueden quedar vacíos!","#17a2b8");
    }else{
        $(".cerrar_modal_2").attr("data-dismiss","modal");
        let dataString = $('#form_insertar_tercero').serialize();
        $.ajax({
            method:"POST",
            url:'index.php?ruta=C_thirdparties',
            data:dataString,
            success: function(){
                $('#load_tercero').load('index.php?ruta=C_thirdparties #load_tercero');
                alertas_crud("success","¡Tercero Registrado con éxito!","#28a745");
            }
        });
    }
}

/* editar tercero */

function actualizar_tercero(){

    name1 = $("#name_tercero").val();  ape1 = $("#ape_tercero").val();  ape2 = $("#ape2_tercero").val();  correo = $("#corre_tercero").val();  drc = $("#drc_tercero").val(); tel = $("#tel_tercero").val();

    if (tel.length>10 || tel.length<7) {
        $(".cerrar_modal_2").removeAttr("data-dismiss");
        alertas("¡Ingresa un teléfono válido!","#ffc107");
        return false;
    }

    if(name1.length == 0 || ape1.length == 0 || ape2.length == 0 || correo.length == 0 || drc.length == 0 || tel.length == 0){
        $(".cerrar_modal_2").removeAttr("data-dismiss");
        alertas("¡Los campos no pueden quedar vacíos!","#ffc107");
    }else{
        $(".cerrar_modal_2").attr("data-dismiss","modal");
        let dataString = $('#form_actualizar_tercero').serialize();
        $.ajax({
            method:"POST",
            url:'index.php?ruta=C_thirdparties',
            data:dataString,
            success: function(){
                $('#load_tercero').load('index.php?ruta=C_thirdparties #load_tercero');
                alertas_crud("success","¡Tercero Actualizado con éxito!","#28a745");
            }
        });
    }
}

/* eliminar tercero */

function eliminar_tercero(){
    let dataString = $('#form_eliminar_tercero').serialize();
    $.ajax({
        method:"POST",
        url:'index.php?ruta=C_thirdparties',
        data:dataString,
        success: function(){
            $('#load_tercero').load('index.php?ruta=C_thirdparties #load_tercero');
            alertas_crud("success","¡Tercero Eliminado con éxito!","#dc3545");
        }
    });
}

/* WHITE SPACE */

$("#docu_insert_tercero").keyup(function(){              
    var ta      =   $("#docu_insert_tercero");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
});

$("#tel_insert_tercero").keyup(function(){              
    var ta      =   $("#tel_insert_tercero");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
});

$("#tel_tercero").keyup(function(){              
    var ta      =   $("#tel_tercero");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
}); 