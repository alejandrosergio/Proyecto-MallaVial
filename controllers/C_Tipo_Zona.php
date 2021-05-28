<?php
//Llamada a la conexion
require_once("./config/Connection.php");
//Llamada a los modelos(consultas sql)
require("./models/crudModel.php");
//Objeto o Instacia de la clase Crud
$obj = new Crud();

//Listado de los Tipos de Zona
$list = $obj->list("tbltipo_zona");
//Insertar Tipos de Zona
$obj->Insert("tip_zon_descripcion","tblestado_general_est_gen_id");
//Actualizar Tipos de Zona
$obj->Update("tbltipo_zona","tip_zon_id","tip_zon_descripcion=");
//Eliminar Tipos de Zona
$obj->Delete("tbltipo_zona","tip_zon_id");
//Llamada a las vistas
require_once("./views/tiposzona/viewZonas.php");

?>