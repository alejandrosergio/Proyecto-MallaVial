  var update;
  var id;
  var rows;
  function Insert_Ticdoc(){ 
    let value = $("#description_TipDoc").val();
    if(value.length == 0){
      //retirar el data-dismiss para que no se cierre la modal
      $(".cerrar_modal_2").removeAttr("data-dismiss");
      //alerta
      alertas("¡Los campos no pueden quedar vacíos!","#17a2b8");
    }else{ 
      //poner el data-dismiss para que se cierre la modal
      $(".cerrar_modal_2").attr("data-dismiss","modal");
      //Captura de datos del form
      $.ajax({
          type:"POST",
          url:"./index.php?ruta=C_Tipo_documento",
          data:{values:value,tbl:"tbltipo_documento"},
          success:function(){
            alertas_crud("success","¡Tipo de Documento Registrado con éxito!","#28a745");
            $("#Table_Ticdoc").load("./index.php?ruta=C_Tipo_documento #Table_Ticdoc");
            $("#description_TipDoc").val('')
          },
          error:function(){
              console.log("Error en la petición: no se pudo insertar el tipo de documento");
          }   
      })
  }
}

    function SetData_Ticdoc(id_Delete,name){
      id    = id_Delete;
      value = name;
      $("#id_TipDoc").val(id);
      $("#update_description_TipDoc").val(name);
     rows = validateForeing("tblusuario","tbltipo_documento_tip_doc_id",id);
    }


  function Edit_Ticdoc(){
    let value = $("#update_description_TipDoc").val();
    if(value.length == 0){
      $(".cerrar_modal_2").removeAttr("data-dismiss");
      //alerta
      alertas("¡Los campos no pueden quedar vacíos!","#17a2b8");
    }else{
   //poner el data-dismiss para que se cierre la modal
   $(".cerrar_modal_2").attr("data-dismiss","modal");
   //Captura de datos del form   
    value = $("#update_description_TipDoc").val();
    $.ajax({
      url:'./index.php?ruta=C_Tipo_documento',
      type:'POST',
      data:{id:id,values:value,Update:""},
      success:function(){
        alertas_crud("success","Tipo de Documento Actualizado con éxito!","#28a745")
        $("#Table_Ticdoc").load("./index.php?ruta=C_Tipo_documento #Table_Ticdoc");
      },
      error:function(){
        console.log("Error en la petición: no se pudo actualizar el tipo de documento");
      }
    })
  }
};
function Delete_Tidoc(){
  if(rows == 1){
    alertas("¡Acción denegada! El registro se encuentra asociado a otro","#17a2b8");
  }else if(rows ==0){
    $.ajax({
      url:'index.php?ruta=C_Tipo_documento',
      type:'POST',
      data:{id:id,Delete:""},
      success:function(){
        alertas_crud("success","¡Tipo de Documento Eliminado con éxito!","#dc3545");
        $("#Table_Ticdoc").load("./index.php?ruta=C_Tipo_documento #Table_Ticdoc");
      },
      error:function(){
        console.log("error en la peticón: no se pudo elinar el tipo de documento")
      }
    });

  }
    
 }
  
