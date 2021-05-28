<?php

require_once("config/Connection.php");

require_once("models/machineryModel.php");




$obj = new Maquinaria();

$query=$obj->readMachineryActive();

$queryMaquinery=$obj->queryMaquinaria();

// $queryEstado=$obj->queryEstado();

$queryBodega=$obj->readCellarMaq();

$querySupplier=$obj->readSupplierMaq();

if (isset($_POST['añadir_maquinaria_verde'])) {
    $obj->edit_stock();
}

if (isset($_POST['eliminar_maquinaria'])) {
    $obj->delete_Machinery();
}

if (isset($_POST['editar_maquinaria'])) {
    $obj->update_Machinery();
}

if (isset($_POST['añadir_maquinaria'])) {
    $obj->insertMachinery();
}


require_once("views/machinery/V_machineryView.php");



?>