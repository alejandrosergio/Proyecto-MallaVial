<?php
//Llamada a la conexion
require_once("./config/Connection.php");
//Llamada a los modelos(consultas sql)
require("./models/crudModel.php");
//Objeto o Instacia de la clase Crud
$obj = new Crud();

//Listado de los tipos de herramienta
$list = $obj->list("tbltipo_herramienta");
//Insertar tipos de herramienta
$obj->Insert("tip_her_descripcion","tblestado_general_est_gen_id");


//Actualizar tipos de herramienta
$obj->Update("tbltipo_herramienta","tip_her_id","tip_her_descripcion=");

//Eliminar tipos de herramienta
$obj->Delete("tbltipo_herramienta","tip_her_id");

//Llamada a las vistas
require_once("./views/tiposherramienta/viewHerramientas.php");

?>