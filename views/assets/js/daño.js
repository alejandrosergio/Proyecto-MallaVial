var update;
var id;
function Insert_daño(){ 
value = $("#description_daño").val();
  $.ajax({
      type:"POST",
      url:"./index.php?ruta=C_Tipo_dano",
      data:{values:value,tbl:"tbltipo_daño"},
      success:function(){
        alert("tipo de daño actualizado");
        $("#Table_Daño").load("./index.php?ruta=C_Tipo_dano #Table_Daño");
        $("#description_daño").val('')
      },
      error:function(){
          console.log("Error en la petición: no se pudo insertar el tipo de daño");
      }   
  })
}

  function SetData_Tipdaño(id_Delete,name){
    id    = id_Delete;
    value = name;
    $("#id_TipDaños").val(id);
    $("#update_description_TipDaños").val(name);
  }

  
function Edit_Tipdaños(){
  value = $("#update_description_TipDaños").val();
  $.ajax({
    url:'./index.php?ruta=C_Tipo_dano',
    type:'POST',
    data:{id:id,values:value,Update:""},
    success:function(){
      alert("Tipo de daño actualizado");
      $("#Table_Daño").load("./index.php?ruta=C_Tipo_dano #Table_Daño");
    },
    error:function(){
      console.log("Error en la petición: no se pudo actualizar el tipo de daño");
    }
  })
};

function Delete_TipDaño(){
  $.ajax({
    url:'index.php?ruta=C_Tipo_dano',
    type:'POST',
    data:{id:id,Delete:""},
    success:function(){
      alert("Tipo de daño Eliminado");
      $("#Table_Daño").load("./index.php?ruta=C_Tipo_dano #Table_Daño");
    },
    error:function(){
      console.log("error en la peticón: no se pudo eliminar el tipo de daño")
    }
  });
};
  /* <-- WHITESPACE MODAL INSERTAR USUARIO--> */
  $("#TipDoc").keyup(function(){              
    var ta      =   $("#TipDoc");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
  });
