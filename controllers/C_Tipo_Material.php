<?php
//Llamada a la conexion
require_once("./config/Connection.php");
//Llamada a los modelos(consultas sql)
require("./models/crudModel.php");
//Objeto o Instacia de la clase Crud
$obj = new Crud();

//Listado de los tipos de material
$list = $obj->list("tbltipo_material");
//Insertar tipos de material
$obj->Insert("tip_mat_descripcion","tblestado_general_est_gen_id");

//Actualizar tipos de material
$obj->Update("tbltipo_material","tip_mat_id","tip_mat_descripcion=");

//Eliminar tipos de mmaterial
$obj->Delete("tbltipo_material","tip_mat_id");

//Llamada a las vistas
require_once("./views/tiposmaterial/viewMateriales.php");

?>