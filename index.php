<?php 
    session_start();
    require_once('controllers/C_plantilla.controlador.php');
    $plantilla = new ControladorPlantilla();
    if(isset($_GET['ruta'])){
        if ($_GET['ruta']=="C_login"){
            
            $plantilla->ctrLogin();
        }
        else if($_GET['ruta']=="logout"){
            $plantilla->ctrLogout();
        }
        else if(!isset($_SESSION['usu_id'])){
            $plantilla->ctrLogout();
            
        }
        else{
            $plantilla->ctrPlantilla();
        }
    }
    else{
        $plantilla->ctrLogout();
    }

    

