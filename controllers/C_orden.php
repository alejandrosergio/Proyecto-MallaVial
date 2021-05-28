<?php
require_once("../models/validate_foreing.php");
require_once("../models/M_orden.php");

$obj = new OrdenesMantenimiento();

if(isset($_POST['insert_orden'])){
    $resultado = $obj->selectInsumos();
}

if (isset($_POST['selector_prioridad'])){
    //Invocacion del Metodo Listar Prioridad
    $resultado = $obj->selectPrioridad();
}

if (isset($_POST['tercero_orden'])) {
    $resultado = $obj->selectTercero();
}

if(isset($_POST['generar_orden'])){
    $resultado  =  $obj->insert_orden();
}

if(isset($_POST['casos_list'])){
    $resultado =$obj->listarCasos();
   }
   
   if (isset($_POST['aprobar_orden'])){
    $resultado = $obj->aprobar_orden();
}

//Validacion de la Funcion Finalizar Orden de Mantenimiento en Proceso
if (isset($_POST['finalizar_orden'])){
    $resultado = $obj->finalizar_orden();
}

echo json_encode($resultado);

?>