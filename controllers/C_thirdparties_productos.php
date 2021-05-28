<?php

/* CONFIGURACIÓN Y MODELO */

require_once('config/Connection.php');

require_once('models/thirdpartiesModel.php');

$object = new thirdparties();

/* VISTA */


require_once("views/thirdparties/V_thirdpartiesProductos.php");

?>