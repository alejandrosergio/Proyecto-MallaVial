<?php
//llamada al archivo de la conexion


class Crud extends Connection {
    private $sql;
    private $data;
    private $id;
    private $values;
    
    //Función listar 
    public function list($tabla){
        try {
            $this->sql="SELECT *
                        FROM $tabla
                        INNER JOIN tblestado_general
                        ON tblestado_general.est_gen_id = $tabla.tblestado_general_est_gen_id 
                        WHERE est_gen_nombre =  'ACTIVO' "; 
            $this->data = mysqli_query($this->conection,$this->sql);
    
        } catch (Exception $e) {

            echo "Error".$e->getMessage();
           //echo $e.line();
        }
        return $this->data;
    }
    
    public function Insert($campo1,$campo2){
        if(isset($_POST['tbl'])){ 

            $table = $_POST['tbl'];

            $this->values = "'$_POST[values]'".","."1";
            $this->sql = "INSERT INTO $table($campo1,$campo2) VALUES($this->values)";
            $query = mysqli_query($this->conection,$this->sql);
            if($query){
            }else{
                echo "Inserción Fallida";
            }
        }
    }

    public function Update($table,$id_name,$campo){
        if(isset($_POST['Update'])){
        $this->values=$_POST['values'];   
        $this->values =$campo."'$this->values'";
        $this->id = $_POST['id'];

        $this->sql = "UPDATE $table SET  $this->values WHERE $id_name = $this->id";
        mysqli_query($this->conection,$this->sql);
        }
    }

    public function Delete($tabla,$id_name){
        if(isset($_POST['Delete'])){
        $id = $_POST['id'];
        $this->sql ="UPDATE $tabla SET tblestado_general_est_gen_id = 2 WHERE $id_name = $id";
        mysqli_query($this->conection,$this->sql);
        }
        
    }
    

}

?>