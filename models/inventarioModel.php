<?php 
    class inventario extends Connection{

        /* Variables */
        private $sql; private $result; 
        /* Fin Variables */

        /* LISTAR ACTVOS */
            public function listAssets(){
                $this->sql =" SELECT *
                        FROM tblinventario
                        INNER JOIN tblbodega
                        ON tblbodega.bod_id = tblinventario.tblbodega_bod_id
                        INNER JOIN tblestado
                        ON tblestado.est_id = tblinventario.tblestado_est_id
                        INNER JOIN tbltipo_estado
                        ON tbltipo_estado.tip_est_id = tblestado.tbltipo_estado_tip_est_id
                        INNER JOIN tblproveedor
                        ON tblproveedor.pro_id  = tblinventario.tblproveedor_pro_id
                        WHERE tbltipo_estado_tip_est_id = 3 ORDER BY inv_id ";

                $this->result = mysqli_query($this->conection,$this->sql);
                if (!$this->result) {
                    printf("Error: %s\n", mysqli_error($this->conection));
                    exit();
                }
                $this->results=array();
                while ($row = mysqli_fetch_array($this->result)){ 
                    array_push($this->results, $row);
                }
                return $this->results;
            } 

            public function listentry(){
                $this->sql ="SELECT *
                FROM tblmovimiento_inventario
                INNER JOIN tblproveedor
                ON tblproveedor.pro_id  = tblmovimiento_inventario.tblproveedor_pro_id
                WHERE mov_inv_tipo_movimiento = 'ENTRADA' ORDER BY mov_inv_id DESC";

                $this->result = mysqli_query($this->conection,$this->sql);
                if (!$this->result) {
                    printf("Error: %s\n", mysqli_error($this->conection));
                    exit();
                }
                $this->results=array();
                while ($row = mysqli_fetch_array($this->result)){ 
                    array_push($this->results, $row);
                }
                return $this->results;
            } 

            public function list_departures(){
                $this->sql ="SELECT *
                FROM tblmovimiento_inventario
                INNER JOIN tblproveedor
                ON tblproveedor.pro_id  = tblmovimiento_inventario.tblproveedor_pro_id
                WHERE mov_inv_tipo_movimiento = 'SALIDA' ORDER BY mov_inv_id DESC";

                $this->result = mysqli_query($this->conection,$this->sql);
                if (!$this->result) {
                    printf("Error: %s\n", mysqli_error($this->conection));
                    exit();
                }
                $this->results=array();
                while ($row = mysqli_fetch_array($this->result)){ 
                    array_push($this->results, $row);
                }
                return $this->results;
            } 
    }

?>