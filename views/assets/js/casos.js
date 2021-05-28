/* REPORTES CASOS*/

function ver_reporte_caso(){
    $("#ver_button_reporte").removeAttr("hidden");
}

function cerrar_reporte_caso(){
    $("#ver_button_reporte").attr("hidden",true);
    $('#fecha1Caso').val('');
    $('#fecha2Caso').val('');
}


function ajax_reporte_caso(){
    let dataString = $('#form_reporte_caso').serialize();
    $.ajax({
        method:"POST",
        url:'controllers/C_reporte_caso2.php',
        data:dataString,
            success: function(data){
                alertas_crud("success","¡Reporte de Caso exitoso!","#28a745");
                let dataString = JSON.parse(data);
                let template = `<div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="sergio_el_rey_del_ajax" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Numero del Caso</th>
                                    <th>Descripción</th>
                                    <th>Dirección</th>
                                    <th>Prioridad</th>
                                    <th>Fecha de Registro</th>
                                    <th>Imagen del daño</th>
                                </tr>
                            </thead>
                            <tbody>
                            `;
                for (let i = 1; i < dataString.length; i++) {
                    template += `
                <tr>
                    <td>${ dataString[i].numero_Caso    } </td>
                    <td>${ dataString[i].descripcion    } </td>
                    <td>${ dataString[i].direccion      } </td>
                    <td>${ dataString[i].prioridad      } </td>
                    <td>${ dataString[i].fecha_registro } </td>
                    <td> <img src="${  dataString[i].iagen_del_dano }" alt="imagen del caso" width="100" height="100" ></img></td>
                `}`
                </tr>
                </tbody>
                        </table>
                    </div>
                </div>
            </div>
                `;
                $('#table_reporte_caso').html(template);
                Datatable();
            }
        });
}

/* THEND REPORTES CASO */


/* IMG */

// Vista previa de la foto antes de insertar
$('#adjuntoCaso').on('change',function(e){
    // Creamos el objeto de la clase FileReader
    let reader = new FileReader();
    // Leemos el archivo subido y se lo pasamos a nuestro fileReader
    reader.readAsDataURL(e.target.files[0]);
    // Le decimos que cuando este listo ejecute el código interno
    reader.onload = function() {
        $('#imgCaso').attr("src",reader.result);
    };
});

// Mostrar imagen por defecto

function default_img2(){
    $("#imgCaso").attr("src","views/assets/img/casos/defalut/default.jpg");
    //El draggable nos permite activar o desactivar la opcion de arrstrar elementos html
    $("#imgCaso").attr("draggable","false");
}

//El draggable nos permite activar o desactivar la opcion de arrstrar elementos html
$("#foto2_caso").attr("draggable","false");


/* CRUD */

/* <-- AJAX --> */
function insert_caso(){

    // captura del valor de los inputs dentro de variables
    let usuario_caso = $("#usuario_caso").val();
    let numero_caso = $("#numero_caso").val();
    let descripcion_caso = $("#descripcion_caso").val();
    let direccion_caso = $("#direccion_caso").val();
    let profundidad_caso = $("#profundidad_caso").val();
    let largo_caso = $("#largo_caso").val();
    let ancho_daño = $("#ancho_daño").val();
    let tipo_daño = $("#tipo_daño").val();
    let prioridad_daño = $("#prioridad_daño").val();

    //condicion para evitar campos vacios
    if ( usuario_caso == 0 || numero_caso.length == 0 || descripcion_caso.length == 0 || direccion_caso.length == 0 || profundidad_caso.length == 0 || largo_caso.length == 0 || ancho_daño.length == 0 || tipo_daño.length == 0 || prioridad_daño.length == 0){ 
        //retirar el data-dismiss para que no se cierre la modal
        $(".cerrar_modal_2").removeAttr("data-dismiss");
        //Alerta
        alertas("¡Los campos no pueden quedar vacíos!","#17a2b8");
    }else{
        //poner el data-dismiss para que se cierre la modal
        $(".cerrar_modal_2").attr("data-dismiss","modal");
        // Captura de datos del form
        let formElement = $("#form_insertar_caso")[0];
        datos = new FormData(formElement);
        datos.append('archiva',$('#adjuntoCaso')[0].files[0]);
        let destino = "index.php?ruta=C_caso";
        $.ajax({
            url: destino,
            type:'POST',
            contentType:false,
            data:datos,
            processData: false,
            cache: false,
            success: function(){ 
            alertas_crud("success","¡Caso Registrado con éxito!","#28a745");
            $("#logCaso").load("index.php?ruta=C_caso #logCaso");
            },
            error:function(){
                alert("Algo ha fallado");       
            }
        });
    }
}

/* <-- MODAL ATIVAR CASO --> */
function activar_modal(id){
    $("#modal_activar_caso .modal-body .id_activar_caso").val(id);
}

/* <-- AJAX ATIVAR CASO --> */
    function activar_caso() {
        let dataString = $('#form_activar_caso').serialize();
        $.ajax({
        method:"POST",
        url:'index.php?ruta=C_caso',
        data:dataString,
            success: function(){
                $("#logCaso").load("index.php?ruta=C_caso #logCaso");
                alertas_crud("success","¡Caso Habilitado con éxito!","#28a745");
            }
        });
}

/* <-- MODAL ELIMINAR CASO --> */
function delete_modal(id){
    $("#modal_eliminar_caso .modal-body .id_delete_caso").val(id);
}

/* <-- AJAX ELIMINAR CASO --> */
    function delete_caso() {
        let dataString = $('#form_eliminar_caso').serialize();
        $.ajax({
        method:"POST",
        url:'index.php?ruta=C_caso',
        data:dataString,
            success: function(){
                $("#logCaso").load("index.php?ruta=C_caso #logCaso");
                alertas_crud("success","¡Caso Inhabilitado con éxito!","#dc3545");
            }
        });
}

/* DETALLE DEL CASO */

function detalleCaso(usuario_caso,numero_caso,direccion_caso,profundidad_caso,largo_caso,ancho_daño,tipo_daño,prioridad_daño,estado_daño,fecha_daño,descripcion_caso,foto_caso){

    $("#modal_detalle_caso .modal-body .usuario_caso").val(usuario_caso);
    $("#modal_detalle_caso .modal-body .numero_caso").val(numero_caso);
    $("#modal_detalle_caso .modal-body .direccion_caso").val(direccion_caso);
    $("#modal_detalle_caso .modal-body .profundidad_caso").val(profundidad_caso);
    $("#modal_detalle_caso .modal-body .largo_caso").val(largo_caso);
    $("#modal_detalle_caso .modal-body .ancho_daño").val(ancho_daño);
    $("#modal_detalle_caso .modal-body .tipo_daño").val(tipo_daño);
    $("#modal_detalle_caso .modal-body .prioridad_daño").val(prioridad_daño);
    $("#modal_detalle_caso .modal-body .estado_daño").val(estado_daño);
    $("#modal_detalle_caso .modal-body .fecha_daño").val(fecha_daño);
    $("#modal_detalle_caso .modal-body .descripcion_caso").val(descripcion_caso);
    $("#modal_detalle_caso .modal-body #foto_caso").attr("src",foto_caso);
    if (foto_caso=="") {
        $("#foto_caso").attr("src","views/assets/img/casos/defalut/default.jpg");
    }
}

/* ACTUALYZAR CASO */

// Vista previa de la foto antes de actualizar
$('#adjunto2_caso').on('change',function(e){
    // Creamos el objeto de la clase FileReader
    let reader = new FileReader();
    // Leemos el archivo subido y se lo pasamos a nuestro fileReader
    reader.readAsDataURL(e.target.files[0]);
    // Le decimos que cuando este listo ejecute el código interno
    reader.onload = function() {
        $('#foto2_caso').attr("src",reader.result);
    }
});

function actualizarCaso(id_caso_update,numero_caso,descripcion_caso,direccion_caso,profundidad_caso,largo_caso,ancho_daño,tipo_daño,prioridad_daño,foto2_caso){
    $("#modal_actualizar_caso .modal-body .id_caso_update").val(id_caso_update);
    $("#modal_actualizar_caso .modal-body .numero_caso_update").val(numero_caso);
    $("#modal_actualizar_caso .modal-body .descripcion_caso_update").val(descripcion_caso);
    $("#modal_actualizar_caso .modal-body .direccion_caso_update").val(direccion_caso);
    $("#modal_actualizar_caso .modal-body .profundidad_caso_update").val(profundidad_caso);
    $("#modal_actualizar_caso .modal-body .largo_caso_update").val(largo_caso);
    $("#modal_actualizar_caso .modal-body .ancho_daño_update").val(ancho_daño);

    $("#tipo_daño_update option[value='"+tipo_daño+"']").attr("selected",true);
    $("#prioridad_daño_update option[value='"+prioridad_daño+"']").attr("selected",true);


    $("#modal_actualizar_caso .modal-body #foto2_caso").attr("src",foto2_caso);
    if (foto2_caso=="") {
        $("#foto2_caso").attr("src","views/assets/img/casos/defalut/default.jpg");
    }
    $("#modal_actualizar_caso .modal-body .oldimg_caso").attr("value",foto2_caso);

}

/* <-- AJAX ACTUALIZAR CASO --> */

function update_caso(){

    // captura del valor de los inputs dentro de variables
    let usuario_caso = $("#usuario_caso_update").val();
    let numero_caso = $("#numero_caso_update").val();
    let descripcion_caso = $("#descripcion_caso_update").val();
    let direccion_caso = $("#direccion_caso_update").val();
    let profundidad_caso = $("#profundidad_caso_update").val();
    let largo_caso = $("#largo_caso_update").val();
    let ancho_daño = $("#ancho_daño_update").val();
    let tipo_daño = $("#tipo_daño_update").val();
    let prioridad_daño = $("#prioridad_daño_update").val();

    //condicion para evitar campos vacios
    if ( usuario_caso.length == 0 || numero_caso.length == 0 || descripcion_caso.length == 0 || direccion_caso.length == 0 || profundidad_caso.length == 0 || largo_caso.length == 0 || ancho_daño.length == 0 || tipo_daño.length == 0 || prioridad_daño.length == 0){ 
        //retirar el data-dismiss para que no se cierre la modal
        $(".cerrar_modal_2").removeAttr("data-dismiss");
        //Alerta
        alertas("¡Los campos no pueden quedar vacíos!","#17a2b8");
    }else{
        //poner el data-dismiss para que se cierre la modal
        $(".cerrar_modal_2").attr("data-dismiss","modal");
        // Captura de datos del form
        let formElement = $("#form_actualizar_caso")[0];
        datos = new FormData(formElement);
        datos.append('archiva2',$('#adjunto2_caso')[0].files[0]);
        let destino = "index.php?ruta=C_caso";
        $.ajax({
            url: destino,
            type:'POST',
            contentType:false,
            data:datos,
            processData: false,
            cache: false,
            success: function(){ 
            alertas_crud("success","¡Caso Actualizado con éxito!","#28a745");
            $("#logCaso").load("index.php?ruta=C_caso #logCaso");
            },
            error:function(){
                alert("Algo ha fallado");       
            }
        });
    }
}

//INSERTAR
$("#profundidad_caso").keyup(function(){              
    var ta      =   $("#profundidad_caso");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
}); 

$("#largo_caso").keyup(function(){              
    var ta      =   $("#largo_caso");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
}); 

$("#ancho_daño").keyup(function(){              
    var ta      =   $("#ancho_daño");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
}); 

//ACTUALIZAR
$("#profundidad_caso_update").keyup(function(){              
    var ta      =   $("#profundidad_caso_update");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
}); 

$("#largo_caso_update").keyup(function(){              
    var ta      =   $("#largo_caso_update");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
}); 

$("#ancho_daño_update").keyup(function(){              
    var ta      =   $("#ancho_daño_update");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
});