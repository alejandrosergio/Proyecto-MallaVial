<?php 
    
    class ControladorPlantilla{
        
        static public function ctrPlantilla(){

            include('views/plantilla.php');
        }
        static public function ctrLogin(){
            include('C_login.php');
        }
        static public function ctrLogout(){
            include('config/logout.php');
        }
    }
