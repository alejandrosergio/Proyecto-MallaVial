<?php
class ModalInfo_casos extends Connection{

        //Listar Modelo Listar Casos
        public function read_order_pending2(){
            if(isset($_POST['id_orden_caso'])){
                $id =  $_POST['id_orden_caso'];
                
                $datos = array();
                $sql ="SELECT * FROM tblcaso 
                INNER JOIN tbltipo_prioridad ON tbltipo_prioridad.tip_pri_id = tblcaso.tbltipo_prioridad_tip_pri_id 
                INNER JOIN tbltipo_daño ON tbltipo_daño.tip_dañ_id = tblcaso.tbltipo_daño_tip_dañ_id 
                INNER JOIN tblusuario ON tblusuario.usu_id = tblcaso.tblusuario_usu_id WHERE tblorden_ord_id = $id";
                $consulta = mysqli_query($this->conection,$sql);
                while($rows = mysqli_fetch_array($consulta)){
                    $datos[] = array( 
                    "numero_caso"      =>  $rows["cas_numero_caso"],        
                    "dirección"        =>  $rows["cas_direccion_caso"],
                    "profundidad"      =>  $rows["cas_profundidad"],
                    "largo"            =>  $rows["cas_largo"],
                    "ancho"            =>  $rows["cas_ancho"],
                    "prioridad"        =>  $rows["tip_pri_descripcion"],
                    "tipo_daño"        =>  $rows["tip_dañ_descripcion"],
                    "usuario_nombre"   =>  $rows["usu_nombre1"],
                    "usuario_apellido1"=>  $rows["usu_apellido1"],
                    "usuario_apellido2"=>  $rows["usu_apellido2"]
                );
            }
                return $datos;
            }
        }
}
?>