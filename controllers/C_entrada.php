<?php

/* CONFIGURACIÓN Y MODELO */

require_once('config/Connection.php');

require_once('models/inventarioModel.php');

$object = new inventario();

/* VISTA */

/* $result = $object->listAssetsEntry(); */

require_once("views/inventario/entrada_inventario.php");

?> 