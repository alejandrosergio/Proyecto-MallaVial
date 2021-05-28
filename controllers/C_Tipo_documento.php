<?php
//Llamada a la conexion
require_once("./config/Connection.php");
//Llamada a los modelos(consultas sql)
require_once("models/crudModel.php");
//Objeto o Instacia de la clase Crud
$obj  = new Crud();

//Listado de los Tipos de Documento
$list = $obj->list("tbltipo_documento");
//Insertar Tipos de Documento
$obj->Insert("tip_doc_descripcion","tblestado_general_est_gen_id");
//Actualizar Tipos de Documento
$obj->Update("tbltipo_documento","tip_doc_id","tip_doc_descripcion=");
//Eliminar Tipos de Documento
$obj->Delete("tbltipo_documento","tip_doc_id");
//Llamada a las vistas
require_once("views/tiposdocumento/viewTipodocumentos.php");


?>