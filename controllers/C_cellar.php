<?php
    //Conexion a la Base de Datos
    require_once('config/Connection.php');

    //Modelo Bodega
    require_once('models/cellarModel.php');

    //Instancia del Modelo Bodega
    $cellar_object = new cellarModel();

    //Invocacion del Metodo Listar Bodegas Activas
    $result = $cellar_object->read_cellar_active();

    //Invocacion del Metodo Selector Tipo de Zona
    $selector = $cellar_object->selector_tip_zon();

    //Vista Bodega
    require_once('views/cellar/V_cellarListActive.php');

    if (isset($_POST['update_cellar'])) {
        //Invocacion del Metodo Actualizar Bodega
        $cellar_update = $cellar_object->update_cellar();
    }
    
    if (isset($_POST['delete_cellar'])) {
        //Invocacion del Metodo Elininar Bodega
        $cellar_delete = $cellar_object->delete_cellar();
    }

    if (isset($_POST['insert_cellar'])) {
        //Invocacion del Metodo Crear Bodega
        $cellar_insert = $cellar_object->create_cellar();
    }
?>