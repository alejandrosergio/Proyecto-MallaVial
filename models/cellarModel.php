<?php
    //Clase Bodega
    class cellarModel extends Connection {

        //Variables
        private $id;
        private $descripcion;
        private $direccion;
        private $zona;
        private $estado = 1;

        //Insertar Bodega
        public function create_cellar(){
            if (isset($_POST['insert_cellar']) && isset($_POST['id_insert']) && isset($_POST['nom_insert']) && isset($_POST['dir_insert']) && isset($_POST['zon_insert'])){

                $this->id = $_POST['id_insert'];
                $this->descripcion = $_POST['nom_insert'];
                $this->direccion = $_POST['dir_insert'];
                $this->zona = $_POST['zon_insert'];

                $sql = "INSERT INTO tblbodega (bod_descripcion, bod_direccion, tbltipo_zona_tip_zon_id, tblestado_general_est_gen_id) values ('$this->descripcion','$this->direccion',$this->zona,$this->estado)";
                mysqli_query($this->conection,$sql);
            }
        }

        //Listar bodegas activas
        public function read_cellar_active(){
            $sql ="SELECT *
                    FROM tblbodega
                    INNER JOIN tbltipo_zona
                    ON tbltipo_zona.tip_zon_id = tblbodega.tbltipo_zona_tip_zon_id
                    INNER JOIN tblestado_general
                    ON tblestado_general.est_gen_id = tblbodega.tblestado_general_est_gen_id
                    WHERE est_gen_id = 1 
                    ORDER BY bod_id ASC";
            $consulta = mysqli_query($this->conection,$sql);
            if (!$consulta) {
                printf("Error: %s\n", mysqli_error($this->conection));
                exit();
            }
            $resultados=array();
            while ($row = mysqli_fetch_array($consulta)){
                array_push($resultados, $row);
            }
            return $resultados;
        }

        //Actualizar Bodega
        public function update_cellar(){
            if (isset($_POST['update_cellar']) && isset($_POST['id_update']) && isset($_POST['desc_update']) && isset($_POST['dire_update']) && isset($_POST['zon_update']) ){
                $this->id = $_POST['id_update'];
                $this->descripcion = $_POST['desc_update'];
                $this->direccion = $_POST['dire_update'];
                $this->zona = $_POST['zon_update'];
                $sql = "UPDATE tblbodega SET bod_descripcion = '$this->descripcion',bod_direccion = '$this->direccion',tbltipo_zona_tip_zon_id = $this->zona WHERE bod_id = $this->id";
                $resultado = mysqli_query($this->conection,$sql);
                if($resultado){
                    return true;
                }else{
                    return false;
                }
            }
        }

        //Eliminar bodega
        public function delete_cellar(){
            if (isset($_POST['delete_cellar']) && isset($_POST['id_deletebodega'])){
                $this->id = $_POST['id_deletebodega'];
                $sql = "UPDATE tblbodega SET tblestado_general_est_gen_id = 2 WHERE bod_id = $this->id";
                $resultado = mysqli_query($this->conection, $sql);
                if($resultado){
                    return true;
                }else{
                    return false;
                }
            }
        }

        /* LISTAR SELECTORES */
        public function selector_tip_zon(){
            $sql = "SELECT * FROM tbltipo_zona WHERE tblestado_general_est_gen_id=1";
            $result = mysqli_query($this->conection,$sql);
            return $result;
        }
    }
?>