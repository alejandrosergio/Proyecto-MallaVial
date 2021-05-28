var update;
var id;

function Insert_Maquinaria(){ 
value = $("#description_maquinaria").val();
  $.ajax({
      type:"POST",
      url:"./index.php?ruta=C_Tipo_Maquinaria",
      data:{values:value,tbl:"tbltipo_maquinaria"},
      success:function(){
        alert("tipo de maquinaria actualizada");
        $("#Table_Maquinaria").load("./index.php?ruta=C_Tipo_Maquinaria #Table_Maquinaria");
        $("#description_maquinaria").val('')
      },
      error:function(){
          console.log("Error en la petición: no se pudo insertar el tipo de maquina ria");
      }   
  })
}

  function SetData_TipMaq(id_Delete,name){
    id    = id_Delete;
    value = name;
    $("#id_ipMaq").val(id);
    $("#update_desTcription_TipMaq").val(name);
  }


function Edit_TipMaquinaria(){
  value = $("#update_description_TipMaq").val();
  $.ajax({
    url:'./index.php?ruta=C_Tipo_Maquinaria',
    type:'POST',
    data:{id:id,values:value,Update:""},
    success:function(){
      alert("Tipo de maquinaria actualizada");
      $("#Table_Maquinaria").load("./index.php?ruta=C_Tipo_Maquinaria #Table_Maquinaria");
    },
    error:function(){
      console.log("Error en la petición: no se pudo actualizar el tipo de maquinaria");
    }
  })
};

function Delete_TipMaquinaria(){
  $.ajax({
    url:'index.php?ruta=C_Tipo_Maquinaria',
    type:'POST',
    data:{id:id,Delete:""},
    success:function(){
      alert("Tipo de maquinaria eliminada...");
      $("#Table_Maquinaria").load("./index.php?ruta=C_Tipo_Maquinaria #Table_Maquinaria");
    },
    error:function(){
      console.log("error en la peticón: no se pudo eliminar el tipo de maquinaria")
    }
  });
};

  /* <-- WHITESPACE MODAL INSERTAR USUARIO--> */
  $("#TipMaq").keyup(function(){              
    var ta      =   $("#TipMaq");
    letras      =   ta.val().replace(/ /g, "");
    ta.val(letras)
  });