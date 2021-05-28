<?php
    //Conexion a la Base de Datos
    require_once('config/Connection.php');
    //Modelo Orden de Mantenimiento Pendiente
    require_once('models/orderModel.php');
    //Instancia del Modelo Orden de Mantenimiento Pendiente
    $order_object = new orderModel();
    //Invocacion del Metodo Listar Modelo Orden de Mantenimiento Pendiente
    $resultados = $order_object->read_order_pending(18);

    require_once('views/order/V_maintenance_order_performed.php');


?>