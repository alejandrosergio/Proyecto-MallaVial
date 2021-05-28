<?php

require_once("config/Connection.php");

require_once("models/supplierModel.php");

$obj = new Proveedor();

$query=$obj->readSupplierActive();

if (isset($_POST['eliminar_proveedor'])) {
    $obj->delete_Supplier();
}
if (isset($_POST['editar_proveedor'])) {
    $obj->update_supplier();
}
if (isset($_POST['añadir_proveedor'])) {
    $obj->insertSupplier();
}



require_once("views/suppliers/V_suppliersView.php");

?>