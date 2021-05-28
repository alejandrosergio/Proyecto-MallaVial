/* <-- MODALES --> */
/* <-- MODAL DETALLE USUARIO --> */
function detailuser(id,docu,name,name2,ape,ape2,corre,dcc,tel,foto,fecha,estado,rol,tdoc){
    $("#modal_detalle_usuario .modal-body .id").val(id);
    $("#modal_detalle_usuario .modal-body .docu").val(docu);
    $("#modal_detalle_usuario .modal-body .name").val(name);
    $("#modal_detalle_usuario .modal-body .name2").val(name2);
    $("#modal_detalle_usuario .modal-body .ape").val(ape);
    $("#modal_detalle_usuario .modal-body .ape2").val(ape2);
    $("#modal_detalle_usuario .modal-body .corre").val(corre);
    $("#modal_detalle_usuario .modal-body .dcc").val(dcc);
    $("#modal_detalle_usuario .modal-body .tel ").val(tel);
    $("#modal_detalle_usuario .modal-body #foto").attr("src",foto);
    if (foto=="") {
        $("#foto").attr("src","views/assets/img/users/default_img/default.jpg");
    }
    $("#modal_detalle_usuario .modal-body .fecha ").val(fecha);
    $("#modal_detalle_usuario .modal-body .estado ").val(estado);
    $("#modal_detalle_usuario .modal-body .rol ").val(rol);
    $("#modal_detalle_usuario .modal-body .tdoc ").val(tdoc);
}

/* <-- MODAL ELIMINAR USUARIO --> */
function delete_users(id){
    $("#modal_eliminar_usuario .modal-body .id").val(id);
   rows = validateForeing("tblcaso","tblusuario_usu_id",id);
}

/* <-- MODAL ACTUALIZAR USUARIO --> */
function update_users(id,doc,nom1,nom2,ape1,ape2,cor,dir,tel,usutipdoc,usurol,foto2){
    $("#modal_actualizar_usuario .modal-body .id").val(id);
    $("#modal_actualizar_usuario .modal-body .doc").val(doc);
    $("#modal_actualizar_usuario .modal-body .nom1").val(nom1);
    $("#modal_actualizar_usuario .modal-body .nom2").val(nom2);
    $("#modal_actualizar_usuario .modal-body .ape1").val(ape1);
    $("#modal_actualizar_usuario .modal-body .ape2").val(ape2);
    $("#modal_actualizar_usuario .modal-body .cor").val(cor);
    $("#modal_actualizar_usuario .modal-body .dir").val(dir);
    $("#modal_actualizar_usuario .modal-body .tel").val(tel);
    $("#usertipdocu2 option[value='"+usutipdoc+"']").attr("selected",true);
    $("#userrol2 option[value='"+usurol+"']").attr("selected",true);
    $("#modal_actualizar_usuario .modal-body #foto2").attr("src",foto2);
    if (foto2=="") {
        $("#foto2").attr("src","views/assets/img/users/default_img/default.jpg");
    }
    $("#modal_actualizar_usuario .modal-body .oldimg").attr("value",foto2);
}

// Vista previa de la foto antes de actualizar
$('#adjunto2').on('change',function(e){
    // Creamos el objeto de la clase FileReader
    let reader = new FileReader();
    // Leemos el archivo subido y se lo pasamos a nuestro fileReader
    reader.readAsDataURL(e.target.files[0]);
    // Le decimos que cuando este listo ejecute el código interno
    reader.onload = function() {
        $('#foto2').attr("src",reader.result);
    }
})

// Vista previa de la foto antes de insertar
$('#adjunto').on('change',function(e){
    // Creamos el objeto de la clase FileReader
    let reader = new FileReader();

    // Leemos el archivo subido y se lo pasamos a nuestro fileReader
    reader.readAsDataURL(e.target.files[0]);

    // Le decimos que cuando este listo ejecute el código interno
    reader.onload = function() {
        $('#img1').attr("src",reader.result);
        // let preview = document.getElementById('foto1'),
        // image.src = reader.result;
        // preview.innerHTML = '';
        // preview.append(image);
    };
})

// Mostrar imagen por defecto
function default_img(){
    $("#img1").attr("src","views/assets/img/users/default_img/default.jpg");
    //El draggable nos permite activar o desactivar la opcion de arrstrar elementos html
    $("#img1").attr("draggable","false");
}
//El draggable nos permite activar o desactivar la opcion de arrstrar elementos html
$("#foto2").attr("draggable","false");

/* <-- AJAX --> */
function insert_user(){
    // captura del valor de los inputs dentro de variables
    documento = $("#userdoc").val();
    nombre1 = $("#usernom1").val();
    apellido1 = $("#userape1").val();
    apellido2 = $("#userape2").val();
    correo = $("#usercor").val();
    contraseña = $("#usercon").val();
    direccion = $("#userdir").val();
    telefono = $("#usertel").val();
    tip_doc = $("#usertipdocu").val();
    rol = $("#userrol").val();
    
    if (documento.length>10 || documento.length<8) {
        $(".cerrar_modal_2").removeAttr("data-dismiss");
        alertas("¡Ingresa un documento válido!","#17a2b8");
        return false;
    }
    if (correo.length<10) {
        $(".cerrar_modal_2").removeAttr("data-dismiss");
        alertas("¡Ingresa un correo válido!","#17a2b8");
        return false;
    }
    if (contraseña.length<10) {
        $(".cerrar_modal_2").removeAttr("data-dismiss");
        alertas("¡La contraseña es muy corta!","#17a2b8");
        return false;
    }
    if (telefono.length>10 || telefono.length<7) {
        $(".cerrar_modal_2").removeAttr("data-dismiss");
        alertas("¡Ingresa un teléfono válido!","#17a2b8");
        return false;
    }
    //condicion para evitar campos vacios
    if (documento.length == 0 || nombre1.length == 0 || apellido1.length == 0 || apellido2.length == 0 || correo.length == 0 || contraseña.length == 0 || direccion.length == 0 || telefono.length == 0 || tip_doc.length == 0 || rol.length == 0){ 
        //retirar el data-dismiss para que no se cierre la modal
        $(".cerrar_modal_2").removeAttr("data-dismiss");
        //Alerta
        alertas("¡Los campos no pueden quedar vacíos!","#17a2b8");
    }else{
        //poner el data-dismiss para que se cierre la modal
        $(".cerrar_modal_2").attr("data-dismiss","modal");
        // Captura de datos del form
        let formElement = $("#form_insertar_usuario")[0];
        paquete = new FormData(formElement);
        paquete.append('archiva',$('#adjunto')[0].files[0]);
        let destino = "index.php?ruta=C_users";
        $.ajax({
            url: destino,
            type:'POST',
            contentType:false,
            data:paquete,
            processData: false,
            cache: false,
            success: function(){ 
                alertas_crud("success","¡Usuario Registrado con éxito!","#28a745");
            $("#loguser").load("index.php?ruta=C_users #loguser");
            },
            error:function(){
                alert("Algo ha fallado");       
            }
        });
    }
}

/* <-- AJAX ELIMINAR USUARIO --> */
function delete_user() {
    if(rows ==1){
        alertas("¡Acción denegada! El registro se encuentra asociado a otro","#17a2b8");
      }else if(rows ==0){
    let dataString = $('#form_eliminar_usuario').serialize();
    let accion = "&delet_user=1";
    dataString = dataString + accion;
    $.ajax({
    method:"POST",
    url:'index.php?ruta=C_users',
    data:dataString,
    success: function(){
        $('#loguser').load('index.php?ruta=C_users #loguser');
        alertas_crud("success","¡Usuario Eliminado con éxito!","#dc3545");
    }
    });
}
}

/* <-- AJAX ACTUALIZAR USUARIO --> */
function update_user() {
    // captura del valor de los inputs dentro de variables
    nombre1 = $("#user2nom1").val();
    apellido1 = $("#user2ape1").val();
    apellido2 = $("#user2ape2").val();
    correo = $("#user2cor").val();
    contraseña = $("#user2con").val();
    direccion = $("#user2dir").val();
    telefono = $("#user2tel").val();

    if (correo.length<10) {
        $(".cerrar_modal_2").removeAttr("data-dismiss");
        alertas("¡Ingresa un correo válido!","#17a2b8");
        return false;
    }
    
    if (telefono.length>10 || telefono.length<7) {
        $(".cerrar_modal_2").removeAttr("data-dismiss");
        alertas("¡Ingresa un teléfono válido!","#17a2b8");
        return false;
    }
    //condicion para evitar campos vacios
    if (nombre1.length == 0 || apellido1.length == 0 || apellido2.length == 0 || correo.length == 0 ||  direccion.length == 0 || telefono.length == 0){ 
        //retirar el data-dismiss para que no se cierre la modal
        $(".cerrar_modal_2").removeAttr("data-dismiss");
        //Alerta
        alertas("¡Los campos no pueden quedar vacíos!","#17a2b8");
    }else{
        //poner el data-dismiss para que se cierre la modal
        $(".cerrar_modal_2").attr("data-dismiss","modal");
        // Captura de datos del form
    let formElement = $("#form_actualizar_usuario")[0];
    paquete = new FormData(formElement);
    paquete.append('archiva2',$('#adjunto2')[0].files[0]);
    let destino = "index.php?ruta=C_users";
    $.ajax({
        url: destino,
        type:'POST',
        contentType:false,
        data:paquete,
        processData: false,
        cache: false,
        success: function(){ 
        alertas_crud("success","¡Usuario Actualizado con éxito!","#28a745")
        $("#loguser").load("index.php?ruta=C_users #loguser");
        },
        error:function(){
            alert("Algo ha fallado");
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

/* <-- WHITESPACE MODAL INSERTAR USUARIO--> */
$("#userdoc").keyup(function(){              
    var ta      =   $("#userdoc");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
}); 
$("#usernom1").keyup(function(){              
    var ta      =   $("#usernom1");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
}); 
$("#usernom2").keyup(function(){              
    var ta      =   $("#usernom2");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
}); 
$("#userape1").keyup(function(){              
    var ta      =   $("#userape1");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
}); 
$("#userape2").keyup(function(){              
    var ta      =   $("#userape2");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
});
$("#usercor").keyup(function(){              
    var ta      =   $("#usercor");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
});
$("#usercon").keyup(function(){              
    var ta      =   $("#usercon");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
});
$("#usertel").keyup(function(){              
    var ta      =   $("#usertel");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
}); 

/* <-- WHITESPACE MODAL ACTUALIZAR USUARIO--> */
$("#user2doc").keyup(function(){              
    var ta      =   $("#user2doc");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
}); 
$("#user2nom1").keyup(function(){              
    var ta      =   $("#user2nom1");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
}); 
$("#user2nom2").keyup(function(){              
    var ta      =   $("#user2nom2");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
}); 
$("#user2ape1").keyup(function(){              
    var ta      =   $("#user2ape1");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
}); 
$("#user2ape2").keyup(function(){              
    var ta      =   $("#user2ape2");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
});
$("#user2cor").keyup(function(){              
    var ta      =   $("#user2cor");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
});
$("#user2con").keyup(function(){              
    var ta      =   $("#user2con");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
});
$("#user2tel").keyup(function(){              
    var ta      =   $("#user2tel");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
}); 
