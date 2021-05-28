var update;
var id;
var rows;
function Insert_daño(){ 
value = $("#description_daño").val();
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
      url:"./index.php?ruta=C_Tipo_dano",
      data:{values:value,tbl:"tbltipo_daño"},
      success:function(){
        alertas_crud("success","¡Tipo de Daño Registrado con éxito!","#28a745");
        $("#Table_Daño").load("./index.php?ruta=C_Tipo_dano #Table_Daño");
        $("#description_daño").val('')
      },
      error:function(){
          console.log("Error en la petición: no se pudo insertar el tipo de daño");
      }   
  })
}
}

  function SetData_Tipdaño(id_Delete,name){
    id    = id_Delete;
    value = name;
    $("#id_TipDaños").val(id);
    $("#update_description_TipDaños").val(name);
    rows = validateForeing("tblcaso","tbltipo_daño_tip_dañ_id",id);
  }

  
function Edit_Tipdaños(){
  value = $("#update_description_TipDaños").val();
  if(value.length == 0){
    //retirar el data-dismiss para que no se cierre la modal
    $(".cerrar_modal_2").removeAttr("data-dismiss");
    //alerta
    alertas("¡Los campos no pueden quedar vacíos!","#17a2b8");
  }else{ 
    //poner el data-dismiss para que se cierre la modal
    $(".cerrar_modal_2").attr("data-dismiss","modal");
    //Captura de datos del form
  value = $("#update_description_TipDaños").val();
  $.ajax({
    url:'./index.php?ruta=C_Tipo_dano',
    type:'POST',
    data:{id:id,values:value,Update:""},
    success:function(){
      alertas_crud("success","Tipo de Documento Actualizado con éxito!","#28a745")
      $("#Table_Daño").load("./index.php?ruta=C_Tipo_dano #Table_Daño");
    },
    error:function(){
      console.log("Error en la petición: no se pudo actualizar el tipo de daño");
    }
  })
}
};

function Delete_TipDaño(){
  if(rows == 1){
    alertas("¡Acción denegada! El registro se encuentra asociado a otro","#17a2b8");
  }else if(rows ==0){
    $.ajax({
      url:'index.php?ruta=C_Tipo_dano',
      type:'POST',
      data:{id:id,Delete:""},
      success:function(){
        alertas_crud("success","¡Tipo de Daño Eliminado con éxito!","#dc3545");
        $("#Table_Daño").load("./index.php?ruta=C_Tipo_dano #Table_Daño");
      },
      error:function(){
        console.log("error en la peticón: no se pudo eliminar el tipo de daño")
      }
    });
 }
};
 
