/* <-- MODALES --> */

/* <-- MODAL DETALLE USUARIO --> */
var total;
function  modal_detalles(id,tip_ord){
        detalle_casos(id,tip_ord); 
        detalle_insumos(id,tip_ord);
}



// function checkAnexo(){
//     let checkboxValue = $(".added").val();

//     if(checkboxValue >= 1){
//         $('#button_anexo').show();
//         $( "#removeAnexo" ).removeClass( "alert alert-danger anexarCheck" );
//         document.getElementById("removeAnexo").innerHTML="";
//     }else{
//         $('#button_anexo').hide();
//         $('#removeAnexo').addClass('alert alert-danger anexarCheck');
//         document.getElementById("removeAnexo").innerHTML="<strong>¡Para crear una orden de mantenimiento adjunte al menos un caso!</strong>";
//     }
// }

function detalle_casos(id,tip_ord){
    
    $.ajax({
        method:"POST",
        url: './controllers/C_modal_caso.php',
        datatype:'json',
        data:{id_orden_caso:id},
        success: function(data){   
            let datos = JSON.parse(data);
            var template='';
            for(let i=0;i<datos.length;i++){
            template +=`
            <tr>
                <td>${datos[i].numero_caso}</td>
                <td>${datos[i].dirección}</td>
                <td>${datos[i].profundidad+'cm'}</td>
                <td>${datos[i].largo+'cm'}</td>
                <td>${datos[i].ancho+'cm'}</td>
                <td>${datos[i].prioridad}</td>
                <td>${datos[i].tipo_daño}</td>usu_apellido2
                <td>${datos[i].usuario_nombre+" "+datos[i].usuario_apellido1+" "+datos[i].usuario_apellido2}</td>
            
            </tr>
            `;
            
            }
            if (tip_ord=="realizada") {
                $("#modal_detalle_orden_realizada #table_caso").html(template);
            }
            else if (tip_ord=="proceso") { 
                $("#modal_detalle_finalizar_orden #table_caso").html(template);
            }
            
            $("#table_caso").html(template); 
            
        },
        error: function () {  
            console.log("la petición no pudo ser ejecutada");
        }
    });
    }

function detalle_insumos(id,tip_ord){
    $.ajax({
        method:"POST",
        url: './controllers/C_modal_insumos.php',
        datatype:'json',
        data:{id_orden_insumo:id},
        success: function(data){   
            let datos = JSON.parse(data);
            let total=0;
            var template='';
            for(let i=1;i<datos.length;i++){
            
            totalMaterial=parseInt(datos[i].existencia)*parseInt(datos[i].costo);
            pesus="$";
            if(totalMaterial==0){
                totalMaterial="N/A";
            }
            if(datos[i].costo==0){
                datos[i].costo="N/A";
                pesus="";
            }
            if (isNaN(totalMaterial)) {
                totalMaterial="N/A";
                pesus="";
            }
            template +=`
            <tr>
                <td>${datos[i].descripcion}</td>
                <td>${datos[i].existencia}</td>
                <td>${pesus+datos[i].costo}</td>
                <td>${pesus+totalMaterial}</td>
            </tr>
            `;
            if(totalMaterial=="N/A"){
                totalMaterial=0;
            }
            total=parseInt(total)+parseInt(totalMaterial);
            }
            template +=`<tr><td colspan='4'>${"TOTAL: "+"$"+total}</td></tr>`;
            if(tip_ord=="realizada"){
                $("#modal_detalle_orden_realizada #table_insumos").html(template);
            }
            
            else if (tip_ord=="proceso") {
                $("#modal_detalle_finalizar_orden #table_insumos").html(template);
            }
            $("#table_insumos").html(template);
            $("#total").html("TOTAL: " );

        },
        error: function () {  
            console.log("la petición no pudo ser ejecutada");
        }
    });
}


function AprobarOrden(id){
    $("#modal_aprobar_orden .modal-body #id_aprobar_ord").val(id);
}

function aprobar_orden_ajax(){
    let dataString = $('#form_aprobar_orden').serialize();
    let accion = "&aprobar_orden=1";
    dataString = dataString + accion;  
    $.ajax({
        method:"POST",
        url: './controllers/C_orden.php',
        data:dataString,
        success: function(data){
            console.log(data);
            $('#log_orden_pendiente').load('index.php?ruta=C_ordenes_pestanas #log_orden_pendiente');
            $('#log_orden_finalizar').load('index.php?ruta=C_ordenes_pestanas #log_orden_finalizar');
            alertas_crud("success","¡Orden Aprobada Con Exito!","#28a745");
        }
    });
}

/* <-- MODAL ELIMINAR ORDEN PENDIENTE --> */
function delete_order_peding(id){
    $("#modal_eliminar_orden_pendiente .modal-body .id_eliminar_orden_pendiente").val(id);
}

/* <-- AJAX ELIMINAR ORDEN PENDIENTE --> */
function delete_order_p() {
    let dataString = $('#form_eliminar_orden_pendiente').serialize();
    let accion = "&delete_orden_pendiente=1";
    dataString = dataString + accion;
    $.ajax({
    method:"POST",
    url:'index.php?ruta=C_ordenes_pestanas',
    data:dataString,
    success: function(){
        $('#log_orden_pendiente').load('index.php?ruta=C_ordenes_pestanas #log_orden_pendiente');
        $('#logCaso').load('index.php?ruta=C_ordenes_pestanas #logCaso');
        alertas_crud("success","¡Orden de Mantenimiento Eliminada con éxito!","#dc3545");
    }
    });
}

//SLECT PARA ELEJIR EL TIPO DE INSUMO (MATERIAL, MAQUINARIO O HERRAMIENTA)
$("#tp-orden_insumo").on("change",function(){
    let insumotbl = $("#tp-orden_insumo").val();
    $.ajax({
        type:'POST',
        url:'./controllers/C_orden.php',
        data:{insert_orden:"",insumotbl:insumotbl},
        success:function(data){

            let datos = JSON.parse(data);
            var template='';
            template +=`<option value="1">Seleccione...</option>`;
            for(let i=0;i<datos.length;i++){
            template +=`
            <option class=""  value="${datos[i].id_insumo},${datos[i].costo_material},${datos[i].insumo},${datos[i].tp_insumo},${datos[i].existencia}">${datos[i].insumo}</option>
            `;
            }
            $("#orden_insumo").html(template);
            
    
        },
        error:function(){
        alert("vayase a dormir no joda");
        }
    
    });
    
});
    //SELECT PARA QUE MUESTRA LAS PRIORIDADES DISPONIBLES PRA UNA ORDEN
    $(".openorder").on("click",function(){
        $.ajax({
            type:'POST',
            url:'./controllers/C_orden.php',
            data:{selector_prioridad:""},
            success:function(data){
                let datos = JSON.parse(data);
                var template='';
                template +=`<option>Seleccione Prioridad</option>`;
                for(let i=0;i<datos.length;i++){
                template +=`<option value="${datos[i].id_prioridad}">${datos[i].des_prioridad}</option>`;
                }
                $("#orden_prioridad").html(template);
            },
            error:function(){
                alert("Error Garrafal");
            }
        });
    });

     //SELECT QUE MUESTRA TODOS LOS TERCEROS DISPONIBLES 
    $(".openorder").on("click",function(){
        $.ajax({
            type:'POST',
            url:'./controllers/C_orden.php',
            data:{tercero_orden:""},
            success:function(data){
                let datos = JSON.parse(data);
                var template='';
                template +=`<option value="">Seleccione Tercero</option>`;
                for(let i=0;i<datos.length;i++){
                template +=`
                <option value="${datos[i].id_ter}">${datos[i].ter_nombre+" "+datos[i].ter_apellido1+" "+datos[i].ter_apellido2}</option>
                `;
                    
                }
                $("#orden_tercero").html(template);
        
            },
            error:function(){
                alert("vayase a dormir no joda");
            }
        });
        
        });


          //VALIDACIÓN ESCONDER BONTON DE ADJUNTAR ORDEN
        contma = 0;
        contme = 0;
        function checkbox(){
            if( $(".case").is(':checked') ) {
                contma++;
                console.log("mas "+contma);
            }else{
                contme++;
                console.log("menos" +contme)
            }
            if(contma >contme){
                $("#removeAnexo").hide();
               $("#adjuntar_ord").removeAttr("hidden");
               
            }else if(contme == 1){
                $("#adjuntar_ord").attr("hidden",true);
                $("#removeAnexo").show();
            }
        }
 
       //MOSTRAR CASOS CUANDO ABRO LA MODAL
        $(".openorder").on("click",function(){
          id_casosList =[];
          $("input:checkbox:checked").each(   
            function() {
                id_casosList.push($(this).val())
            }
            
        );
        
          id_List = JSON.stringify(id_casosList); 
          $.ajax({
            type:'POST',
            url:'./controllers/C_orden.php',
            data:{casos_list:id_List},
            success:function(data){
                caso_info = JSON.parse(data);
                var template =``;
                for(let i=1;i<caso_info.length;i++){
                    
                    //LISTAR DE LOS CASOS 
                        template +=`
                        <tr>
                          <td>${caso_info[i].Numero_Tramo}</td> 
                          <td>${caso_info[i].profundidad}</td> 
                          <td>${caso_info[i].largo}</td> 
                          <td>${caso_info[i].ancho}</td>
                          <td>${caso_info[i].tipo_daño}</td> 
                        </tr>
                        `;        
                      
                }
                caso_info.length =0;
                $("#list_casos").html(template);
            },
            error:function(){
                console.log("no se pudieron traer los casos adjuntados");
        
            }
        
          })
        
        });   


var datos_insu =[]; 
//CONSTRUCTOR DE OBJETOS
function ordenMantenimiento(cantidad,inventario,insumo,costo){
    this.cantidad       =  cantidad;
    this.inventario     =  inventario;
    this.insumo         =  insumo;
    this.costo          =  costo;
}    
suma  =[];
totalSu =[];
totaSuma=0;
template_insu=''; // ARRAY QUE GUARDA LOS INSUMOS AGREGADOS PARA MOSTRARLOS EN LA MODAL
let position=-1;
//agregar insumos
function agregar_insumo(){
   
    let tp_insumo = $("#tp-orden_insumo").val();
    if(tp_insumo =="Seleccione..."){
        alertas("¡Seleccione un Tipo de Insumo!","#17a2b8");
    }else{
        let cantidad   = $("#ornden_cantidad").val();
        let inventario = $("#orden_insumo").val();
        let insumo = inventario.split(',');
    
   
    if(insumo[2] ==null || insumo[2] ==undefined ){
        alertas("¡Por favor Elija un Insumo!" ,"#17a2b8");
   }else{ 
    if(parseInt(cantidad)>parseInt(insumo[4]) || parseInt(cantidad) ==0 || isNaN(parseInt(cantidad)) || parseInt(cantidad) ==null || parseInt(cantidad) ==undefined ){
        alertas("¡La Cantidad Ingresada no es Valida!","#17a2b8");
    }
    else{
 $("#orden_insumo option[value=1]").attr("selected",false);
 $("#orden_insumo option[value=1]").attr("selected",true);
 $('.ornden_cantidad').val("");
//INSTANCIA Y ASIGNACIÓN DE VALORES AL CONSTRUCTOR 
ordenMante = new ordenMantenimiento(cantidad,inventario,insumo[2],insumo[1]);
agregar();

position++;
sumaTotal=0;
for(let i=0;i<datos_insu.length;i++){
 
    cantidad = parseInt(datos_insu[i].cantidad);
    costo    = parseInt(datos_insu[i].costo);
    sumaTotal =cantidad*costo;
    totalSu.push(sumaTotal);
    console.log(sumaTotal)
    let pesus="$";
    if(sumaTotal==0){
        sumaTotal="N/A";
        datos_insu[i].costo ="N/A";
        pesus="";
    }
    template_insu += `<tr id="${position}">
    <td>${datos_insu[i].insumo}</td>
    <td>${datos_insu[i].cantidad}</td>
    <td>${pesus+datos_insu[i].costo}</td>   
    <td>${pesus+sumaTotal}</td>
    
    </tr>    `;
    

    $('#generar_orden').show();
    // $('#generar_orden2').hide();
}


if(sumaTotal=="N/A"){
    sumaTotal=0 
}
    suma.push(sumaTotal);
    for(let i=0;i<suma.length;i++){
    totaSuma= totaSuma + suma[i];
    console.log(totaSuma+"soy el error");
    console.log(suma[i]+"suma erronea");
    }


suma =[];

$("#totalito").html("$"+totaSuma);
$("#list_insumos").html(template_insu);
datos_insu =[];


  //alerta de agragar
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end', 
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer);
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

Toast.fire({
    icon: 'success',
    title: 'Insumo agregado exitosamente'
})
  //end alerta
    }
}
 }
}
//METER LOS INSUMOS SELECIONADOS EN ARRAYS
var datos_i =[]; 
function agregar(){

    datos_insu.push(ordenMante); // ARRAY QUE GUARDA LOS INSUMOS AGREGADOS PARA MOSTRARLOS EN LA MODAL
    datos_i.push(ordenMante);// ARRAY QUE GUARDA LOS INSUMOS AGREGADOS PARA MANDARLOS AL MODELO 
  
}

//BORRAR LOS INSUMOS DE LA MODAL
$("#cancel_insumo").on("click",function(){
    delete_insu()
})

//VACIAR LOS INSUMOS DE LA MODAL CUANTO CANCELO LA ORDEN O LA GENERO
function delete_insu(){
    $("#list_insumos").html("");
    totaSuma=0;
    $("#totalito").html("");
    $("#orden_insumo").html("");
    template_insu='';
    templa='';
    $("#existencia").html("");
    datos_i=[];
}

cases = [];




$('#adjuntar_ord').on('click', function() {
    $("input:checkbox:checked").each(   
        function() {
            cases.push($(this).val());
        }
    );  
    if (cases.length == 0) {
        $('#adjuntar_ord').removeAttr("data-target");
        alertas("¡Por favor Seleccione por lo menos un Caso!" ,"#17a2b8");
        console.log(cases.length+"menor")
    }else if (cases.length > 0) {
        $('#adjuntar_ord').attr("data-target","#modal_registrar_orden");
        console.log(cases.length+"mayor")
    }
    console.log(cases.length+"jeyson")
    cases = [];
})



function generar_orden(){
    console.log(datos_i.length+"error de mierda");
    if (datos_i.length == 0) {
        alertas("¡Por favor Seleccione Insumos!","#17a2b8");
        $('#generar_orden').removeAttr('data-dismiss');
    }else{
        $('#generar_orden').attr('data-dismiss','modal');
        let usuario    = $('#usuario').val();
        let tercero    = $("#orden_tercero").val();
        let prioridad  = $("#orden_prioridad").val();
        if(isNaN(parseInt(prioridad))){
            $("#generar_orden").removeAttr("data-dismiss");
            alertas("¡Por favor Seleccione la prioridad!" ,"#17a2b8");
        }else if(isNaN(parseInt(tercero))){
            $("#generar_orden").removeAttr("data-dismiss");
            alertas("¡Por favor Seleccione a un Tecercero!" ,"#17a2b8");
        }else{ 
            $("#generar_orden").attr("data-dismiss","modal");
        casos=[]; 
    
        $("input:checkbox:checked").each(   
            function() {
                casos.push($(this).val());
            }
        );  

        datos_in= JSON.stringify(datos_i);
        casos = JSON.stringify(casos)
        $.ajax({
            url:'./controllers/C_orden.php',
            type:'POST',
            data:{insumos:datos_in,casos:casos,usuario:usuario,tercero:tercero,prioridad:prioridad,generar_orden:""},
            success:function(){
                delete_insu()
                contma = 0;
                contme = 0;
                $('.logCaso').load('index.php?ruta=C_ordenes_pestanas .logCaso');
                $('#log_orden_pendiente').load('index.php?ruta=C_ordenes_pestanas #log_orden_pendiente');
                $('#log_orden_realizada').load('index.php?ruta=C_ordenes_pestanas #log_orden_realizada');
                alertas_crud("success","¡Orden Generada Con Exito!","#28a745");
            },
            error:function(){
                alert("Fatal error");
            } 
        });
        }
    }
} 



templa="";
$("#orden_insumo").on("change",function(){
    let existencia = $(this).val();
    cant_existencia = existencia.split(',');
    templa = `<div class="alert alert-danger" role="alert">Existencia ${cant_existencia[4]}</div>`;
    $("#existencia").html(templa);
})


//FINALIZAR ORDEN DE MANTENIMIENTO EN PROCESO
function FinalizarOrden(id){
    $("#modal_finalizar_orden .modal-body #id_finalizar_ord").val(id);
}

function finalizar_orden_ajax(){
    let dataString = $('#form_finalizar_orden').serialize();
    let accion = "&finalizar_orden=1";
    dataString = dataString + accion;  
    $.ajax({
        method:"POST",
        url: './controllers/C_orden.php',
        data:dataString,
        success: function(data){
            $('#log_orden_finalizar').load('index.php?ruta=C_ordenes_pestanas #log_orden_finalizar');
            $('#log_orden_realizada').load('index.php?ruta=C_ordenes_pestanas #log_orden_realizada');
            alertas_crud("success","¡Orden Finalizada con éxito!","#28a745");
        }
    });
}



//PAUSAR ORDEN DE MANTENIMIENTO EN PROCESO
function pause_order_peding(id){
    $("#modal_pausar_finalizar_orden .modal-body #pausar_finalizar_orden").val(id);
}

function pausar_finalizar_orden_ajax(){
    let dataString = $('#form_pausar_finalizar_orden').serialize();
    let accion = "&pausar_orden_pen=1";
    dataString = dataString + accion;  
    $.ajax({
        method:"POST",
        url: 'index.php?ruta=C_ordenes_pestanas',
        data:dataString,
        success: function(){
            $('#log_orden_finalizar').load('index.php?ruta=C_ordenes_pestanas #log_orden_finalizar');
            alertas_crud("success","¡Orden Suspendida con éxito!","#28a745");
        }
    });
}

/* <-- MODAL ATIVAR ORDEN EN PROCESO --> */
function activar_orden_proceso(id){
    $("#modal_activar_finalizar_orden .modal-body #activar_finalizar_orden").val(id);
}

/* <-- AJAX ATIVAR  ORDEN EN PROCESO --> */
    function activar_finalizar_orden_ajax() {
        let dataString = $('#form_activar_finalizar_orden').serialize();
        let accion = "&activar_orden_pen=1";
        dataString = dataString + accion;  
        $.ajax({
            method:"POST",
            url:'index.php?ruta=C_ordenes_pestanas',
            data:dataString,
            success: function(){
                $("#log_orden_finalizar").load("index.php?ruta=C_ordenes_pestanas #log_orden_finalizar");

                alertas_crud("success","¡Orden Habilitada con éxito!","#28a745");
            }
        });
}

    

    $("#ornden_cantidad").keyup(function(){              
        var ta      =   $("#ornden_cantidad");
        letras      =   ta.val().replace(/ /g, "");
        ta.val(letras)
    }); 