var update;
var id;
var rows;
function Insert_Zona(){ 
value = $("#description_zona").val();
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
        url:"./index.php?ruta=C_Tipo_Zona",
        data:{values:value,tbl:"tbltipo_zona"},
        success:function(){
          alertas_crud("success","¡Tipo de Zona Registrada con éxito!","#28a745");
          $("#Table_Zona").load("./index.php?ruta=C_Tipo_Zona #Table_Zona");
          $("#description_zona").val('')
        },
        error:function(){
            console.log("Error en la petición: no se pudo insertar el tipo de zona");
        }   
    })
  }
}

  function SetData_TipZon(id_Delete,name){
    id    = id_Delete;
    value = name;
    $("#id_TipZon").val(id);
    $("#update_description_TipZon").val(name);
    rows = validateForeing("tblbodega","tbltipo_zona_tip_zon_id",id);
  }
function Edit_TipZona(){
  value = $("#update_description_TipZon").val();
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
    url:'./index.php?ruta=C_Tipo_Zona',
    type:'POST',
    data:{id:id,values:value,Update:""},
    success:function(){
      alertas_crud("success","Tipo de Zona Actualizada con éxito!","#28a745")
      $("#Table_Zona").load("./index.php?ruta=C_Tipo_Zona #Table_Zona");
    },
    error:function(){
      console.log("Error en la petición: no se pudo actualizar el tipo de zona");
    }
  })
}
};

function Delete_TipZona(){
  if(rows == 1){
    alertas("¡Acción denegada! El registro se encuentra asociado a otro","#17a2b8");
  }else if(rows ==0){
  $.ajax({
    url:'index.php?ruta=C_Tipo_Zona',
    type:'POST',
    data:{id:id,Delete:""},
    success:function(){
      alertas_crud("success","¡Tipo de Zona Eliminada con éxito!","#dc3545");
      $("#Table_Zona").load("./index.php?ruta=C_Tipo_Zona #Table_Zona");
    },
    error:function(){
      console.log("error en la peticón: no se pudo eliminar el tipo de zona")
    }
  });
}
};

