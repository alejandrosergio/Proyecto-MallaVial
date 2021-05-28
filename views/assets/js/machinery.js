// pasarle el id del Herramienta a la modal y su respectivo ajax
//Detail
function detailmaq(id,descripcion,tip_maq,estado,costo,min,max,existencia,fech,bodega,proveedor,fac,cons){
    $("#modal_detalle_maquinaria .modal-body .id").val(id);
    $("#modal_detalle_maquinaria .modal-body .docu").val(descripcion);
    $("#modal_detalle_maquinaria .modal-body .name").val(tip_maq);
    $("#modal_detalle_maquinaria .modal-body .name2").val(estado);
    $("#modal_detalle_maquinaria .modal-body .ape").val(costo);
    $("#modal_detalle_maquinaria .modal-body .ape2").val(min);
    $("#modal_detalle_maquinaria .modal-body .ape3").val(max);
    $("#modal_detalle_maquinaria .modal-body .existencia").val(existencia);
    $("#modal_detalle_maquinaria .modal-body .fech").val(fech);
    $("#modal_detalle_maquinaria .modal-body .bodega").val(bodega);
    $("#modal_detalle_maquinaria .modal-body .proveedor").val(proveedor);
    $("#modal_detalle_maquinaria .modal-body #detail_numero_factura").val(fac);
    $("#modal_detalle_maquinaria .modal-body #detail_concepto").val(cons);
}
function deleteMachinerys(id){
    $("#modal_eliminar_Machinery .modal-body #id_elim_machinery").val(id);
    
}

function deleteMachinerysAjax(){
    let dataString = $('#eliminar_Machinery').serialize();
    let accion = "&eliminar_maquinaria=1";
    dataString = dataString + accion;    
    $.ajax({
        method:"POST",
        url: 'index.php?ruta=C_machinery',
        data: dataString,
        success: function(){
            $('#load_Machinerys').load('index.php?ruta=C_machinery #load_Machinerys');
            alertas_crud("success","¡Maquinaria Eliminada con éxito!","#dc3545");
        }
    });
}
//................////

// abrir la modal y pasarle los datos del Herramienta

    function update_Machinery(id,Descripcion,tipo_maquinaria,costo,min,max,existencia,bodega,proveedor,fac,cons){   
            $("#modal_editar_Machinery .modal-body .id").val(id);
            $("#modal_editar_Machinery .modal-body .Descripcion").val(Descripcion);
            $("#tipo_maquinaria option[value='"+tipo_maquinaria+"']").attr("selected",true);
            $("#modal_editar_Machinery .modal-body #Costo_edit_maq").val(costo);
            $("#modal_editar_Machinery .modal-body #stock_min_edit_maq").val(min);
            $("#modal_editar_Machinery .modal-body #stock_max_edit_maq").val(max);
            $("#modal_editar_Machinery .modal-body #Existencia_edit_maq").val(existencia);
            $("#tip_bodega_insss option[value='"+bodega+"']").attr("selected",true);
            $("#tip_proveedor_edit option[value='"+proveedor+"']").attr("selected",true);
            $("#modal_editar_Machinery .modal-body #numero_factura_edit").val(fac);
            $("#modal_editar_Machinery .modal-body #concepto_edit").val(cons);
        }
    
        function updateMachinerysAjax(){
            id = $("#id_edit_maq").val();
            descripcion = $("#id_edit_description").val();
            tipo_maquinaria = $("#tipo_maquinaria").val();
            factura = $("#numero_factura_edit").val();
            concepto = $("#concepto_edit").val();
            costo = $("#Costo_edit_maq").val();
            min = $("#stock_min_edit_maq").val();
            max = $("#stock_max_edit_maq").val();
            existencia = $("#Existencia_edit_maq").val();
            bodega = $("#tip_bodega_insss").val();
            proveedor = $("#tip_proveedor_edit").val();


            if(id.length == 0 || descripcion.length == 0 || tipo_maquinaria.length == 0 || factura.length == 0 || concepto.length == 0 || costo.length == 0|| min.length == 0|| max.length == 0|| existencia.length == 0 || bodega.length == 0 || proveedor.length == 0){
                //retirar el data-dismiss para que no se cierre la modal
                $(".cellar_insert").removeAttr("data-dismiss");
                //Alerta
                alertas("¡Los campos no pueden quedar vacíos!","#ffc107");
            }else if(parseInt(max) < parseInt(existencia) || parseInt(min) > parseInt(existencia)){
                $(".cellar_insert").removeAttr("data-dismiss");
                //Alerta
                alertas("¡No puedes poner este Stock!","#17a2b8");
            }else{
                $(".cellar_insert").attr("data-dismiss","modal");
                let dataString = $('#form_edit_Machinery').serialize();
                let accion = "&editar_maquinaria=1";
                dataString = dataString + accion;  
                $.ajax({
                    method:"POST",
                    url: 'index.php?ruta=C_machinery',
                    data:dataString,
                    success: function(){
                        $('#load_Machinerys').load('index.php?ruta=C_machinery #load_Machinerys');
                        alertas_crud("success","¡Maquinaria Actualizada con éxito!","#28a745");
                    }
                });
        }
    }
    //................////

    // Añadir desde la modal Con ajax
        function add_Machinery_ajax(){
            descripcion = $("#descripcion_aña_machy").val();
            tipo_maquinaria = $("#tipo_maquinaria1").val();

            costo = $("#Costo_maq").val();
            min = $("#stock_min_ins_maq").val();
            max = $("#stock_max_ins_maq").val();
            existencia = $("#Existencia_ins_maq").val();
            bodega = $("#tip_bodega_inst").val();
            proveedor = $("#tip_proveedor_inst").val();
            factura= $("#numero_factura_aña").val();
            concepto = $("#concepto_aña").val();

            

            if (descripcion.length == 0 || tipo_maquinaria.length == 0 || costo.length == 0|| min.length == 0|| max.length == 0 || existencia.length == 0 || bodega.length == 0 || proveedor.length == 0|| factura.length == 0|| concepto.length == 0){ 
                //retirar el data-dismiss para que no se cierre la modal
                $(".cellar_insert").removeAttr("data-dismiss");
                //Alerta
                alertas("¡Los campos no pueden quedar vacíos!","#17a2b8");
            }
            else if(max < existencia){
                $(".cellar_insert").removeAttr("data-dismiss");
                //Alerta
                alertas("¡Error Garrafal!","#17a2b8");
            }
            else{
                $(".cellar_insert").attr("data-dismiss","modal");
            let dataString = $('#form_insert_Machinery').serialize();
            let accion = "&añadir_maquinaria=1";
            dataString = dataString + accion;  

            $.ajax({
                method:"POST",
                url: 'index.php?ruta=C_machinery',
                data:dataString,
                success: function(){
                    $('#load_Machinerys').load('index.php?ruta=C_machinery #load_Machinerys');
                    alertas_crud("success","¡Maquinaria Registrada con éxito!","#28a745");
                }
            });
        }
        
    }
    function stock_maquinaria(id,stock,max,stock_min){
        $("#añadir_maq .modal-body #mrd").val(id);
        $("#añadir_maq .modal-body .stock").val(stock);
        $("#añadir_maq .modal-body .stock_max").val(max);
        $("#añadir_maq .modal-body #stock_min_m").val(stock_min);

    }
    //................////

    function añadirMaquinariaStock(){
        id_registro = $("#mrd").val();
        entrante = $("#aa").val();
        max = $("#ww").val();
        min = $("#stock_min_m").val();
        existencia = $("#zz").val();
        proveedor = $("#tip_proveedor_añañay").val();
        factura = $("#num_fac_añadir").val();
        concepto = $("#concepto_añadir").val();
        let stock_total = parseInt(existencia) + parseInt(entrante);

        if(id_registro.length == 0 || max.length == 0 || existencia.length == 0 || proveedor.length == 0 || entrante.length == 0 || factura.length == 0 || concepto.length == 0){
            //retirar el data-dismiss para que no se cierre la modal
            $(".cellar_insert").removeAttr("data-dismiss");
                //Alerta
            alertas("¡Los campos no pueden quedar vacíos!","#17a2b8");
        }else if(stock_total>max || entrante<=0){
            //retirar el data-dismiss para que no se cierre la modal
            $(".cellar_insert").removeAttr("data-dismiss");
            //Alerta
            alertas("¡No puedes agregar un stock con este valor!","#17a2b8");
        }else{
            $(".cellar_insert").attr("data-dismiss","modal");
        let dataString = $('#formulario_aña_maquinary').serialize();
        let accion = "&añadir_maquinaria_verde=1";
        dataString = dataString + accion +'&stock_total='+stock_total;  
        $.ajax({
            method:"POST",
            url: 'index.php?ruta=C_machinery',
            data:dataString,
            success: function(){
                $('#load_Machinerys').load('index.php?ruta=C_machinery #load_Machinerys');
                alertas_crud("success","Maquinaria Añadida con éxito!","#28a745");
            }
        });
    }
}

$("#stock_min_ins_maq").keyup(function(){              
    var ta      =   $("#stock_min_ins_maq");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
});


$("#stock_max_ins_maq").keyup(function(){              
    var ta      =   $("#stock_max_ins_maq");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
});


$("#Existencia_ins_maq").keyup(function(){              
    var ta      =   $("#Existencia_ins_maq");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
});


$("#Costo_maq").keyup(function(){              
    var ta      =   $("#Costo_maq");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
});




$("#aa").keyup(function(){              
    var ta      =   $("#aa");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
});
