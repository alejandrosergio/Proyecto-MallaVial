
/* FUNCION ENVIAR DATOS A LA MODAL DE DETALLE */

function inventarioDetale(id,descripcion,Smax,Smin,Sext,bodega,fechaR,estado,unidad,proveedor){

$("#modal_detalle_inventario .modal-body .id ").val(id);
$("#modal_detalle_inventario .modal-body .descripcion ").val(descripcion);
$("#modal_detalle_inventario .modal-body .Smax ").val(Smax);
$("#modal_detalle_inventario .modal-body .Smin ").val(Smin);
$("#modal_detalle_inventario .modal-body .Sext ").val(Sext);
$("#modal_detalle_inventario .modal-body .bodega ").val(bodega);
$("#modal_detalle_inventario .modal-body .fechaR ").val(fechaR);
$("#modal_detalle_inventario .modal-body .estado ").val(estado);
$("#modal_detalle_inventario .modal-body .unidad ").val(unidad);
$("#modal_detalle_inventario .modal-body .proveedor ").val(proveedor);

}

function inventarioDetaleEntry(id,descripcion,Smax,Smin,Sext,bodega,fechaR,estado,unidad){

    $("#modal_detalle_entrada .modal-body .id ").val(id);
    $("#modal_detalle_entrada .modal-body .descripcion ").val(descripcion);
    $("#modal_detalle_entrada .modal-body .Smax ").val(Smax);
    $("#modal_detalle_entrada .modal-body .Smin ").val(Smin);
    $("#modal_detalle_entrada .modal-body .Sext ").val(Sext);
    $("#modal_detalle_entrada .modal-body .bodega ").val(bodega);
    $("#modal_detalle_entrada .modal-body .fechaR ").val(fechaR);
    $("#modal_detalle_entrada .modal-body .estado ").val(estado);
    $("#modal_detalle_entrada .modal-body .unidad ").val(unidad);
    
    }

