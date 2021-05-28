<?php
    //Conexion a la Base de Datos
    require_once('config/Connection.php');
    
    //Modelo Usuario
    require_once('models/userModel.php');

    //Instancia del Modelo Usuario
    $user_object = new userModel();

    //Invocacion del Metodo Listar Usuarios Activos
    $resultados = $user_object->read_user_active();

    //Invocacion del Metodo Selector Tipo de Documento
    $selector1 = $user_object->selector_tip_doc();


    //Invocacion del Metodo Selector Rol
    $selector2 = $user_object->selector_rol();


    //Vista Usuario
    require_once('views/users/V_usersListActive.php');
    
    //Invocacion del Metodo Actualizar Usuario
    $user_update = $user_object->update_user();
    
    if (isset($_POST['delet_user'])){
        //Invocacion del Metodo Eliminar Usuario
        $user_delete = $user_object->delete_user();
    }


    //Invocacion del Metodo Crear Usuario
    $user_insert = $user_object->create_user();
?>