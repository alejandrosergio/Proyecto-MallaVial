<?php
class Herramienta extends Connection {
    private $sql;
    private $array;
    private $where;
    private $result;
    private $id;
    private $Descripcion;
    private $tip_herramienta;
    private $estado;
    private $stock_min;
    private $stock_max;
    private $stock_total;
    private $costo;
    private $existencia;
    private $bodega;
    private $factura;
    private $concepto;

    function __construct(){
        $this->SetDataConnection();
		$this->establishConnection();
    }
    

    public function  readToolsActive(){

        $sql =" SELECT *
                        FROM tblherramienta
                        INNER JOIN tblestado
                        ON tblestado.est_id = tblherramienta.tblestado_est_id
                        INNER JOIN tbltipo_herramienta
                        ON tbltipo_herramienta.tip_her_id = tblherramienta.tbltipo_herramienta_tip_her_id
                        INNER JOIN tbltipo_estado
                        ON tbltipo_estado.tip_est_id = tblestado.tbltipo_estado_tip_est_id
                        INNER JOIN tblbodega
                        ON tblbodega.bod_id = tblherramienta.tblbodega_bod_id
                        INNER JOIN tblproveedor
                        ON tblproveedor.pro_id = tblherramienta.tblproveedor_pro_id
                        WHERE tblestado_est_id <> 12 ORDER BY her_id ASC";
        
        $result = mysqli_query($this->conection,$sql);
        if($result){
            return $result;
        }
        else{

        }
    }

    //Editar herramientas
    public function update_Tools(){
        if (isset($_POST['id_edit_machinery']) && isset($_POST['Descripcion']) && isset($_POST['tip_herramienta'])) {
            $this->id=$_POST["id_edit_machinery"];
            $this->Descripcion=$_POST["Descripcion"];
            $this->factura=$_POST["fact_edit_her"];
            $this->concepto=$_POST["concepto_edit_her"];

            $this->tip_herramienta=$_POST["tip_herramienta"];
            // $this->estado=$_POST["estado"];

            $this->stock_min=$_POST["stock_min_edit_her"];
            $this->stock_max=$_POST["stock_max_edit_her"];
            $this->costo=$_POST["Costo_edit_her"];
            $this->bodega=$_POST["tip_bodega_ins"];
            $this->proveedor=$_POST["tip_proveedor_edit_tools"];

        $sql="UPDATE tblherramienta SET her_descripcion='$this->Descripcion',her_numero_factura='$this->factura', her_concepto='$this->concepto',tbltipo_herramienta_tip_her_id=$this->tip_herramienta,her_costo=$this->costo,her_stock_min=$this->stock_min,her_stock_max=$this->stock_max,tblbodega_bod_id=$this->bodega,tblproveedor_pro_id=$this->proveedor WHERE her_id=$this->id";
        $result = mysqli_query($this->conection, $sql);
        if($result){
        }
        else{
            
            }
        }
    }
    //añadir proveedor
    public function insertTools(){
        
        if (isset($_POST['Descripcion_edit']) && isset($_POST['tip_herramienta_edit'])) {
            $this->Descripcion=$_POST["Descripcion_edit"];
            $this->tip_herramienta=$_POST["tip_herramienta_edit"];
            $this->factura=$_POST["num_fac_ins_her"];
            $this->concepto=$_POST["conceptp_ins_her"];
            $this->stock_min=$_POST["stock_min_ins_her"];
            $this->stock_max=$_POST["stock_max_ins_her"];
            $this->costo=$_POST["Costo_her"];
            $this->existencia=$_POST["Existencia_ins_her"];
            $this->bodega=$_POST["tip_bodega_edit"];
            $this->proveedor=$_POST["tip_proveedor_inst_tools"];

            $sql = "INSERT INTO tblherramienta (her_descripcion,her_numero_factura,her_concepto,tbltipo_herramienta_tip_her_id,tblestado_est_id,her_costo,her_stock_min,her_stock_max,her_existencia,tblbodega_bod_id,tblproveedor_pro_id) VALUES ('$this->Descripcion','$this->factura','$this->concepto',$this->tip_herramienta,9,$this->costo,$this->stock_min,$this->stock_max,$this->existencia,$this->bodega,$this->proveedor)";
        $result=mysqli_query($this->conection,$sql);
        if($result){
            
        }
        else{
            
        }
    }
}

    public function delete_Tools(){
        if (isset($_POST['id_elim_tool'])) {
        $this->id = $_POST['id_elim_tool'];
        $sql="UPDATE tblherramienta SET tblestado_est_id = 12 WHERE her_id =  $this->id";
        $result = mysqli_query($this->conection, $sql);
        if($result){
        }
        else{
            
        }
    }
}


    public function queryHerramienta(){
        $sql = "SELECT * FROM tbltipo_herramienta WHERE tblestado_general_est_gen_id=1";
        $result = mysqli_query($this->conection, $sql);

        $resulta  = array();
        
                while($row = mysqli_fetch_array($result)) {
                        array_push($resulta, $row);
        } 
            return $resulta;
    }

    // public function queryEstado(){
    //     $sql =" SELECT *
    //                     FROM tblestado
    //                     INNER JOIN tbltipo_estado
    //                     ON tbltipo_estado.tip_est_id = tblestado.tbltipo_estado_tip_est_id
    //                     WHERE est_nombre = 'Herramienta' and est_id <> 12";

    //     $result = mysqli_query($this->conection, $sql);
    //     return $result;
    // }
    public function  readCellar(){

        $sql =" SELECT *
                        FROM tblbodega
                        INNER JOIN tblestado_general
                        ON tblestado_general.est_gen_id = tblbodega.tblestado_general_est_gen_id
                        INNER JOIN tbltipo_zona
                        ON tbltipo_zona.tip_zon_id = tblbodega.tbltipo_zona_tip_zon_id
                        WHERE tblbodega.tblestado_general_est_gen_id = 1 ";
        
        $result = mysqli_query($this->conection,$sql);
        $resulta  = array();
        
                while($row = mysqli_fetch_array($result)) {
                        array_push($resulta, $row);
        } 
            return $resulta;
    }

    public function  readSupplier(){

        $sql =" SELECT *
                        FROM tblproveedor
                        INNER JOIN tblestado_general
                        ON tblestado_general.est_gen_id = tblproveedor.tblestado_general_est_gen_id
                        WHERE tblproveedor.tblestado_general_est_gen_id = 1 ";
        
        $result = mysqli_query($this->conection,$sql);
        $resulta  = array();
        
                while($row = mysqli_fetch_array($result)) {
                        array_push($resulta, $row);
        } 
            return $resulta;
    }
    public function edit_stocki(){
        if (isset($_POST['id_stock']) && isset($_POST['stock_total'])) {
        $this->id=$_POST["id_stock"];
        $this->stock_total=$_POST["stock_total"];
        $this->proveedor=$_POST["tip_proveedor_inst_tools2"];
        
        $this->concepto=$_POST["concepto_añadir"];
        $this->factura=$_POST["num_fac_añadir"];

        $sql="UPDATE tblherramienta SET her_existencia=$this->stock_total,tblproveedor_pro_id=$this->proveedor,her_concepto='$this->concepto',her_numero_factura='$this->factura' WHERE her_id=$this->id";
        $result = mysqli_query($this->conection, $sql);
        if($result){
        }
        else{
        }
    }
    }
    
}
?>