<div class="style_order2">
<div id="log_orden_pendiente">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>    
                <th>ID</th>
                <th>Realizado por</th>
                <th>Tercero</th>
                <th>Prioridad</th>
                <th>Fecha de Registro</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while ($fila = mysqli_fetch_object($resultados)){
                    
                    $id = $fila->ord_id;
                    $prioridad = $fila->tip_pri_descripcion;
                    $fecha_registro = $fila->ord_fecha_registro;
                    $usu_nombre1 = $fila->usu_nombre1;
                    $usu_apellido1 = $fila->usu_apellido1;
                    $usu_apellido2 = $fila->usu_apellido2;
                    $ter_nombre1 = $fila->ter_nombre1;
                    $ter_apellido1 = $fila->ter_apellido1;
                    $ter_apellido2 = $fila->ter_apellido2;
            ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo  $usu_nombre1." ".$usu_apellido1." ".$usu_apellido2;?></td>
                    <td><?php echo $ter_nombre1." ".$ter_apellido1 ." ".$ter_apellido2; ?></td>
                    <td>
                        <?php
                            
                            if ($prioridad == 'Alta'){
                                echo "<div  class='alert alert-danger' role='alert'>".$prioridad."</div>";
                            }else{
                            if ($prioridad == 'Media'){
                                echo "<div class='alert alert-warning' role='alert'>".$prioridad."</div>";
                            }if ($prioridad == 'Baja'){
                                echo "<div  class='alert alert-success' role='alert'>".$prioridad."</div>";
                            }
                            }
                        ?>
                    </td>
                    <td><?php echo $fecha_registro; ?></td>
                    <td> 
                        <a type="button" onclick="modal_detalles(<?php echo $id ?>)" class="btn btn-primary text-white mymodal" title="DETALLE" data-toggle="modal" data-target="#modal_detalle_orden_pendiente"><i class="fas fa-eye"></i></a>

                        <a type="button" onclick="AprobarOrden(
                            ('<?php echo $id;?>')
                        )"
                        class="btn btn-success text-white" title="APROBAR ORDEN" data-toggle="modal" data-target="#modal_aprobar_orden"><i class="fas fa-check"></i></a>

                        <a type="button" onclick="delete_order_peding(<?php echo $id;?>)" class="btn btn-danger text-white" title="ELIMINAR" data-toggle="modal" data-target="#modal_eliminar_orden_pendiente"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            <?php
                }
            ?>   
        </tbody>
        <tfoot>
        <tr>
        </tr>
    </tfoot>
    </table>
</div>
</div>

<!-- MODAL VER DETALLE ORDEN PENDIENTE -->
<div class="modal fade" id="modal_detalle_orden_pendiente" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="staticBackdropLabel" draggable="true">DETALLE ORDEN DE MANTENIMIENTO</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body modal-body2">
            <h4>Casos</h4>
                <div class="style_detalle_order">
                <!-- TABLA CASOS -->
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Número del Caso</th>
                            <th>Dirección</th>
                            <th>Profundidad</th>
                            <th>Largo</th>
                            <th>Ancho</th>
                            <th>Prioridad</th>
                            <th>Tipo de Daño</th>
                            <th>Realizado por</th>
                        </tr>
                    </thead>
                    <tbody id="table_caso">
                    </tbody>
                </table>
                </div>
            <!--FIN TABLA CASOS-->

            <!--TABLA INSUMOS-->
            <h4>Insumos</h4>
            <div class="style_detalle_order">
            <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Insumo</th>
                            <th>Cantidad</th>
                            <th>Costo Unitario</th>
                            <th>Costo Total</th>
                        </tr>
                    </thead>
                    <tbody id="table_insumos">
                    </tbody>
            </table>
            </div>
            <!--FIN TABLA INSUMOS-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary detalle_style" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_aprobar_orden" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success  text-white">
                <h5 class="modal-title" id="staticBackdropLabel" draggable="true">APROBAR ORDEN DE MATENIMIENTO</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body modal-body2">
                <form id="form_aprobar_orden"> 
                    <div class="alert alert-success" role="alert">
                        <p class="font-weight-bold">¿Está seguro que desea aprobar la orden de mantenimiento?</p>
                        <p class="font-italic">Esta acción no se puede deshacer.</p>
                        <input type="text" name="id_aprobar_ord" id="id_aprobar_ord" hidden>
                    </div>
                </form>
            </div>
            <div class="modal-footer button_flex">
                <button type="button" class="btn bg-success button_style_2" onclick="aprobar_orden_ajax()" data-dismiss="modal">Aprobar</button>
                <button type="button" class="btn btn-secondary button_style_2" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL ELIMINAR ORDEN DE MANTENIMIENTO -->
<div class="modal fade" id="modal_eliminar_orden_pendiente" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-danger  text-white">
                <h5 class="modal-title" id="staticBackdropLabel" draggable="true">ELIMINAR ORDEN DE MANTENIMIENTO</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body modal-body2">
                <form id="form_eliminar_orden_pendiente"> 
                    <div class="alert alert-danger" role="alert">
                        <p class="font-weight-bold">¿Está seguro de que desea eliminar esta orden de mantenimiento?</p>
                        <p class="font-italic">Esta acción no se puede deshacer.</p>
                        <input type="text" name="id_delete" class="id_eliminar_orden_pendiente" hidden>
                    </div>
                </form>
            </div>
            <div class="modal-footer button_flex">
                <button type="button" class="btn btn-danger button_style_2" onclick="delete_order_p()" data-dismiss="modal">Eliminar</button>
                <button type="button" class="btn btn-secondary button_style_2" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>