<?php 
require_once("../config/Connection.php");
require_once("../models/detalle_orden/modal_insumos.php");
$obj = new ModalInfo_insumos();
$resultado = $obj->read_input_order_peding();

echo json_encode($resultado);

?>