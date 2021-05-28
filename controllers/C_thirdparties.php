<?php

/* CONFIGURACIÓN Y MODELO */

require_once('config/Connection.php');

require_once('models/thirdpartiesModel.php');

$object = new thirdparties();

/* VISTA */

$result = $object->listAssets();

$documentos = $object->select1();

$roles = $object->select2();

require_once("views/thirdparties/V_thirdpartiesListActive.php");

/* ACTUALIZAR */
if(isset($_POST['update_id'])){
    $update = $object->updateDates();
}
/* ELIMINAR */
if(isset($_POST['id_delete'])){
    $delete = $object->inactiveStatus();
}

/* ACTUALIZAR */
if(isset($_POST['insert_documento'])){
    $insert = $object->create_thirt();
}

?>