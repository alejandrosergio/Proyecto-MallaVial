<?php
    class Validate extends Connection{

        public function __construct()
        {
            $this->SetDataConnection();
            $this->establishConnection();
        }

        public function validateLogin(){

            if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['rol']) ) {

                if ($this->conection->connect_errno) {
                    echo "Lo sentimos, la conexion no fue exitosa <br>";
                    echo "Error,".$this->conection->connect_errno."<br>";
                    die();
                }
                else {
                    $email    = $_POST['email'];
                    $password = $_POST['password'];
                    $rol = $_POST['rol'];
                    $contra =md5($password);

                    $sql = "SELECT * FROM tblusuario INNER JOIN tblrol ON tblrol.rol_id = tblusuario.tblrol_rol_id  WHERE  usu_correo='$email' AND usu_contraseña ='$contra' AND tblrol_rol_id=$rol AND tblusuario.tblestado_general_est_gen_id = 1";
                    $respuesta = $this->conection->query($sql);

                    if (!$respuesta) {
                    echo "Lo sentimos, la consulta no pudo efectuarse <br>";
                    echo "Query ". $sql ."<br>";
                    echo "Error," . $this->conection->connect_errno . "<br>";
                    die();  
                    }
                    if ($respuesta -> num_rows === 0) {
                        echo "<script>alert('Tus datos no existen en la base de datos, ¡Intenta de nuevo! ')</script>";
                    }
        
                    while ($respuesta -> num_rows >= 1) {
                        while ($row = mysqli_fetch_object($respuesta)){
                            $nombre_usu = $row->usu_nombre1;
                            $apellido_usu = $row->usu_apellido1;
                            $usu_id = $row->usu_id;
                            $usu_foto = $row->usu_foto;
                            $nameRol = $row->rol_descripcion;
                        }
                        $nom_app = "$nombre_usu "."$apellido_usu";
                        
                        $_SESSION['nom_app']=$nom_app;
                        $_SESSION['usu_id']=$usu_id;
                        $_SESSION['usu_foto']=$usu_foto;
                        $_SESSION['nameRol']=$nameRol;
                        
                        //$_SESSION['usu_foto']=$usu_foto;
                        /* $StringFoto = $usuario['usu_foto'];
                        $rest = substr($StringFoto, 3);
                            
                        $_SESSION['foto']=$rest; */
                        
                        echo "<script>alert('¡Bienvenido $nom_app a Miinerva!')</script>";

                        $yourURL="C_inicio";
                        echo ("<script>location.href='$yourURL'</script>");
                        break;
                    }
                }
                
                    } else {
                    echo "Lo sentimos, no entraste correctamente al sistema";
                    header("location: logout.php");
                    exit();
            }
        }
        public function selector_rol(){
            $sql = "SELECT * FROM tblrol WHERE tblestado_general_est_gen_id=1";
            $result = mysqli_query($this->conection,$sql);
            return $result;
        }
    }
