<?php
    //Clase Usuario
    class userModel extends Connection {

        //Variables
        private $id;
        private $documento;
        private $nombre1;
        private $nombre2;
        private $apellido1;
        private $apellido2;
        private $correo;
        private $contraseña;
        private $direccion ;
        private $telefono;
        private $tip_documento;
        private $rolsito;
        private $estado = 1;

        //Insertar Usuario
        public function create_user(){
            if (isset($_POST['id_insert'])){
                $this->id = $_POST['id_insert'];
                $this->documento = $_POST['doc_insert'];
                $this->nombre1= $_POST['nom1_insert'];
                $this->nombre2 = $_POST['nom2_insert'];
                $this->apellido1 = $_POST['ape1_insert'];
                $this->apellido2 = $_POST['ape2_insert'];
                $this->correo = $_POST['cor_insert'];
                $this->contraseña = $_POST['con_insert'];
                $this->direccion = $_POST['dir_insert'];
                $this->telefono = $_POST['tel_insert'];
                //Codigo de la captura de la imagen
                date_default_timezone_set('America/Bogota');
                $fecha=date('_Ymd_His');
                $name   = $_FILES['archiva']['name'];
                $tmpname = $_FILES['archiva']['tmp_name'];
                $ext    = explode('.',$name);
                $ext    = end($ext);
                $ruta   = 'views/assets/img/users/';
                $ruta   = $ruta.$this->nombre1.$fecha.'.'.$ext;
                if (is_uploaded_file($tmpname)) {
                    move_uploaded_file($tmpname,$ruta);
                }else{
                    $ruta = "views/assets/img/users/default_img/default.jpg";
                }
                $this->tip_documento = $_POST['tipdocu_insert'];
                $this->rolsito = $_POST['rol_insert'];
                $sql = "INSERT INTO tblusuario (usu_numero_documento, usu_nombre1, usu_nombre2, usu_apellido1, usu_apellido2, usu_correo, usu_contraseña, usu_direccion, usu_telefono, usu_foto, tbltipo_documento_tip_doc_id, tblrol_rol_id, tblestado_general_est_gen_id)values($this->documento, '$this->nombre1', '$this->nombre2','$this->apellido1', '$this->apellido2','$this->correo',MD5('$this->contraseña'),'$this->direccion', $this->telefono, '$ruta', $this->tip_documento, $this->rolsito, $this->estado)";
                mysqli_query($this->conection,$sql);
            }
        }

        //Listar usuarios activos
        public function read_user_active(){
            $sql ="SELECT * FROM tblusuario INNER JOIN tbltipo_documento ON tbltipo_documento.tip_doc_id = tblusuario.tbltipo_documento_tip_doc_id INNER JOIN tblrol ON tblrol.rol_id = tblusuario.tblrol_rol_id INNER JOIN tblestado_general ON tblestado_general.est_gen_id = tblusuario.tblestado_general_est_gen_id WHERE est_gen_id = 1 ORDER BY usu_id ASC";
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

        //Listar usuarios inactivos
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
        /* LISTAR SELECTORES */
        //Tipo de documento Insertar
        public function selector_tip_doc(){
            $sql = "SELECT * FROM tbltipo_documento WHERE tblestado_general_est_gen_id=1";
            $result = mysqli_query($this->conection,$sql);
            return $result;
        }

         //Tipo de documento Insertar
        public function selector_rol(){
            $sql = "SELECT * FROM tblrol WHERE tblestado_general_est_gen_id=1";
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

        //Actualizar Usuario
        public function update_user(){

            if (isset($_POST['id_update'])){
                $this->id = $_POST['id_update'];
                $this->nombre1 = $_POST['nom1_update'];
                $this->nombre2 = $_POST['nom2_update'];
                $this->apellido1 = $_POST['ape1_update'];
                $this->apellido2 = $_POST['ape2_update'];
                $this->correo = $_POST['cor_update'];
                $this->contraseña = $_POST['con_update'];
                $this->direccion = $_POST['dir_update'];
                $this->telefono = $_POST['tel_update'];
                $this->tip_documento = $_POST['tipdocu_update'];
                $this->rolsito = $_POST['rol_update'];

                
                //Codigo de la captura de la imagen
                date_default_timezone_set('America/Bogota');
                $fecha = date('_Ymd_His');
                $oldimg = $_POST['oldimg'];
                $name = $_FILES['archiva2']['name'];
                $tmpname = $_FILES['archiva2']['tmp_name'];
                $ext = explode('.',$name);
                $ext = end($ext);
                $ruta = 'views/assets/img/users/';
                $ruta = $ruta.$this->nombre1.$fecha.'.'.$ext;
                if (is_uploaded_file($tmpname)){
                    move_uploaded_file($tmpname,$ruta);
                }
                else{
                    $ext = explode('.',$oldimg);
                    $ext = end($ext); 
                    $ruta = $ruta.$this->nombre1.'.'.$ext;
                    rename("$oldimg","$ruta");
                }
                if(empty($_POST['con_update'])){
                    $sql = "UPDATE tblusuario SET usu_nombre1 = '$this->nombre1',usu_nombre2 = '$this->nombre2',usu_apellido1 = '$this->apellido1',usu_apellido2 = '$this->apellido2',usu_correo = '$this->correo',usu_direccion = '$this->direccion',usu_telefono = $this->telefono, usu_foto = '$ruta', tbltipo_documento_tip_doc_id = $this->tip_documento,tblrol_rol_id = $this->rolsito WHERE usu_id = $this->id";
                $resultado = mysqli_query($this->conection,$sql);
                if($resultado){
                    return true;
                }else{
                    return false;
                }
                }
                else{
                $sql = "UPDATE tblusuario SET usu_nombre1 = '$this->nombre1',usu_nombre2 = '$this->nombre2',usu_apellido1 = '$this->apellido1',usu_apellido2 = '$this->apellido2',usu_correo = '$this->correo',usu_contraseña = MD5('$this->contraseña'),usu_direccion = '$this->direccion',usu_telefono = $this->telefono, usu_foto = '$ruta', tbltipo_documento_tip_doc_id = $this->tip_documento,tblrol_rol_id = $this->rolsito WHERE usu_id = $this->id";
                $resultado = mysqli_query($this->conection,$sql);
                if($resultado){
                    return true;
                }else{
                    return false;
                }
            }
        }
        }

        //Eliminar Usuario
        public function delete_user(){
            if (isset($_POST['delet_user']) && isset($_POST['id_delete'])){
                $this->id = $_POST['id_delete'];
                $sql = "UPDATE tblusuario  SET tblestado_general_est_gen_id = 2 WHERE usu_id = $this->id";
                $resultado = mysqli_query($this->conection, $sql);
                if($resultado){
                    return true;
                }else{
                    return false;
                }
            }
        }
    }
?>