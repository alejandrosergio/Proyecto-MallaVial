<?php
//Llamada a la conexión
require_once("./config/Connection.php");
//Llamada a los modelos(consultas sql)
require("./models/crudModel.php");
//Objeto o Instacia de la clase Crud
$obj = new Crud();

//Listado de los Tipos de Daño
$list = $obj->list("tbltipo_daño");
//Insertar Tipos de Daño
$obj->Insert("tip_dañ_descripcion","tblestado_general_est_gen_id");
//Actualizar TipoS de daño
$obj->Update("tbltipo_daño","tip_dañ_id","tip_dañ_descripcion=");
//Eliminar Tipos de daño
$obj->Delete("tbltipo_daño","tip_dañ_id");
//Llamada a las vistas
require_once("./views/tipodaños/viewDaños.php");

?>