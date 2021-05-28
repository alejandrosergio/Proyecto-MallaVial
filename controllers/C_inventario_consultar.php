<?php

/* CONFIGURACIÓN Y MODELO */

require_once('config/Connection.php');

require_once('models/inventarioModel.php');

$object = new inventario();

/* VISTA */

$result = $object->listAssets();

$entrada = $object->listentry();

$salida = $object->list_departures();

require_once("views/inventario/consultar_inventario.php");

?> 