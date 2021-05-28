<?php
    //Conexion a la Base de Datos
    require_once('config/Connection.php');
    
    //Modelo Casos
    require_once('models/M_casos.php');

    //Instancia del Modelo casos
    $caso_object = new casoModel();

    //Invocacion del Metodo Listar daño
    $resultCaso = $caso_object->listarCasos();

    //Invocacion del Metodo Selector Prioridad
    $selectorPrioridad = $caso_object->selectorPrioridad();

    //Invocacion del Metodo Selector Daño
    $selectorDaño = $caso_object->selectorDaño();

    //Vista Casos
    require_once('views/casos/V_casos.php');
    
    //Invocacion del Metodo Crear Caso
    if (isset($_POST['usuario_caso'])){
    $caso_insert = $caso_object->create_caso();
    }

    //Invocacion del Metodo Actualizar Caso
    if (isset($_POST['id_caso_update'])){
        $caso_insert = $caso_object->update_caso();
    }

    //Invocacion del Metodo Eliminar caso
    if (isset($_POST['id_delete_caso'])){
        $caso_delete = $caso_object->delete_caso();
    }

    //Invocacion del Metodo Activar caso
    if (isset($_POST['id_activar_caso'])){
        $caso_delete = $caso_object->active_caso();
    }

?>