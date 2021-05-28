/* <-- MODALES --> */
/* <-- MODAL DETALLE USUARIO --> */
function detailmaterial(id,nombre,num_fac1,concep1,costo,min,max,exis,venci,regis,tip_mat,est,bod,pro){

    $("#modal_detalle_material .modal-body .id").val(id);
    $("#modal_detalle_material .modal-body .nombre").val(nombre);
    $("#modal_detalle_material .modal-body .num_fac1").val(num_fac1);
    $("#modal_detalle_material .modal-body .concep1").val(concep1);
    $("#modal_detalle_material .modal-body .costo").val(costo);
    $("#modal_detalle_material .modal-body .min").val(min);
    $("#modal_detalle_material .modal-body .max").val(max);
    $("#modal_detalle_material .modal-body .exis").val(exis);
    $("#modal_detalle_material .modal-body .venci").val(venci);
    $("#modal_detalle_material .modal-body .regis").val(regis);
    $("#modal_detalle_material .modal-body .tip_mat").val(tip_mat);
    $("#modal_detalle_material .modal-body .est").val(est);
    $("#modal_detalle_material .modal-body .bod").val(bod);
    $("#modal_detalle_material .modal-body .pro").val(pro);
}

/* <-- MODAL ELIMINAR MATERIAL --> */
function delete_materials(id){
    $("#modal_eliminar_material .modal-body .id").val(id);
}

/* <-- MODAL ACTUALIZAR MATERIAL --> */
function update_materials(id2,mat2des,num_fac2,conc2,mat2costo,mat2min,mat2max,mat2exis,mat2fecven,tipo,bod,pro){
    $("#modal_actualizar_material .modal-body .id2").val(id2);
    $("#modal_actualizar_material .modal-body .mat2des").val(mat2des);
    $("#modal_actualizar_material .modal-body .num_fac2").val(num_fac2);
    $("#modal_actualizar_material .modal-body .conc2").val(conc2);
    $("#modal_actualizar_material .modal-body .mat2costo").val(mat2costo);
    $("#modal_actualizar_material .modal-body .mat2min").val(mat2min);
    $("#modal_actualizar_material .modal-body .mat2max").val(mat2max);
    $("#modal_actualizar_material .modal-body .mat2exis").val(mat2exis);
    $("#modal_actualizar_material .modal-body .mat2fecven").val(mat2fecven);
    $("#mat2tip option[value='"+tipo+"']").attr("selected",true);
    $("#bod2 option[value='"+bod+"']").attr("selected",true);
    $("#pro2 option[value='"+pro+"']").attr("selected",true);
}



function stock_material(id3,stockexis,stock_maximo,stock_minimo){
    $("#modal_stock_material .modal-body .id3").val(id3);
    $("#modal_stock_material .modal-body .stoex").val(stockexis);
    $("#modal_stock_material .modal-body .stock_maximo").val(stock_maximo);
    $("#modal_stock_material .modal-body .stock_minimo").val(stock_minimo);
}

/* <-- AJAX --> */

/* <-- AJAX INSERTAR MATERIAL --> */
function insert_material() {
    //captura del valor de los inputs dentro de variables
    descripcion = $("#matdes").val();
    factura = $("#num_fac").val();
    concepto = $("#conc").val();
    costo = $("#matcos").val();
    minimo = $("#matmin").val();
    maximo = $("#matmax").val();
    existencia = $("#matexi").val();
    tipo_material = $("#tipmat").val();
    bodega = $("#bod").val();
    proveedor = $("#pro").val();
    //condicion para evitar campos vacios
    if (descripcion.length == 0 || factura.length == 0 || concepto.length == 0 || costo.length == 0 || minimo.length == 0 || maximo.length == 0 || existencia.length == 0 || tipo_material.length == 0 || bodega.length == 0 || proveedor.length == 0){ 
        //retirar el data-dismiss para que no se cierre la modal
        $(".cerrar_modal_2").removeAttr("data-dismiss");
        //Alerta
        alertas("¡Los campos no pueden quedar vacíos!","#17a2b8");
    }else{
        //poner el data-dismiss para que se cierre la modal
        $(".cerrar_modal_2").attr("data-dismiss","modal");
        let dataString = $('#form_insertar_material').serialize();
        let accion = "&insert_material=1";
        dataString = dataString + accion;
        $.ajax({
        method:"POST",
        url: 'index.php?ruta=C_material',
        data:dataString,
        success: function(){
            $('#logmaterial').load('index.php?ruta=C_material #logmaterial');
            alertas_crud("success","¡Material Registrado con éxito!","#28a745");
        }
        });
    }
}

/* <-- AJAX ELIMINAR MATERIAL --> */
function delete_material() {
    let dataString = $('#form_eliminar_material').serialize();
    let accion = "&delete_material=1";
    dataString = dataString + accion;
    $.ajax({
    method:"POST",
    url:'index.php?ruta=C_material',
    data:dataString,
    success: function(){
        $('#logmaterial').load('index.php?ruta=C_material #logmaterial');
        alertas_crud("success","¡Material Eliminado con éxito!","#dc3545");
    }
    });
}

/* <-- AJAX ACTUALIZAR MATERIAL --> */
function update_material(){
    descripcion = $("#mat2des").val();
    factura = $("#num_fac2").val();
    concepto = $("#conc2").val();
    costo = $("#mat2cos").val(); 
    minimo = $("#mat2min").val();
    maximo = $("#mat2max").val();
    existencia = $("#mat2exi").val();
    //condicion para evitar campos vacios
    if (descripcion.length == 0 || factura.length == 0 || concepto.length == 0 || costo.length == 0 || minimo.length == 0 || maximo.length == 0){ 
        //retirar el data-dismiss para que no se cierre la modal
        $(".cerrar_modal_2").removeAttr("data-dismiss");
        //Alerta
        alertas("¡Los campos no pueden quedar vacíos!","#ffc107");
    }else if(parseInt(maximo) < parseInt(existencia) || parseInt(minimo) > parseInt(existencia) ){
        //retirar el data-dismiss para que no se cierre la modal
        $(".cerrar_modal_2").removeAttr("data-dismiss");
        //Alerta
        alertas("¡No puedes agregar un stock con este valor!","#17a2b8");
    }else{
        $(".cerrar_modal_2").attr("data-dismiss","modal");
        let dataString = $('#form_actualizar_material').serialize();
        let accion = "&update_material=1";
        dataString = dataString + accion;
        $.ajax({
        method:"POST",
        url:'index.php?ruta=C_material',
        data:dataString,
        success: function(){
            $('#logmaterial').load('index.php?ruta=C_material #logmaterial');
            alertas_crud("success","¡Material Actualizado con éxito!","#28a745")
        }
        });
        }
}
/* <-- FUNCION WHITESPACE--> */
//.keyup = El evento se produce cuando se suelta una tecla del teclado.
//.replace = El método busca en una cadena un valor especificado o una expresión regular y devuelve una nueva cadena donde se reemplazan los valores especificados.
//Las expresiones regulares son patrones que se utilizan para hacer coincidir combinaciones de caracteres en cadenas.
//expresion regular: es como un selector en donde se establecen unas reglas, selecciona elementos que esten dentro de los slash /a/, la letra g significa global, se le conoce como bandera, sino esta activada hara conicidencia con el primer valor que se asemeje pero no accede a todos
//.val El método se utiliza principalmente para obtener los valores de los elementos de formulario
//Cada vez que se ingrese un espacio en blanco en la caja del input text simplemente se eliminará
//Porque es reemplado por la nueva cadena pero sin espacios.
/* <-- WHITESPACE MODAL INSERTAR MATERIAL--> */
$("#matcos").keyup(function(){        
    
    var ta      =   $("#matcos");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
}); 
$("#matmin").keyup(function(){              
    var ta      =   $("#matmin");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
}); 
$("#matmax").keyup(function(){              
    var ta      =   $("#matmax");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
}); 
$("#matexi").keyup(function(){              
    var ta      =   $("#matexi");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
});

$("#stocex").keyup(function(){              
    var ta      =   $("#stocex");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
}); 


$("#mat2min").keyup(function(){              
    var ta      =   $("#mat2min");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
});

$("#mat2exi").keyup(function(){              
    var ta      =   $("#mat2exi");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
});


$("#mat2cos").keyup(function(){              
    var ta      =   $("#mat2cos");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
});


$("#mat2max").keyup(function(){              
    var ta      =   $("#mat2max");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
});


$("#stock_entrante").keyup(function(){              
    var ta      =   $("#stock_entrante");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
});


/* Funcion para capturar los valores del stock */

function add_stock_material(){
    let stock_entrante = $("#stock_entrante").val();
    let stock_anterior = $("#stock_anterior").val();
    let stock_maximo = $("#stock_maximo").val();
    let stock_minimo = $("#stock_minimo").val();
    let factura = $("#num_fac_stock").val();
    let concepto = $("#concepto_sotck").val();
    let proveedor = $("#pro3").val();
    let stock_total = parseInt(stock_anterior) + parseInt(stock_entrante);

    if (stock_entrante.length == 0 || stock_anterior.length == 0 || factura.length == 0 || concepto.length == 0 || proveedor.length == 0){ 
        //retirar el data-dismiss para que no se cierre la modal
        $(".cerrar_modal_2").removeAttr("data-dismiss");
        //Alerta
        alertas("¡Los campos no pueden quedar vacíos!","#17a2b8");
    }else if(stock_total>stock_maximo || stock_entrante<=0){
        //retirar el data-dismiss para que no se cierre la modal
        $(".cerrar_modal_2").removeAttr("data-dismiss");
        //Alerta
        alertas("¡No puedes agregar un stock con este valor!","#17a2b8");
    }else{
        $(".cerrar_modal_2").attr("data-dismiss","modal");
        let dataString = $('#form_stock_material').serialize();
        dataString += '&stock_total=' + stock_total;
        $.ajax({
        method:"POST",
        url:'index.php?ruta=C_material',
        data:dataString,
        success: function(){
            $('#logmaterial').load('index.php?ruta=C_material #logmaterial');
            alertas_crud("success","¡Stock Añadido con éxito!","#28a745")
            }
        });
    }
}

    // function validar_stock(){

    //     let stock_minimo    = $("#stock_minimo").val();
    //     let stock_maximo    = $("#stock_maximo").val();
    //     let stock_actual    = $("#stock_anterior").val();
    //     let stock_entrante  = $("#stock_entrante").val();

    //     let valor = parseInt(stock_maximo) - parseInt(stock_actual);

    //     if (stock_actual >= stock_maximo){
    //         $('#captura_valores_stock_material').hide();
    //         $("#cerrar_button_valy").css({"background-color": "#28a745", "width": "100%", "border-color": "#28a745"});
    //         $("#stock_entrante").attr('type','text');
    //         $('.stock_entrantee').val("Stock Al Maximo");
    //         $("#stock_entrante").attr("readonly","readonly");
    //         alertas("¡El Stock alcanzo su limite!","#dc3545");
    //     } else if (stock_entrante > stock_maximo){
    //         $('.stock_entrantee').val(valor);
    //         alertas("¡No puedes superar el stock maximo!","#dc3545");
    //     } else if (stock_entrante <= 0){
    //         $('.stock_entrantee').val(valor);
    //         alertas("¡No puedes agregar un stock con este valor!","#dc3545");
    //     }/* else if (stock_entrante < stock_minimo){
    //         $('.stock_entrantee').val(stock_minimo);
    //         alertas("¡No puedes agregar un stock menor al Stock minimo!","#dc3545");
    //     } */
    // }
