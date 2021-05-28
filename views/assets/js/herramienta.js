var update;
var id;
function Insert_Herramienta(){ 
value = $("#description_herramienta").val();
  $.ajax({
      type:"POST",
      url:"./index.php?ruta=C_Tipo_Herramienta",
      data:{values:value,tbl:"tbltipo_herramienta"},
      success:function(){
        alert("tipo de herramienta actualizada");
        $("#Table_Herramienta").load("./index.php?ruta=C_Tipo_Herramienta #Table_Herramienta");
        $("#description_herramienta").val('')
      },
      error:function(){
          console.log("Error en la petición: no se pudo insertar el tipo de herramienta");
      }   
  })
}

  function SetData_TipHer(id_Delete,name){
    id    = id_Delete;
    value = name;
    $("#id_TipHer").val(id);
    $("#update_description_TipHer").val(name);
  }

  
function Edit_TipHerramienta(){
  value = $("#update_description_TipHer").val();
  $.ajax({
    url:'./index.php?ruta=C_Tipo_Herramienta',
    type:'POST',
    data:{id:id,values:value,Update:""},
    success:function(){
      alert("Tipo de herramienta actualizada");
      $("#Table_Herramienta").load("./index.php?ruta=C_Tipo_Herramienta #Table_Herramienta");
    },
    error:function(){
      console.log("Error en la petición: no se pudo actualizar el tipo de herramienta");
    }
  })
};

function Delete_TipHerramienta(){
  $.ajax({
    url:'index.php?ruta=C_Tipo_Herramienta',
    type:'POST',
    data:{id:id,Delete:""},
    success:function(){
      alert("Tipo de daño Eliminado");
      $("#Table_Herramienta").load("./index.php?ruta=C_Tipo_Herramienta #Table_Herramienta");
    },
    error:function(){
      console.log("error en la peticón: no se pudo eliminar el tipo de daño")
    }
  });
};

  /* <-- WHITESPACE MODAL INSERTAR USUARIO--> */
  $("#TipHer").keyup(function(){              
    var ta      =   $("#TipHer");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
  });