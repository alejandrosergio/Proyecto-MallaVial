<?php
//Llamada a la conexion
require_once("./config/Connection.php");
//Llamada a los modelos(consultas sql)
require("./models/crudModel.php");
//Objeto o Instacia de la clase Crud
$obj = new Crud();

//Listado de los tipos de maquinaria
$list = $obj->list("tbltipo_maquinaria");
//Insertar tipos de maquinaria
$obj->Insert("tip_maq_descripcion","tblestado_general_est_gen_id");

//Actualizar tipos de maquinaria
$obj->Update("tbltipo_maquinaria","tip_maq_id","tip_maq_descripcion=");

//Eliminar tipos de maquinaria
$obj->Delete("tbltipo_maquinaria","tip_maq_id");

//Llamada a las vistas
require_once("./views/tiposmaquinaria/viewMaquinarias.php");

?>