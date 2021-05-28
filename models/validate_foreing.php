<?php 
require_once("../config/Connection.php");
class ValidateForeings extends Connection{
        private $sql;
        public function ValidateForeing(){
            if(isset($_POST['foreing_N'])){
                    
                $foreing_N  = $_POST['foreing_N'];
                $tabla      = $_POST['tabla'];
                $Foreing_Id = $_POST['Foreing_Id'];
                
                $this->sql ="SELECT $foreing_N FROM $tabla WHERE $foreing_N = $Foreing_Id limit 1";

                $respuesta = mysqli_query($this->conection,$this->sql);   
                if($respuesta -> num_rows === 1) {
            
                    $result =$respuesta -> num_rows;
                
                }else if($respuesta -> num_rows === 0){
                
                    $result =$respuesta -> num_rows;
                }
                return $result;
            }

        }


}


?>