<?php
    //Clase Material
    class orderModel extends Connection {

        //Variables
        private $id;

        //Listar Modelo Orden de Mantenimiento Pendiente
        public function read_order_pending($id){
            $sql ="SELECT * FROM tblorden 
			INNER JOIN tbltipo_prioridad ON tbltipo_prioridad.tip_pri_id = tblorden.tbltipo_prioridad_tip_pri_id 
            INNER JOIN tblusuario ON tblusuario.usu_id = tblorden.tblusuario_usu_id 
            INNER JOIN tbltercero ON tbltercero.ter_id = tblorden.tbltercero_ter_id   

            WHERE tblorden.tblestado_est_id=$id ORDER BY ord_id ASC";
            $consulta = mysqli_query($this->conection,$sql);
            if($consulta){
                return $consulta;
            }
            else{
    
            }
        }

        //Listar Modelo Orden de Mantenimiento en Proceso
        public function read_order_process(){
            $sql ="SELECT * FROM tblorden 
			INNER JOIN tbltipo_prioridad ON tbltipo_prioridad.tip_pri_id = tblorden.tbltipo_prioridad_tip_pri_id 
            INNER JOIN tblusuario ON tblusuario.usu_id = tblorden.tblusuario_usu_id 
            INNER JOIN tbltercero ON tbltercero.ter_id = tblorden.tbltercero_ter_id   
            WHERE tblestado_est_id = 20 OR  tblestado_est_id = 22
            ORDER BY ord_id ASC";
            $consulta = mysqli_query($this->conection,$sql);
            if($consulta){
                return $consulta;
            }
            else{
    
            }
        }

        //Eliminar Orden Pendiente
        public function delete_orden_pendiente(){
            if (isset($_POST['delete_orden_pendiente']) && isset($_POST['id_delete'])){
                $this->id = $_POST['id_delete'];
                $sql = "UPDATE tblorden SET tblestado_est_id = 21 WHERE ord_id = $this->id";
                $resultado = mysqli_query($this->conection, $sql);
                if ($resultado) {
                    $sql = "UPDATE tblcaso SET tblorden_ord_id = NULL, tblestado_est_id = 14 WHERE tblorden_ord_id = $this->id"; 
                    $resultado = mysqli_query($this->conection, $sql);
                }
                if($resultado){
                    return true;
                }else{
                    return false;
                }
            }
        }

        // ORDENES DE MANTENIMIENTO EN PROCESO

       















        //PAUSAR ORDEN DE MATENIMIENTO EN PROCESO
        public function pausar_orden_proceso(){
            if (isset($_POST['pausar_orden_pen']) && isset($_POST['pausar_finalizar_orden'])){
                $this->id = $_POST['pausar_finalizar_orden'];
                $sql = "UPDATE tblorden SET tblestado_est_id = 22 WHERE ord_id = $this->id";
                $resultado = mysqli_query($this->conection, $sql);
                if($resultado){
                    return true;
                }else{
                    return false;
                }
            }
        }


        //ACTIVAR ORDEN DE MATENIMIENTO EN PROCESO PAUSADA
        public function activar_orden_proceso(){
            if (isset($_POST['activar_orden_pen']) && isset($_POST['activar_finalizar_orden'])){
                $this->id = $_POST['activar_finalizar_orden'];
                $sql = "UPDATE tblorden SET tblestado_est_id = 20 WHERE ord_id = $this->id";
                $resultado = mysqli_query($this->conection, $sql);
                if($resultado){
                    return true;
                }else{
                    return false;
                }
            }
        }
    }
?>