<?php
require_once("../config/Connection.php");
require_once("../models/detalle_orden/modal_caso.php");
$obj = new ModalInfo_casos();
$resultado = $obj->read_order_pending2();

echo json_encode($resultado);

?>