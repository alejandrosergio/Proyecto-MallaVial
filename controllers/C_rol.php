<?php
//Llamada a la conexion
require_once("./config/Connection.php");
//Llamada a los modelos(consultas sql)
require("./models/crudModel.php");
//Objeto o Instacia de la clase Crud
$obj = new Crud();

//Listado de los Tipos de Roles 
$list = $obj->list("tblrol");
//Insertar Tipos de Roles 
$obj->Insert("rol_descripcion","tblestado_general_est_gen_id");
//Actualizar Tipos de Roles 
$obj->Update("tblrol","rol_id","rol_descripcion=");
//Eliminar Tipos de Roles 
$obj->Delete("tblrol","rol_id");
//Llamada a las vistas
require_once("./views/rol/viewRoles.php");

?>