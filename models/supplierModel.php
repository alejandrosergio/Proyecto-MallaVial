<?php
class Proveedor extends Connection {
    private $sql;
    private $array;
    private $where;
    private $result;
    private $id;
    private $nit;
    private $pro_razon_social;
    private $pro_correo;
    private $pro_direccion;
    private $pro_telefono;
    
    function __construct(){
        $this->SetDataConnection();
		$this->establishConnection();
    }

    public function  readSupplierActive(){

        $sql = "SELECT *
                FROM tblproveedor 
                INNER JOIN tblestado_general
                ON tblestado_general.est_gen_id = tblproveedor.tblestado_general_est_gen_id 
                WHERE est_gen_nombre =  'ACTIVO' ORDER BY pro_id ASC";
        
        $result = mysqli_query($this->conection,$sql);
        if($result){
            return $result;
        }
        else{

        }
    }

    //Eliminar proveedor
    public function update_supplier(){
        if (isset($_POST['id_edit_prov']) && isset($_POST['nit']) && isset($_POST['razon_social']) && isset($_POST ['correo']) && isset($_POST['direccion']) && isset($_POST['telefono'])) {
        $this->id=$_POST["id_edit_prov"];
        $this->nit=$_POST["nit"];
        $this->pro_razon_social=$_POST["razon_social"];
        $this->pro_correo=$_POST["correo"];
        $this->pro_direccion=$_POST["direccion"];
        $this->pro_telefono=$_POST["telefono"];


        $sql="UPDATE tblproveedor SET pro_nit='$this->nit',pro_razon_social='$this->pro_razon_social',pro_correo='$this->pro_correo',pro_direccion='$this->pro_direccion',pro_telefono=$this->pro_telefono WHERE pro_id=$this->id";
        
        $result = mysqli_query($this->conection, $sql);
            if($result){

    
            }
            else{
    
    
            }
        }
    }


    //añadir proveedor
    public function insertSupplier(){
        if (isset($_POST['nit']) && isset($_POST['razon_social']) && isset($_POST ['correo']) && isset($_POST['direccion']) && isset($_POST['telefono'])) {
            
        $this->nit=$_POST["nit"];
        $this->pro_razon_social=$_POST["razon_social"];
        $this->pro_correo=$_POST["correo"];
        $this->pro_direccion=$_POST["direccion"];
        $this->pro_telefono=$_POST["telefono"];

        $sql = "INSERT INTO tblproveedor (pro_nit,pro_razon_social,pro_correo,pro_direccion,pro_telefono,tblestado_general_est_gen_id) VALUES ('$this->nit','$this->pro_razon_social','$this->pro_correo','$this->pro_direccion',$this->pro_telefono,1)";
        $result=mysqli_query($this->conection,$sql);
        if($result){
            
        }
        else{
            
        }
    }
}

    public function delete_Supplier(){
        if (isset($_POST['id_elim_prov'])) {
            $this->id = $_POST['id_elim_prov'];
            $sql="UPDATE tblproveedor SET tblestado_general_est_gen_id = 2 WHERE pro_id = $this->id";
            $result = mysqli_query($this->conection, $sql);
                if($result){
                }
                else{
            }
        }
    }
}
?>