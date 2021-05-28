<?php 
    class thirdparties extends Connection{

        /* Variables */
        private $sql; private $consult; private $query; private $result; private $id; private $documento; private $nombre1; private $nombre2; private $apellido1; private $apellido2; private $correo; private $direccion; private $telefono; private $tip_documento; private $rol; private $estado = 1;
        /* Fin Variables */

        /* LISTAR ACTVOS */
            public function listAssets(){
                $this->sql =" SELECT *
                        FROM tbltercero
                        INNER JOIN tblestado_general
                        ON tblestado_general.est_gen_id = tbltercero.tblestado_general_est_gen_id
                        INNER JOIN tblrol
                        ON tblrol.rol_id = tbltercero.tblrol_rol_id
                        INNER JOIN tbltipo_documento
                        ON tbltipo_documento.tip_doc_id = tbltercero.tbltipo_documento_tip_doc_id 
                        WHERE est_gen_nombre = 'ACTIVO' ";

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

        /* CAMBIAR ESTADO A INACTIVO */

            public function inactiveStatus(){
                    $this->id = $_POST['id_delete'];
                    $this->sql = "UPDATE tbltercero SET tblestado_general_est_gen_id = 2 WHERE ter_id = $this->id ";
                    $this->result = mysqli_query($this->conection, $this->sql);
                    if($this->result){
                        return true;
                    }else{
                        return false;
                    }
            }

            /* FUNCION PARA ACTUALIZAR LOS DATOS*/

            public function updateDates() 
            {
                    $this->id = $_POST['update_id'];
                    $this->nombre1 = $_POST['update_name1'];
                    $this->nombre2 = $_POST['update_name2'];
                    $this->apellido1 = $_POST['update_ape1'];
                    $this->apellido2 = $_POST['update_ape2'];
                    $this->correo = $_POST['update_correo'];
                    $this->direccion = $_POST['update_direccion'];
                    $this->telefono = $_POST['update_telefono'];
                    $this->tip_documento = $_POST['update_Tdocumento'];
                    $this->rol = $_POST['update_rol'];

                    $this->sql =" UPDATE tbltercero SET ter_nombre1 = '$this->nombre1' ,ter_nombre2 = '$this->nombre2' , ter_apellido1 = '$this->apellido1', ter_apellido2 = '$this->apellido2',ter_correo = '$this->correo' , ter_direccion = '$this->direccion' ,ter_telefono = $this->telefono, tbltipo_documento_tip_doc_id = $this->tip_documento, tblrol_rol_id = $this->rol WHERE ter_id = $this->id ";

                    $this->query = mysqli_query($this->conection,$this->sql);
                    
                    if ($this->query) {
                        echo "<script>alert('exito')</script>";
                    }else{
                        echo "<script>alert('error consulta')</script>";
                    }
            }

            /* FUNCION PARA NSERTAR LOS DATOS*/

            public function create_thirt(){

                $this->documento = $_POST['insert_documento'];
                $this->nombre1 = $_POST['insert_name1'];
                $this->nombre2 = $_POST['insert_name2'];
                $this->apellido1 = $_POST['insert_ape1'];
                $this->apellido2 = $_POST['insert_ape2'];
                $this->correo = $_POST['insert_correo'];
                $this->direccion = $_POST['insert_direccion'];
                $this->telefono = $_POST['insert_telefono'];
                $this->tip_documento = $_POST['insert_tipoDocu'];
                $this->rol = $_POST['insert_rol'];

                $campo = " ter_numero_documento, ter_nombre1,ter_nombre2, ter_apellido1,ter_apellido2, ter_correo,ter_direccion, ter_telefono, tbltipo_documento_tip_doc_id, tblrol_rol_id, tblestado_general_est_gen_id ";

                $datos= "$this->documento,'$this->nombre1', '$this->nombre2','$this->apellido1', '$this->apellido2','$this->correo', '$this->direccion', $this->telefono, $this->tip_documento ,$this->rol, $this->estado ";

                $this->sql = " INSERT INTO tbltercero (".$campo.") "." values "."(".$datos.")";
                mysqli_query($this->conection,$this->sql);

                print_r($this->sql);
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

                    /* ROL */
                public function select2(){
                    $this->sql =" SELECT *
                            FROM tblrol
                            INNER JOIN tblestado_general
                            ON tblestado_general.est_gen_id = tblrol.tblestado_general_est_gen_id
                            WHERE est_gen_nombre = 'ACTIVO'";
                            return $this->execute($this->sql);
                }
    }
?>