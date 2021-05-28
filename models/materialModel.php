<?php
    //Clase Material
    class materialModel extends Connection {

        //Variables
        private $id;
        private $descripcion; 
        private $costo;
        private $minimo;
        private $maximo;
        private $existencia;
        private $fecha_vencimiento;
        private $tipo_material;
        private $estado = 2;
        private $estado2;
        private $bodega;
        private $proveedor;
        private $factura;
        private $concepto;


        //Insertar Material
        public function create_material(){
            if (isset($_POST['insert_material']) && isset($_POST['id_insert']) && isset($_POST['des_insert']) && isset($_POST['num_fac_insert']) && isset($_POST['conc_insert']) && isset($_POST['cost_insert']) && isset($_POST['min_insert']) && isset($_POST['max_insert']) && isset($_POST['exi_insert']) && isset($_POST['fec_ven_insert']) && isset($_POST['tipmat_insert']) && isset($_POST['bod_insert']) && isset($_POST['pro_insert'])){
                $this->id = $_POST['id_insert'];
                $this->descripcion = $_POST['des_insert'];
                $this->factura = $_POST['num_fac_insert'];
                $this->concepto = $_POST['conc_insert'];
                $this->costo = $_POST['cost_insert'];
                $this->minimo = $_POST['min_insert'];
                $this->maximo = $_POST['max_insert'];
                $this->existencia = $_POST['exi_insert'];
                $this->fecha_vencimiento = $_POST['fec_ven_insert'];
                $this->tipo_material = $_POST['tipmat_insert'];
                $this->bodega = $_POST["bod_insert"];
                $this->proveedor = $_POST["pro_insert"];
                $sql = "INSERT INTO tblmaterial (mat_descripcion,mat_numero_factura,mat_concepto,mat_costo,mat_stock_min,mat_stock_max,mat_existencia,mat_fecha_vencimiento,tbltipo_material_tip_mat_id,tblestado_est_id,tblbodega_bod_id,tblproveedor_pro_id) values ('$this->descripcion','$this->factura','$this->concepto',$this->costo,$this->minimo,$this->maximo,$this->existencia,'$this->fecha_vencimiento',$this->tipo_material,$this->estado,$this->bodega,$this->proveedor)";
                mysqli_query($this->conection,$sql);
            }
        }

        //Listar Materiales
        public function read_material_active(){
            $sql ="SELECT * FROM tblmaterial 
			INNER JOIN tbltipo_material
            ON tbltipo_material.tip_mat_id = tblmaterial.tbltipo_material_tip_mat_id
            INNER JOIN tblestado
            ON tblestado.est_id = tblmaterial.tblestado_est_id
            INNER JOIN tbltipo_estado
            ON tbltipo_estado.tip_est_id = tblestado.tbltipo_estado_tip_est_id
            INNER JOIN tblbodega
            ON tblbodega.bod_id = tblmaterial.tblbodega_bod_id
            INNER JOIN tblproveedor
            ON tblproveedor.pro_id = tblmaterial.tblproveedor_pro_id
            WHERE tblestado.tbltipo_estado_tip_est_id = 3
            AND tblbodega.tblestado_general_est_gen_id = 1 
            AND tblproveedor.tblestado_general_est_gen_id = 1 
            ORDER BY mat_id ASC";
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

        //Listar Materiales
        public function read_user_inactive(){
            $tabla = "tblusuario,tbltipo_estado,tblrol,tbltipo_documento";
            $campos = "*";
            $where = " tblestado_est_id = 2";
            $where2 = " tip_est_id = 2";
            $where3 = " tip_est_descripcion = 'INACTIVO' ";
            $sql = "SELECT " . $campos . " FROM " . $tabla . " WHERE " . $where . " AND " . $where2 . " AND " . $where3 . "" ;
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

        /* FUCTION EXECUTE (nos sirve para hacer una consulta general a la base de datos) */
        public function execute($query){
            $consulta = mysqli_query($this->conection,$query); 
            $resultado=array();
            while($row = mysqli_fetch_array($consulta)){
                array_push($resultado, $row);
            }
            return $resultado; 
        }

        //Actualizar Material
        public function update_material(){
            if (isset($_POST['update_material']) && isset($_POST['id_update']) && isset($_POST['des_update']) && isset($_POST['num_fac_update']) && isset($_POST['conc_update']) && isset($_POST['cost_update']) && isset($_POST['min_update']) && isset($_POST['max_update']) && isset($_POST['exi_update'])&& isset($_POST['fec_ven_update']) && isset($_POST['tipmat_update']) && isset($_POST['bod_update']) & isset($_POST['pro_update'])){
                $this->id = $_POST['id_update'];
                $this->descripcion = $_POST['des_update'];
                $this->factura = $_POST['num_fac_update'];
                $this->concepto = $_POST['conc_update'];
                $this->costo = $_POST['cost_update'];
                $this->minimo = $_POST['min_update'];
                $this->maximo = $_POST['max_update'];
                $this->existencia = $_POST['exi_update'];
                $this->fecha_vencimiento = $_POST['fec_ven_update'];
                $this->tipo_material = $_POST['tipmat_update'];
                // $this->estado2 = $_POST['est_update']; 
                $this->bodega = $_POST['bod_update'];
                $this->proveedor = $_POST['pro_update']; 
                $sql = "UPDATE tblmaterial SET mat_descripcion = '$this->descripcion',mat_numero_factura='$this->factura', mat_concepto='$this->concepto', mat_costo = $this->costo, mat_stock_min = $this->minimo, mat_stock_max = $this->maximo, mat_existencia = $this->existencia, mat_fecha_vencimiento = '$this->fecha_vencimiento',tbltipo_material_tip_mat_id = $this->tipo_material, tblbodega_bod_id = $this->bodega, tblproveedor_pro_id = $this->proveedor WHERE mat_id = $this->id";
                $resultado = mysqli_query($this->conection,$sql);
                if($resultado){
                    return true;
                }else{
                    return false;
                }
            }
        }

        //Añadir Stock existente al material
        public function update_stock(){

            if (isset($_POST['id_update'])){
                $this->id = $_POST['id_update'];
                $this->existencia = $_POST['stock_total'];
                $this->factura = $_POST['num_fac_stock'];
                $this->concepto = $_POST['concepto_sotck'];
                $this->proveedor = $_POST['pro_insert3'];
                $sql = "UPDATE tblmaterial SET mat_numero_factura='$this->factura',mat_concepto='$this->concepto',mat_existencia = $this->existencia, tblproveedor_pro_id = $this->proveedor WHERE mat_id = $this->id";
                $resultado = mysqli_query($this->conection,$sql);
                if($resultado){
                    return true;
                }else{
                    return false;
                }
            }
        }
        //Eliminar Material
        public function delete_material(){
            if (isset($_POST['delete_material']) && isset($_POST['id_delete'])){
                $this->id = $_POST['id_delete'];
                $sql = "UPDATE tblmaterial SET tblestado_est_id = 4 WHERE mat_id = $this->id";
                $resultado = mysqli_query($this->conection, $sql);
                if($resultado){
                    return true;
                }else{
                    return false;
                }
            }
        }

        /* LISTAR SELECTORES */
        //Tipo de Material
        public function selector_tip_mate(){
            $sql = "SELECT * FROM tbltipo_material WHERE tblestado_general_est_gen_id=1";
            $result = mysqli_query($this->conection,$sql);
            return $result;
        }
        //Bodega
        public function selector_bodega(){
            $sql = "SELECT * FROM tblbodega WHERE tblestado_general_est_gen_id=1";
            $result = mysqli_query($this->conection,$sql);
            return $result;
        }
         //Proveedor
        public function selector_proveedor(){
            $sql = "SELECT * FROM tblproveedor WHERE tblestado_general_est_gen_id=1";
            $result = mysqli_query($this->conection,$sql);
            return $result;
        }
        
        // //Estado de Material
        // public function selector_estado_material(){
        //     $sql = "SELECT * FROM tblestado
        //     INNER JOIN tbltipo_estado
        //     ON tbltipo_estado.tip_est_id = tblestado.tbltipo_estado_tip_est_id
        //     WHERE est_nombre = 'Material' AND tip_est_descripcion <> 'INACTIVO'";
        //     $result = mysqli_query($this->conection,$sql);
        //     return $result;
        // }
    }
?>