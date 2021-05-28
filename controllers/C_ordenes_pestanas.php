
<?php

/* CONEXION */
    //Conexion a la Base de Datos
    require_once('config/Connection.php');

/* MODELOS */
    //Modelo Orden de Mantenimiento Pendiente
    require_once('models/orderModel.php');

    //Modelo Orden de Casos
    require_once('models/M_casos.php');
    //


/* INSTANCIAS DE LOS MODELOS */
    //Instancia del Modelo Orden de Mantenimiento Pendiente
    $order_object = new orderModel();

    //Instancia del Modelo Casos
    $casos_object = new casoModel();


/* LISTAR */
    //Invocacion del Metodo Listar Modelo Orden de Mantenimiento Pendiente
    $resultados = $order_object->read_order_pending(19);

    //Invocacion del Metodo Listar Csos
    $resultCasos = $casos_object->listarCasosPendientes();

    //ordenes realizadas
    $resultadosRealizada = $order_object->read_order_pending(18);



    //Invocacion del Metodo Listar Modelo Orden de Mantenimiento en Proceso
    $resultados_proceso = $order_object->read_order_process();


/*INSTANCIAS DE LOS SELECTORES */

    //Invocacion del Metodo Selector Prioridad
    $selectorPrioridad = $casos_object->selectorPrioridad();

    //Invocacion del Metodo Selector Daño
    $selectorDaño = $casos_object->selectorDaño();




    if (isset($_POST['delete_orden_pendiente'])) {
        //Invocacion del Metodo Eliminar Material
        $order_pending_delete = $order_object->delete_orden_pendiente();
    }






    //Validacion de la Funcion Finalizar Orden de Mantenimiento en Proceso
    if (isset($_POST['finalizar_orden'])){
        $finalizar_orden = $order_object->finalizar_orden();
        echo json_encode($finalizar_orden); 
    } 

    //Validacion de la Funcion Pausar Orden de Mantenimiento en Proceso
    if (isset($_POST['pausar_orden_pen'])) {
        //Invocacion del Metodo Pausar Orden de Mantenimiento en Proceso
        $order_process_delete = $order_object->pausar_orden_proceso();
    }

    //Validacion de la Funcion Activar Orden de Mantenimiento en Proceso
    if (isset($_POST['activar_orden_pen'])) {
        //Invocacion del Metodo Activar Orden de Mantenimiento en Proceso
        $order_process_active = $order_object->activar_orden_proceso();
    }

/* VISTAS  */
    //Vista principal orden de mantenimiento
    require_once("views/order/V_orden.php");
?>