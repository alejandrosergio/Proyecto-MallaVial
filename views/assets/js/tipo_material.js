var update;
var id;
var rows;
function Insert_Material(){ 
value = $("#description_material").val();
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
        url:"./index.php?ruta=C_Tipo_Material",
        data:{values:value,tbl:"tbltipo_material"},
        success:function(){
          alertas_crud("success","¡Tipo de Material Registrado con éxito!","#28a745");
          $("#Table_Material").load("./index.php?ruta=C_Tipo_Material #Table_Material");
          $("#description_material").val('')
        },
        error:function(){
            console.log("Error en la petición: no se pudo insertar el tipo de material");
        }   
    })
  }
}

  function SetData_TipMat(id_Delete,name){
    id    = id_Delete;
    value = name;
    $("#id_TipMat").val(id);
    $("#update_description_TipMat").val(name);
    rows = validateForeing("tblmaterial","tbltipo_material_tip_mat_id",id);
  }
function Edit_TipMaterial(){
  value = $("#update_description_TipMat").val();
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
    url:'./index.php?ruta=C_Tipo_Material',
    type:'POST',
    data:{id:id,values:value,Update:""},
    success:function(){
      alertas_crud("success","Tipo de Material Actualizado con éxito!","#28a745")
      $("#Table_Material").load("./index.php?ruta=C_Tipo_Material #Table_Material");
    },
    error:function(){
      console.log("Error en la petición: no se pudo actualizar el tipo de material");
    }
  })
 }
};

function Delete_TipMaterial(){
  if(rows == 1){
    alertas("¡Acción denegada! El registro se encuentra asociado a otro","#17a2b8");
  }else if(rows ==0){
    $.ajax({
      url:'index.php?ruta=C_Tipo_Material',
      type:'POST',
      data:{id:id,Delete:""},
      success:function(){
        alertas_crud("success","¡Tipo de Material Eliminado con éxito!","#dc3545");
        $("#Table_Material").load("./index.php?ruta=C_Tipo_Material #Table_Material");
      },
      error:function(){
        console.log("error en la peticón: no se pudo eliminar el tipo de material")
      }
    });
}
};
