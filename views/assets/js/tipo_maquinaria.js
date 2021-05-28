var update;
var id;
var rows;
function Insert_Maquinaria(){ 
value = $("#description_maquinaria").val();
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
        url:"./index.php?ruta=C_Tipo_Maquinaria",
        data:{values:value,tbl:"tbltipo_maquinaria"},
        success:function(){
          alertas_crud("success","¡Tipo de Maquinaria Registrada con éxito!","#28a745");
          $("#Table_Maquinaria").load("./index.php?ruta=C_Tipo_Maquinaria #Table_Maquinaria");
          $("#description_maquinaria").val('')
        },
        error:function(){
            console.log("Error en la petición: no se pudo insertar el tipo de maquina ria");
        }   
    })
  }
}

  function SetData_TipMaq(id_Delete,name){
    id    = id_Delete;
    value = name;
    $("#id_TipMaq").val(id);
    $("#update_description_TipMaq").val(name);
    rows = validateForeing("tblmaquinaria","tbltipo_maquinaria_tip_maq_id",id);
  }


function Edit_TipMaquinaria(){
  value = $("#update_description_TipMaq").val();
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
    url:'./index.php?ruta=C_Tipo_Maquinaria',
    type:'POST',
    data:{id:id,values:value,Update:""},
    success:function(){
      alertas_crud("success","Tipo de Maquinaria Actualizada con éxito!","#28a745")
      $("#Table_Maquinaria").load("./index.php?ruta=C_Tipo_Maquinaria #Table_Maquinaria");
    },
    error:function(){
      console.log("Error en la petición: no se pudo actualizar el tipo de maquinaria");
    }
  })
}
};

function Delete_TipMaquinaria(){
  if(rows == 1){
    alertas("¡Acción denegada! El registro se encuentra asociado a otro","#17a2b8");
  }else if(rows ==0){
    $.ajax({
      url:'index.php?ruta=C_Tipo_Maquinaria',
      type:'POST',
      data:{id:id,Delete:""},
      success:function(){
        alertas_crud("success","¡Tipo de Maquinaria Eliminada con éxito!","#dc3545");
        $("#Table_Maquinaria").load("./index.php?ruta=C_Tipo_Maquinaria #Table_Maquinaria");
      },
      error:function(){
        console.log("error en la peticón: no se pudo eliminar el tipo de maquinaria")
      }
    });
}
};
