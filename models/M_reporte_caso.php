<?php 
    class ReporteCaso extends Connection{

        /* Variables */

        private $sql; private $consult; private $query; private $result; private $fecha1; private $fecha2; 
        
        /* Fin Variables */

        /* LISTAR ACTVOS */
            public function ReporteFechas(){

                $this->fecha1 = $_POST["fecha1"];
                $this->fecha2 = $_POST["fecha2"];

                $this->sql =  " SELECT *
                                FROM tblcaso
                                INNER JOIN tbltipo_prioridad
                                ON tbltipo_prioridad.tip_pri_id = tblcaso.tbltipo_prioridad_tip_pri_id
                                WHERE CAST(cas_fecha_registro AS DATE)
                                BETWEEN '$this->fecha1' AND '$this->fecha2' ";

                $this->result = mysqli_query($this->conection,$this->sql);

                if (!$this->result) {
                    printf("Error: %s\n", mysqli_error($this->conection));
                    exit();
                }
                
                $reporte[] = array();
                
                while ($row = mysqli_fetch_array($this->result)){
                    $reporte[] = array(
                        'numero_Caso'     => $row['cas_numero_caso'],   
                        'descripcion'     => $row['cas_descripcion'],
                        'direccion'       => $row['cas_direccion_caso'],
                        'prioridad'       => $row['tip_pri_descripcion'],
                        'fecha_registro'  => $row['cas_fecha_registro'],
                        'iagen_del_dano'  => $row['cas_foto_daño']
                    );
                }
                return $reporte;
            }
            
            /* FUCTION EXECUTE (nos sIrve para hacer una consulta general a la base de datos) */

            public function execute($query){
		
                $this->consult = mysqli_query($this->conection,$query); 
        
                $this->result  = array();
        
                while($row = mysqli_fetch_array($this->consult)) {
                        array_push($this->result, $row);
                }
                return $this->result; 
            }

            /* LIST SELECT */   

                /* Documento */
                public function select1(){
                    $this->sql =" SELECT *
                            FROM tbltipo_documento
                            INNER JOIN tblestado_general
                            ON tblestado_general.est_gen_id = tbltipo_documento.tblestado_general_est_gen_id
                            WHERE est_gen_nombre = 'ACTIVO'";
                            return $this->execute($this->sql);
                }
    }
?>