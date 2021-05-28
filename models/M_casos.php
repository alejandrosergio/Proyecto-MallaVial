<?php
    //Clase Usuario
    class casoModel extends Connection {

        //Variables
        private $id_caso;
        private $usuario_caso;
        private $numero_caso;
        private $descripcion_caso;
        private $direccion_caso;
        private $profundidad_caso;
        private $largo_caso;
        private $ancho_daño;
        private $tipo_daño;
        private $prioridad_daño ;
        private $fecha_daño ;
        private $orden_daño ;
        private $estado_daño = 14 ;

        //Listar casos
        public function listarCasos(){

                    $sql =" SELECT * FROM tblcaso 
                            INNER JOIN tblusuario
                            ON tblusuario.usu_id = tblcaso.tblusuario_usu_id
                            INNER JOIN tbltipo_daño
                            ON tbltipo_daño.tip_dañ_id = tblcaso.tbltipo_daño_tip_dañ_id
                            INNER JOIN tblestado
                            ON tblestado.est_id = tblcaso.tblestado_est_id
                            INNER JOIN tbltipo_estado
                            ON tbltipo_estado.tip_est_id = tblestado.tbltipo_estado_tip_est_id
                            INNER JOIN tbltipo_prioridad
                            ON tbltipo_prioridad.tip_pri_id = tblcaso.tbltipo_prioridad_tip_pri_id
                            ORDER BY cas_id ASC ";

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

        //Listar casos
        public function listarCasosPendientes(){

            $sql =" SELECT * FROM tblcaso 
                    INNER JOIN tblusuario
                    ON tblusuario.usu_id = tblcaso.tblusuario_usu_id
                    INNER JOIN tbltipo_daño
                    ON tbltipo_daño.tip_dañ_id = tblcaso.tbltipo_daño_tip_dañ_id
                    INNER JOIN tblestado
                    ON tblestado.est_id = tblcaso.tblestado_est_id
                    INNER JOIN tbltipo_estado
                    ON tbltipo_estado.tip_est_id = tblestado.tbltipo_estado_tip_est_id
                    INNER JOIN tbltipo_prioridad
                    ON tbltipo_prioridad.tip_pri_id = tblcaso.tbltipo_prioridad_tip_pri_id
                    WHERE tip_est_descripcion = 'PENDIENTE'
                    ORDER BY cas_id ASC ";

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

        //Insertar Usuario
        public function create_caso(){
            if (isset($_POST['usuario_caso'])){

                $this->usuario_caso = $_POST['usuario_caso'];
                $this->numero_caso = $_POST['numero_caso'];
                $this->descripcion_caso = $_POST['descripcion_caso'];
                $this->direccion_caso = $_POST['direccion_caso'];
                $this->profundidad_caso = $_POST['profundidad_caso'];
                $this->largo_caso = $_POST['largo_caso'];
                $this->ancho_daño = $_POST['ancho_daño'];
                $this->tipo_daño = $_POST['tipo_daño'];
                $this->prioridad_daño = $_POST['prioridad_daño'];

                //Codigo de la captura de la imagen
                date_default_timezone_set('America/Bogota');
                $fecha=date('_Ymd_His');
                $name   = $_FILES['archiva']['name'];
                $tmpname = $_FILES['archiva']['tmp_name'];
                $ext    = explode('.',$name);
                $ext    = end($ext);
                $ruta   = 'views/assets/img/casos/';
                $ruta   = $ruta.$this->numero_caso.$fecha.'.'.$ext;
                if (is_uploaded_file($tmpname)) {
                    move_uploaded_file($tmpname,$ruta);
                }else{
                    $ruta = "views/assets/img/casos/defalut/default.jpg";
                }
                $sql = "INSERT INTO tblcaso(cas_numero_caso,cas_direccion_caso,cas_profundidad,cas_largo,cas_ancho,cas_foto_daño,cas_descripcion,tbltipo_prioridad_tip_pri_id,tbltipo_daño_tip_dañ_id,tblusuario_usu_id,tblestado_est_id) values ('$this->numero_caso','$this->direccion_caso',$this->profundidad_caso,$this->largo_caso,$this->ancho_daño,'$ruta','$this->descripcion_caso',$this->prioridad_daño,$this->tipo_daño,$this->usuario_caso,$this->estado_daño) ";
                mysqli_query($this->conection,$sql);
            }
        }

        //Actualizar Usuario
        public function update_caso(){

            if (isset($_POST['id_caso_update'])){

                $this->id_caso = $_POST['id_caso_update'];
                $this->usuario_caso = $_POST['usuario_caso_update'];
                $this->numero_caso = $_POST['numero_caso_update'];
                $this->descripcion_caso = $_POST['descripcion_caso_update'];
                $this->direccion_caso = $_POST['direccion_caso_update'];
                $this->profundidad_caso = $_POST['profundidad_caso_update'];
                $this->largo_caso = $_POST['largo_caso_update'];
                $this->ancho_daño = $_POST['ancho_daño_update'];
                $this->tipo_daño = $_POST['tipo_daño_update'];
                $this->prioridad_daño = $_POST['prioridad_daño_update'];

                //Codigo de la captura de la imagen
                date_default_timezone_set('America/Bogota');
                $fecha = date('_Ymd_His');
                $oldimg = $_POST['oldimg_caso'];
                $name = $_FILES['archiva2']['name'];
                $tmpname = $_FILES['archiva2']['tmp_name'];
                $ext = explode('.',$name);
                $ext = end($ext);
                $ruta = 'views/assets/img/casos/';
                $ruta = $ruta.$this->numero_caso.$fecha.'.'.$ext;
                if (is_uploaded_file($tmpname)){
                    move_uploaded_file($tmpname,$ruta);
                }
                else{
                    $ext = explode('.',$oldimg);
                    $ext = end($ext); 
                    $ruta = $ruta.$this->numero_caso.'.'.$ext;
                    rename("$oldimg","$ruta");
                }
                $sql =" UPDATE tblcaso 
                        SET cas_descripcion = '$this->descripcion_caso', cas_direccion_caso = '$this->direccion_caso' , cas_profundidad = $this->profundidad_caso, cas_largo = $this->largo_caso, cas_ancho = $this->ancho_daño, tbltipo_prioridad_tip_pri_id = '$this->prioridad_daño', tbltipo_daño_tip_dañ_id =  $this->tipo_daño, cas_foto_daño = '$ruta'
                        WHERE cas_id = $this->id_caso ";

                $resultado = mysqli_query($this->conection,$sql);

                if($resultado){
                    return true;
                }else{
                    return false;
                }
            }
        }


        /* LISTAR SELECTORES */

        //Tipo de daño Insertar
        public function selectorDaño(){
            $sql = "SELECT * FROM tbltipo_daño WHERE tblestado_general_est_gen_id = 1";
            $result = mysqli_query($this->conection,$sql);
            return $result;
        }

        //Prioridad
        public function selectorPrioridad(){
            $sql = "SELECT * FROM tbltipo_prioridad WHERE tblestado_general_est_gen_id = 1";
            $result = mysqli_query($this->conection,$sql);
            return $result;
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

        //Eliminar caso
        public function delete_caso(){
                
                $this->id_caso = $_POST['id_delete_caso'];
                $sql = "UPDATE tblcaso  SET tblestado_est_id = 16 WHERE cas_id = $this->id_caso";
                $resultado = mysqli_query($this->conection, $sql);

                if($resultado){
                    return true;
                }else{
                    echo "error";
                }
        }

        //Activar caso
        public function active_caso(){
                
            $this->id_caso = $_POST['id_activar_caso'];
            $sql = "UPDATE tblcaso  SET tblestado_est_id = 14 WHERE cas_id = $this->id_caso";
            $resultado = mysqli_query($this->conection, $sql);

            if($resultado){
                return true;
            }else{
                echo "error";
            }
        }


    }
?>
