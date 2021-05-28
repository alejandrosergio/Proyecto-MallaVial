<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN MIINERVA</title>
    <!-- CSS -->
    <link rel="stylesheet" href="views/assets/css/login.css">
    <link rel="icon" href="views/assets/img/VIA-icon.png">
</head>
<body>
    <section>
        <!-- SLIDER -->
        <div class="container-slider">
            <div class="slider" id="slider">
                <div class="slider__section">
                    <img src="views/assets/img/login/img1.jpg" class="slider__img">
                </div>
    
                <div class="slider__section">
                    <img src="views/assets/img/login/img2.jpg" class="slider__img">
                </div>
    
                <div class="slider__section">
                    <img src="views/assets/img/login/img3.jpg"class="slider__img">
                </div>
    
                <div class="slider__section">
                    <img src="views/assets/img/login/img4.jpg" class="slider__img">
                </div>
                <div class="slider__section">
                    <img src="views/assets/img/login/img5.jpg" class="slider__img">
                </div>
                <div class="slider__section">
                    <img src="views/assets/img/login/img6.jpg" class="slider__img">
                </div>
            </div>
            <div class="slider__btn slider__btn--rigth" id="btn-rigth">&#62;</div>
            <div class="slider__btn slider__btn--left" id="btn-left">&#60;</div>
        </div>
        <!--  TITLE -->
        <div class="contentBx">
            <div class="formBx">
                <center>
                    <h2>MIINERVA</h2>
                </center>
                <!-- FORM -->
                <form action="C_login" method="POST"class="formulario" id="formulario">
                    <div class="inputBx">
                        <span><i class="fas fa-address-card"></i> Rol del Usuario</span>
                        <select required name="rol">
                        <option value="">Seleccione Rol</option>
                            <?php
                                foreach($query as $rol){
                                    echo "<option value=".$rol["rol_id"].">".$rol["rol_descripcion"]."</option>";
                                }
                            ?>
                        </select>
                        <input type="number" hidden value="1" name="validar">
                        <div class="inputBx">
                            <span><i class="fas fa-envelope"></i> Correo Electrónico</span>
                            <input type="email" name="email" required>
                        </div>
                        <div class="inputBx">
                            <span><i class="fas fa-lock"></i> Contraseña</span>
                            <input type="password" name="password" required>
                        </div><br>
                        <!-- <div class="checkbox remember">
                            <input type="checkbox" class="input-assumpte" id="input-confidencial"/>
                            <label for="input-confidencial" style="font-size: 17px;"> Recordarme </label>
                        </div> -->
                        <div class="inputBx">
                            <button type="submit" class="btn"> Ingresar </button>
                        </div>
                        <div class="inputBx">
                        </div>
                    </div>
                </form><br><br>
                <div class="letras_animation">
                    <div class="animate-me">
                    MIINERVA
                    </div>
                    <div class="animate-me">
                    MIINERVA
                    </div>
                    <div class="animate-me">
                    MIINERVA
                    </div>
                    <div class="animate-me">
                    MIINERVA
                    </div>
                    <div class="animate-me">
                    MIINERVA
                    </div>
                    <div class="animate-me">
                    MIINERVA
                    </div>
                    <div class="animate-me">
                    MIINERVA
                    </div>
                    <div class="animate-me">
                    MIINERVA
                    </div>
                </div>
            </div>
        </div>
        <!-- BUTTON FLOTANTE -->
    </section>
    <div class="button-float">
        <input type="checkbox" id="btn-mas">
        <div class="opciones">
            <a href="https://www.facebook.com/">Y</a>
            <a href="https://www.facebook.com/">X</a>
        </div>
        <!-- <div class="btn-mas">
            <label for="btn-mas" class="button-desplegable">?</label>
        </div> -->
    </div>
    <!-- SCRIPT -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q==" crossorigin="anonymous"></script>
    <script type="module" src="views/assets/js/login.js"></script>
</body>
</html>