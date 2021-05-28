<?php

require_once("config/Connection.php");

require_once("models/validateModel.php");
$obj = new Validate();
if (isset($_POST['validar'])) {
    $obj->validateLogin();
}
$query=$obj->selector_rol();


require_once("views/login/V_loginView.php");

?>