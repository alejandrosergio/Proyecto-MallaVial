// pasarle el id del Herramienta a la modal y su respectivo ajax

function detailtools(id,descripcion,factu,concet,tip_maq,estado,costo,min,max,existencia,fech,bodega,proveedor){

    $("#modal_detalle_tools .modal-body .id").val(id);
    $("#modal_detalle_tools .modal-body .docu").val(descripcion);
    $("#modal_detalle_tools .modal-body .factu").val(factu);
    $("#modal_detalle_tools .modal-body .concet").val(concet);
    $("#modal_detalle_tools .modal-body .name").val(tip_maq);
    $("#modal_detalle_tools .modal-body .name2").val(estado);
    $("#modal_detalle_tools .modal-body .ape").val(costo);
    $("#modal_detalle_tools .modal-body .ape2").val(min);
    $("#modal_detalle_tools .modal-body .ape3").val(max);
    $("#modal_detalle_tools .modal-body .existencia").val(existencia);
    $("#modal_detalle_tools .modal-body .fech").val(fech);
    $("#modal_detalle_tools .modal-body .bodega").val(bodega);
    $("#modal_detalle_tools .modal-body .proveedor").val(proveedor);

}

function deleteTools(id){
    $("#modal_eliminar_Tool .modal-body #id_eliminar_tool").val(id);
}

function deleteToolsAjax(){
    let dataString = $('#eliminar_Tool').serialize();
    let accion = "&eliminar_herramienta=1";
    dataString = dataString + accion;  
    $.ajax({
        method:"POST",
        url: 'index.php?ruta=C_ToolsListActive',
        data:dataString,
        success: function(){
            $('#load_tools').load('index.php?ruta=C_ToolsListActive #load_tools');
            alertas_crud("success","¡Herramienta Eliminada con éxito!","#dc3545");
        }
    });
}
//................////

// abrir la modal y pasarle los datos del Herramienta

    function update_Tools(id,descripcion,factura,concepto,tipo_herramienta,cod_herramienta,costo,min,max,existencia,bodega,proveedor){   
            $("#modal_editar_Tool .modal-body .id").val(id);
            $("#modal_editar_Tool .modal-body .descripcion").val(descripcion);
            $("#modal_editar_Tool .modal-body #fact_edit_her").val(factura);
            $("#modal_editar_Tool .modal-body #concepto_edit_her").val(concepto);
            $("#modal_editar_Tool .modal-body .razon_social").val(tipo_herramienta);
            $("#tip_herramienta option[value='"+cod_herramienta+"']").attr("selected",true);
            $("#modal_editar_Tool .modal-body #Costo_edit_her").val(costo);
            $("#modal_editar_Tool .modal-body #stock_min_edit_her").val(min);
            $("#modal_editar_Tool .modal-body #stock_max_edit_her").val(max);
            
            $("#modal_editar_Tool .modal-body #Existencia_edit_her").val(existencia);
            
            
            $("#tip_bodega_ins option[value='"+bodega+"']").attr("selected",true);
            $("#tip_proveedor_edit_tools option[value='"+proveedor+"']").attr("selected",true);
            
        }
        // Cuando se preciona el boton cancelar me remueve el atributo selected
        //................////
    
        function update_Tools_ajax(){
            id = $("#id_edit_tools").val();
            descripcion = $("#Descripcion_edit_tools").val();
            factura = $("#fact_edit_her").val();
            concepto = $("#concepto_edit_her").val();
            tip_herramienta = $("#tip_herramienta").val();
            proveedor = $("#tip_proveedor_edit_tools").val();

            costo = $("#Costo_edit_her").val();
            min = $("#stock_min_edit_her").val();
            max = $("#stock_max_edit_her").val();
            existencia = $("#Existencia_edit_her").val();
            bodega = $("#tip_bodega_ins").val();

            

            if(id.length == 0 || descripcion.length == 0 || factura.length == 0   || concepto.length == 0 || tip_herramienta.length == 0 || costo.length == 0|| min.length == 0|| max.length == 0 || existencia.length == 0  || bodega.length == 0 || proveedor.length == 0){
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
                let dataString = $('#form_edit_tools').serialize();
                let accion = "&editar_herramienta=1";
                dataString = dataString + accion;  
                $.ajax({
                    method:"POST",
                    url: 'index.php?ruta=C_ToolsListActive',
                    data:dataString,
                    success: function(){
                        $('#load_tools').load('index.php?ruta=C_ToolsListActive #load_tools');
                        alertas_crud("success","¡Herramienta Actualizada con éxito!","#28a745");
                    }
                });
            }
    }
    //................////

    // Añadir desde la modal Con ajax
        function add_tools_ajax(){

            descripcion = $("#Descripcion_edit").val();
            factura = $("#num_fac_ins_her").val();
            concepto = $("#conceptp_ins_her").val();
            tipo_herramienta = $("#tip_herramienta_edit").val();
            costo = $("#stock_min_ins_her").val();
            min = $("#stock_max_ins_her").val();
            max = $("#Costo_her").val();
            existencia = $("#Existencia_ins_her").val();
            bodega = $("#tip_bodega_edit").val();
            proveedor = $("#tip_proveedor_inst_tools").val();

            if (descripcion.length == 0 || factura.length == 0 || concepto.length == 0 || tipo_herramienta.length == 0 || costo.length == 0|| min.length == 0|| max.length == 0|| existencia.length == 0 || bodega.length == 0 || proveedor.length == 0){ 
                //retirar el data-dismiss para que no se cierre la modal
                $(".cellar_insert").removeAttr("data-dismiss");
                //Alerta
                alertas("¡Los campos no pueden quedar vacíos!","#17a2b8");
            }else{
                $(".cellar_insert").attr("data-dismiss","modal");
            let dataString = $('#form_insert_tools').serialize();
            let accion = "&añadir_herramienta=1";
            dataString = dataString + accion;  
            $.ajax({
                method:"POST",
                url: 'index.php?ruta=C_ToolsListActive',
                data:dataString,
                success: function(){
                    $('#load_tools').load('index.php?ruta=C_ToolsListActive #load_tools');
                    alertas_crud("success","¡Herramienta Registrada con éxito!","#28a745");
                }
            });
        }
    }
    //................////
    function stock_herramienta(id,stock,stock2,stock_min){
        $("#añadir_her .modal-body .id").val(id);
        $("#añadir_her .modal-body .stock").val(stock);
        $("#añadir_her .modal-body .stock2").val(stock2);
        $("#añadir_her .modal-body .stock_min").val(stock_min);
    }

    

    function añadirHerramientaStock(){
        id_registro = $("#mrd").val();
        entrante = $("#aa").val();
        max = $("#maxstock").val();
        min = $("#stock_min").val();
        existencia = $("#actualstock").val();
        proveedor = $("#tip_proveedor_inst_tools2").val();
        factura = $("#num_fac_añadir").val();
        concepto = $("#concepto_añadir").val();
        let stock_total = parseInt(existencia) + parseInt(entrante);

        if(id_registro.length == 0 || entrante.length == 0 || max.length == 0 || existencia.length == 0 || proveedor.length == 0 || factura.length == 0 || concepto.length == 0){
            //retirar el data-dismiss para que no se cierre la modal
            $(".cellar_insert").removeAttr("data-dismiss");
            //Alerta
            alertas("¡Los campos no pueden quedar vacíos!","#28a745");
        }else if(stock_total>max || entrante<=0){
            //retirar el data-dismiss para que no se cierre la modal
            $(".cellar_insert").removeAttr("data-dismiss");
            //Alerta
            alertas("¡No puedes agregar un stock con este valor!","#17a2b8");
        }else{
            $(".cellar_insert").attr("data-dismiss","modal");
        let dataString = $('#formulario_aña_herramienta').serialize();
        let accion = "&añadir_herramienta_verde=1";

        dataString = dataString + accion +'&stock_total='+stock_total;
        $.ajax({
            method:"POST",
            url: 'index.php?ruta=C_ToolsListActive',
            data:dataString,
            success: function(){
                $('#load_tools').load('index.php?ruta=C_ToolsListActive #load_tools');
                alertas_crud("success","¡Herramienta Añadida con éxito!","#28a745")
            }
        });
    }
}

$("#Costo_her").keyup(function(){              
    var ta      =   $("#Costo_her");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
});


$("#stock_max_ins_her").keyup(function(){              
    var ta      =   $("#stock_max_ins_her");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
});

$("#Existencia_ins_her").keyup(function(){              
    var ta      =   $("#Existencia_ins_her");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
});


$("#Costo_edit_her").keyup(function(){              
    var ta      =   $("#Costo_edit_her");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
});


$("#Existencia_edit_her").keyup(function(){              
    var ta      =   $("#Existencia_edit_her");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
});


$("#stock_min_edit_her").keyup(function(){              
    var ta      =   $("#stock_min_edit_her");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
});

$("#stock_max_edit_her").keyup(function(){              
    var ta      =   $("#stock_max_edit_her");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
});

$("#stock_min_ins_her").keyup(function(){              
    var ta      =   $("#stock_min_ins_her");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
});