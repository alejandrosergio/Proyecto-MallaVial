// pasarle el id del proveedor a la modal y su respectivo ajax

function deleteSuppliers(id){
    $("#modal_eliminar_proveedor .modal-body .id").val(id);
}

function deleteSuppliersAjax(){
    let dataString = $('#eliminar_proveedor').serialize();
    let accion = "&eliminar_proveedor=1";
    dataString = dataString + accion;  
    $.ajax({
        method:"POST",
        url: 'index.php?ruta=C_suppliersListActive',
        data:dataString,
        success: function(){
            $('#load_suplier').load('index.php?ruta=C_suppliersListActive #load_suplier');
            alertas_crud("success","¡Proveedor Eliminado con éxito!","#dc3545");
        }
    });
}
//................////


// abrir la modal y pasarle los datos del proveedor

    function update_supplier(id,nit,razon_social,direccion,correo,telefono){   

            $("#modal_editar_proveedor .modal-body .id_edit_prov").val(id);
            $("#modal_editar_proveedor .modal-body .nit").val(nit);
            $("#modal_editar_proveedor .modal-body .razon_social").val(razon_social);
            $("#modal_editar_proveedor .modal-body .direccion").val(direccion);
            $("#modal_editar_proveedor .modal-body .correo").val(correo);
            $("#modal_editar_proveedor .modal-body .telefono").val(telefono);
        }
    

        function update_supplier_ajax(){

            id = $(".id_edit_prov").val();
            nit = $(".nit").val();
            razon_social = $(".razon_social").val();
            direccion = $(".correo").val();
            correo = $(".direccion").val();
            telefono = $(".telefono").val();

            if (telefono.length>10 || telefono.length<7) {
                $(".cellar_insert").removeAttr("data-dismiss");
                alertas("¡Ingresa un teléfono válido!","#ffc107");
                return false;
            }

            if(id.length == 0 || nit.length == 0 || razon_social.length == 0   || direccion.length == 0 || correo.length == 0 || telefono.length == 0){
                //retirar el data-dismiss para que no se cierre la modal
                $(".cellar_insert").removeAttr("data-dismiss");
                //Alerta
                alertas("¡Los campos no pueden quedar vacíos!","#ffc107");
            }else{
                $(".cellar_insert").attr("data-dismiss","modal");

            let dataString = $('#form_edit_prov').serialize();
            let accion = "&editar_proveedor=1";
            dataString = dataString + accion;
            $.ajax({
                method:"POST",
                url: 'index.php?ruta=C_suppliersListActive',
                data:dataString,
                success: function(){
                    $('#load_suplier').load('index.php?ruta=C_suppliersListActive #load_suplier');
                    alertas_crud("success","¡Proveedor Actualizado Con Exito!","#28a745");
                }
                
            });
        }
    }
    //................////

    // Añadir desde la modal Con ajax
        function add_supplier_ajax(){

            nit = $("#nit").val();
            razon_social = $("#razon_social").val();
            direccion = $("#correo").val();
            correo = $("#direccion").val();
            telefono = $("#telefono").val();

            if (telefono.length>10 || telefono.length<7) {
                $(".cellar_insert").removeAttr("data-dismiss");
                alertas("¡Ingresa un teléfono válido!","#17a2b8");
                return false;
            }

            if( nit.length == 0 || razon_social.length == 0   || direccion.length == 0 || correo.length == 0 || telefono.length == 0){
                //retirar el data-dismiss para que no se cierre la modal
                $(".cellar_insert").removeAttr("data-dismiss");
                //Alerta
                alertas("¡Los campos no pueden quedar vacíos!","#17a2b8");
            }else{
                $(".cellar_insert").attr("data-dismiss","modal");
            let dataString = $('#form_insert_supplier').serialize();
            let accion = "&añadir_proveedor=1";
            dataString = dataString + accion;
            $.ajax({
                method:"POST",
                url: 'index.php?ruta=C_suppliersListActive',
                data:dataString,
                success: function(){
                    $('#load_suplier').load('index.php?ruta=C_suppliersListActive #load_suplier');
                    alertas_crud("success","¡Proveedor Insertado Con Exito!","#28a745");
                }
            });
        }
    }

    //................////

//WHITE SPACE
    $("#nit").keyup(function(){              
        var ta      =   $("#nit");
        letras      =   ta.val().replace(/ /g, "");
        ta.val(letras)
    });

    $("#telefono_proveedor").keyup(function(){              
        var ta      =   $("#telefono_proveedor");
        letras      =   ta.val().replace(/ /g, "");
        ta.val(letras)
    }); 

    $("#telefono").keyup(function(){              
        var ta      =   $("#telefono");
        letras      =   ta.val().replace(/ /g, "");
        ta.val(letras)
    }); 