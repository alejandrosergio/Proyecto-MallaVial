<?php
require_once("../models/validate_foreing.php");
$obj = new ValidateForeings();
$data = $obj->ValidateForeing();

echo json_encode($data);

?>