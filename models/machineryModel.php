<?php

class Maquinaria extends Connection {
    private $sql;
    private $array;
    private $where;
    private $result;
    private $id;
    private $Descripcion;
    private $tipo_maquinaria;
    private $est_maquinaria;
    private $stock_min;
    private $stock_max;
    private $costo;
    private $existencia;
    private $bodega;
    private $proveedor;
    private $factura;
    private $concepto;
    private $stock_total;

    function __construct(){
        $this->SetDataConnection();
		$this->establishConnection();
    }

    public function  readMachineryActive(){

        $sql =" SELECT *
                        FROM tblmaquinaria
                        INNER JOIN tblestado
                        ON tblestado.est_id = tblmaquinaria.tblestado_est_id
                        INNER JOIN tbltipo_maquinaria
                        ON tbltipo_maquinaria.tip_maq_id = tblmaquinaria.tbltipo_maquinaria_tip_maq_id
                        INNER JOIN tbltipo_estado
                        ON tbltipo_estado.tip_est_id = tblestado.tbltipo_estado_tip_est_id
                        INNER JOIN tblbodega
                        ON tblbodega.bod_id = tblmaquinaria.tblbodega_bod_id
                        INNER JOIN tblproveedor
                        ON tblproveedor.pro_id = tblmaquinaria.tblproveedor_pro_id
                        WHERE tblestado_est_id <> 8 ORDER BY maq_id ASC";
        
        $result = mysqli_query($this->conection,$sql);
        if($result){
            return $result;
        }
        else{

        }
    }

    //Editar maquinarias
    public function update_Machinery(){
            if (isset($_POST['id']) && isset($_POST['Descripcion']) && isset($_POST['tipo_maquinaria'])) {

            $this->id=$_POST["id"];
            $this->Descripcion=$_POST["Descripcion"];
            $this->tipo_maquinaria=$_POST["tipo_maquinaria"];
            // $this->est_maquinaria=$_POST["est_maquinaria"];

            $this->stock_min=$_POST["stock_min_edit_maq"];
            $this->stock_max=$_POST["stock_max_edit_maq"];
            $this->costo=$_POST["Costo_edit_maq"];
            $this->bodega=$_POST["tip_bodega_insss"];
            $this->proveedor=$_POST["tip_proveedor_edit"];

            $this->factura=$_POST["numero_factura_edit"];
            $this->concepto=$_POST["concepto_edit"];

        $sql="UPDATE tblmaquinaria SET maq_descripcion='$this->Descripcion',tbltipo_maquinaria_tip_maq_id=$this->tipo_maquinaria,maq_costo=$this->costo,maq_stock_min=$this->stock_min,maq_stock_max=$this->stock_max,tblbodega_bod_id=$this->bodega,tblproveedor_pro_id=$this->proveedor,maq_numero_factura='$this->factura',maq_concepto='$this->concepto' WHERE maq_id=$this->id";
        $result = mysqli_query($this->conection, $sql);
        if($result){

        }
        else{
            
        }
    }
}
    //añadir maquinaria
    public function insertMachinery(){
        if (isset($_POST['descripcion']) && isset($_POST['tipo_maquinaria1'])){
            
            $this->Descripcion=$_POST["descripcion"];
            $this->tipo_maquinaria=$_POST["tipo_maquinaria1"];

            $this->stock_min=$_POST["stock_min_ins_maq"];
            $this->stock_max=$_POST["stock_max_ins_maq"];
            $this->costo=$_POST["Costo_maq"];
            $this->existencia=$_POST["Existencia_ins_maq"];
            $this->bodega=$_POST["tip_bodega_inst"];
            $this->proveedor=$_POST["tip_proveedor_inst"];

            $this->factura=$_POST["numero_factura_aña"];
            $this->concepto=$_POST["concepto_aña"];

        $sql = "INSERT INTO tblmaquinaria (maq_descripcion,tbltipo_maquinaria_tip_maq_id,tblestado_est_id,maq_costo,maq_stock_min,maq_stock_max,maq_existencia,tblbodega_bod_id,tblproveedor_pro_id,maq_numero_factura,maq_concepto) VALUES ('$this->Descripcion',$this->tipo_maquinaria,5,$this->costo,$this->stock_min,$this->stock_max,$this->existencia,$this->bodega,$this->proveedor,'$this->factura','$this->concepto')";
        $result=mysqli_query($this->conection,$sql);
        if($result){
            
        }
        else{
            
        }
    }
}

    public function delete_Machinery(){
        if (isset($_POST['id_elim_machinery'])) {
            $this->id = $_POST['id_elim_machinery'];
            $sql="UPDATE tblmaquinaria SET tblestado_est_id = 8 WHERE maq_id = $this->id";
            $result = mysqli_query($this->conection, $sql);
                if($result){
            
                }
                else{
            
                }
        }
        
    }


    public function queryMaquinaria(){
        $sql = "SELECT * FROM tbltipo_maquinaria WHERE tblestado_general_est_gen_id=1";
        $result = mysqli_query($this->conection, $sql);

        $resulta  = array();
        
                while($row = mysqli_fetch_array($result)) {
                        array_push($resulta, $row);
        } 
            return $resulta;
    }

    public function queryEstado(){
        $sql =" SELECT * FROM tblestado
        INNER JOIN tbltipo_estado
        ON tbltipo_estado.tip_est_id = tblestado.tbltipo_estado_tip_est_id
        where est_nombre = 'Maquinaria' and tip_est_id <> 4 ";

        $result = mysqli_query($this->conection, $sql);
        return $result;
    }

    public function  readCellarMaq(){

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

    public function  readSupplierMaq(){

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

    public function edit_stock(){
        if (isset($_POST['id_registro']) && isset($_POST['tip_proveedor_añañay'])) {

        $this->id=$_POST["id_registro"];
        $this->stock_total=$_POST["stock_total"];
        $this->proveedor=$_POST["tip_proveedor_añañay"];

        $this->concepto=$_POST["concepto_añadir"];
        $this->factura=$_POST["num_fac_añadir"];

        $sql="UPDATE tblmaquinaria SET maq_existencia=$this->stock_total,
        tblproveedor_pro_id =$this->proveedor,maq_concepto='$this->concepto',maq_numero_factura='$this->factura' WHERE maq_id=$this->id";
        $result = mysqli_query($this->conection, $sql);
        if($result){
        }
        else{
        }
    }
    }
    
}
?>