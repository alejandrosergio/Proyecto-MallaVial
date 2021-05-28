<?php

class reportesOrden extends Connection{

    private $fechaInicio;
    private $fechaFinal;
    private $query;
    private $result;

    function __construct(){
        $this->SetDataConnection();
		$this->establishConnection();
    }

    public function reportes_Orden(){
         $fechaInicio = $_POST['fecha_inicio'];
         $fechaFinal = $_POST['fecha_fin'];

        $this -> query = "SELECT * FROM tblorden 
        INNER JOIN tblusuario ON tblusuario.usu_id = tblorden.tblusuario_usu_id 
        INNER JOIN tbltercero ON tbltercero.ter_id = tblorden.tbltercero_ter_id 
        INNER JOIN tbltipo_prioridad ON tbltipo_prioridad.tip_pri_id = tblorden.tbltipo_prioridad_tip_pri_id 
        WHERE tblorden.tblestado_est_id = 18 and CAST(ord_fecha_registro AS DATE) BETWEEN '$fechaInicio' and '$fechaFinal' ORDER BY ord_id ASC";
        $this -> result = mysqli_query($this->conection,$this -> query);

        if (!$this -> result) {
            die("Error en la consulta.".mysqli_error($this->conection));
        }
        else{
            $json=array();
            while ($row = mysqli_fetch_array($this -> result)) {
                $json[]=array(
                    'id' => $row['ord_id'],
                    'fecha_reg' => $row['ord_fecha_registro'],
                    'prioridad' => $row['tip_pri_descripcion'],
                    'usuario' => $row['usu_nombre1'],
                    'usuarioapellido' => $row['usu_apellido1'],
                    'tercero' => $row['ter_nombre1'],
                    'terceroapellido' => $row['ter_apellido1']
                );
            }
            
            return $json;
        }
        
    }
}