<?php
require_once('../config/Connection.php');
require_once('../models/reporteOrdenModel.php');

$obj = new reportesOrden();

if(isset($_POST['fecha_inicio'])){
    $resultado= $obj -> reportes_Orden();
}
echo json_encode($resultado);
?>