<?php

require_once("config/Connection.php");

require_once("models/toolsModel.php");

$obj = new Herramienta();

$query=$obj->readToolsActive();

$queryHerramienta=$obj->queryHerramienta();

// $queryEstado=$obj->queryEstado();

$queryBodega=$obj->readCellar();

$querySupplier=$obj->readSupplier();

if (isset($_POST['añadir_herramienta_verde'])) {
    $obj->edit_stocki();
}

if (isset($_POST['eliminar_herramienta'])) {
    $obj->delete_Tools();
}
if (isset($_POST['editar_herramienta'])) {
    $obj->update_Tools();
}
if (isset($_POST['añadir_herramienta'])) {
    $obj->insertTools();
}



require_once("views/tools/V_ToolsView.php");

?>