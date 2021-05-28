var update;
var id;
var rows;
function Insert_Herramienta(){ 
value = $("#description_herramienta").val();
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
        url:"./index.php?ruta=C_Tipo_Herramienta",
        data:{values:value,tbl:"tbltipo_herramienta"},
        success:function(){
          alertas_crud("success","¡Tipo de Herramienta Registrada con éxito!","#28a745");
          $("#Table_Herramienta").load("./index.php?ruta=C_Tipo_Herramienta #Table_Herramienta");
          $("#description_herramienta").val('')
        },
        error:function(){
            console.log("Error en la petición: no se pudo insertar el tipo de herramienta");
        }   
    })
  }
}

  function SetData_TipHer(id_Delete,name){
    id    = id_Delete;
    value = name;
    $("#id_TipHer").val(id);
    $("#update_description_TipHer").val(name);
    rows = validateForeing("tblherramienta","tbltipo_herramienta_tip_her_id",id);
    
  }

  
function Edit_TipHerramienta(){
  value = $("#update_description_TipHer").val();
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
    url:'./index.php?ruta=C_Tipo_Herramienta',
    type:'POST',
    data:{id:id,values:value,Update:""},
    success:function(){
      alertas_crud("success","Tipo de Herramienta Actualizada con éxito!","#28a745")
      $("#Table_Herramienta").load("./index.php?ruta=C_Tipo_Herramienta #Table_Herramienta");
    },
    error:function(){
      console.log("Error en la petición: no se pudo actualizar el tipo de herramienta");
    }
  })
}
};

function Delete_TipHerramienta(){
  if(rows == 1){
    alertas("¡Acción denegada! El registro se encuentra asociado a otro","#17a2b8");
  }else if(rows ==0){
    $.ajax({
      url:'index.php?ruta=C_Tipo_Herramienta',
      type:'POST',
      data:{id:id,Delete:""},
      success:function(){
        alertas_crud("success","¡Tipo de Herramienta Eliminada con éxito!","#dc3545");
        $("#Table_Herramienta").load("./index.php?ruta=C_Tipo_Herramienta #Table_Herramienta");
      },
      error:function(){
        console.log("error en la peticón: no se pudo eliminar el tipo de daño")
      }
    });
  }
};
