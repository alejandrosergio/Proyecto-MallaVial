var update;
var id;
var rows;
//INSERT ROLES
  function Insert_Rol(){  
      var value = $("#insert_Description_Rol").val();
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
          url:"./index.php?ruta=C_rol",
          data:{values:value,tbl:"tblrol"},
          success:function(){
            alertas_crud("success","¡Rol Registrado con éxito!","#28a745");      
            $("#table_Rol").load("./index.php?ruta=C_rol #table_Rol");
            $("#insert_Description_Rol").val('')
          },
          error:function(){
            console.log("Error en la petición: no se pudo insertar el rol");
          }   
      })
    }
  }
    //CATCH ID AND FORM VALUE
    function SetData_Rol(id_Delete,name){
      id    = id_Delete;
      value = name;
      $("#id_Rol").val(id);
      $("#update_description_Rol").val(name);
      rows = validateForeing("tblusuario","tblrol_rol_id",id);
      rows2 = validateForeing("tbltercero","tblrol_rol_id",id);
    }
//UPDATE ROLES
  function Edit_Rol(){
      value = $("#update_description_Rol").val();
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
        url:'./index.php?ruta=C_rol',
        type:'POST',
        data:{id:id,values:value,Update:""},
        success:function(){
          alertas_crud("success","¡Rol Actualizado con éxito!","#28a745"); 
          $("#table_Rol").load("./index.php?ruta=C_rol #table_Rol");
        },
        error:function(){
          console.log("Error en la petición: no se pudo editar el rol");
        }
      })
   }
    };

//DELETE ROLES 
function Delete_Rol(){
  if(rows == 1 || rows == 2){
    alertas("¡Acción denegada! El registro se encuentra asociado a otro!","#17a2b8");
  }else if(rows ==0){
    $.ajax({
      url:'index.php?ruta=C_rol',
      type:'POST',
      data:{id:id,Delete:""},
      success:function(){
      alertas_crud("success","¡Rol Eliminado con éxito!","#28a745"); 
      $("#table_Rol").load("./index.php?ruta=C_rol #table_Rol");
      },
      error:function(){
      console.log("error en la petición: no se pudo eliminar el rol");
      }
    });
  }
  };

