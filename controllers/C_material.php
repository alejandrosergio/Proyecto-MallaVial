<?php
    //Conexion a la Base de Datos
    require_once('config/Connection.php');
    //Modelo Material
    require_once('models/materialModel.php');
    //Instancia del Modelo Material
    $material_object = new materialModel();
    //Invocacion del Metodo Listar Material Activos
    $resultados = $material_object->read_material_active();
    //Invocacion del Metodo Selector Tipo de Material
    $selector1 = $material_object->selector_tip_mate();
    // //Invocacion del Metodo Selector Tipo de Material
    // $selector2 = $material_object->selector_estado_material();
    //Invocacion del Metodo Selector Tipo de Material
    $selector3 = $material_object->selector_bodega();
    //Invocacion del Metodo Selector Proveedor
    $selector4 = $material_object->selector_proveedor();
    //Vista Material
    require_once('views/material/V_materialListActive.php');
    if (isset($_POST['update_material'])) {
        //Invocacion del Metodo Actualizar Material
        $material_update = $material_object->update_material();
    }
    if (isset($_POST['delete_material'])) {
        //Invocacion del Metodo Eliminar Material
        $material_delete = $material_object->delete_material();
    }
    if (isset($_POST['insert_material'])) {
        //Invocacion del Metodo Crear Material
        $material_insert = $material_object->create_material();
    }
    if (isset($_POST['stock_total'] )){
        //Invocacion del Metodo añadir Material
        $stock_add = $material_object->update_stock();
    }
?>