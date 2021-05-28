<div class="style_order2">
<div id="log_orden_finalizar">
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
                while ($fila = mysqli_fetch_object($resultados_proceso)){
                    $id = $fila->ord_id;
                    $prioridad = $fila->tip_pri_descripcion;
                    $fecha_registro = $fila->ord_fecha_registro;
                    $usu_nombre1 = $fila->usu_nombre1;
                    $usu_apellido1 = $fila->usu_apellido1;
                    $usu_apellido2 = $fila->usu_apellido2;
                    $ter_nombre1 = $fila->ter_nombre1;
                    $ter_apellido1 = $fila->ter_apellido1;
                    $ter_apellido2 = $fila->ter_apellido2;
                    $estado = $fila->tblestado_est_id;
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
                        <a type="button" onclick="modal_detalles(
                        ('<?php echo $id;?>'),
                        ('<?php echo 'proceso';?>'))" class="btn btn-primary text-white mymodal" title="DETALLE" data-toggle="modal" data-target="#modal_detalle_finalizar_orden"><i class="fas fa-eye"></i></a>

                        <?php
                            if($estado == 20){
                        ?>
                            <a type="button" onclick="FinalizarOrden(('<?php echo $id;?>'))" class="btn btn-success text-white" title="FINALIZAR ORDEN" data-toggle="modal" data-target="#modal_finalizar_orden"><i class="fas fa-flag"></i></a>
                            
                            <!-- PAUSAR CASO -->
                            <a type="button" onclick="pause_order_peding(<?php echo $id;?>)" class="btn btn-danger text-white" title="SUSPENDER" data-toggle="modal" data-target="#modal_pausar_finalizar_orden"><i class="fas fa-pause"></i></a>
                        <?php
                            }elseif($estado == 22){
                        ?>
                            <!-- ACTIVAR CASO -->
                            <a type="button" onclick="activar_orden_proceso(<?php echo $id;?>)" class="btn btn-info text-white" title="REANUDAR" data-toggle="modal" data-target="#modal_activar_finalizar_orden"><i class="fas fa-play"></i></a>
                        <?php
                            }
                        ?>

                    </td>
                </tr>
            <?php
                }
            ?>   
        </tbody>
        <tfoot>
    </tfoot>
    </table>
</div>
</div>

<!-- MODALES -->

<!-- MODAL VER DETALLE ORDEN EN PROCESO -->
<div class="modal fade" id="modal_detalle_finalizar_orden" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="staticBackdropLabel" draggable="true">DETALLE ORDEN DE MANTENIMIENTO</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body modal-body2">
                <!-- TABLA CASOS -->
                <h4>Casos</h4>
                <div class="style_detalle_order">
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

<div class="modal fade" id="modal_finalizar_orden" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success  text-white">
                <h5 class="modal-title" id="staticBackdropLabel" draggable="true">FINALIZAR ORDEN DE MATENIMIENTO</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body modal-body2">
                <form id="form_finalizar_orden"> 
                    <div class="alert alert-success" role="alert">
                        <p class="font-weight-bold">¿Está seguro que desea finalizar la orden de mantenimiento?</p>
                        <p class="font-italic">Esta acción no se puede revertir.</p>
                        <input type="text" name="id_finalizar_ord" id="id_finalizar_ord" hidden>
                    </div>
                </form>
            </div>
            <div class="modal-footer button_flex">
                <button type="button" class="btn bg-success button_style_2" onclick="finalizar_orden_ajax()" data-dismiss="modal">Finalizar</button>
                <button type="button" class="btn btn-secondary button_style_2" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<!-- MODAL PAUSAR ORDEN DE MANTENIMIENTO -->
<div class="modal fade" id="modal_pausar_finalizar_orden" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-danger  text-white">
                <h5 class="modal-title" id="staticBackdropLabel" draggable="true">SUSPENDER ORDEN DE MANTENIMIENTO</h5>
            </div>
            <div class="modal-body modal-body2">
                <form id="form_pausar_finalizar_orden"> 
                    <div class="alert alert-danger" role="alert">
                        <p class="font-weight-bold">¿Está seguro de que desea suspender esta orden de mantenimiento?</p>
                        <p class="font-italic">Esta acción se puede revertir.</p>
                        <input type="text" name="pausar_finalizar_orden" id="pausar_finalizar_orden" hidden>
                    </div>
                </form>
            </div>
            <div class="modal-footer button_flex">
                <button type="button" class="btn btn-danger button_style_2" onclick="pausar_finalizar_orden_ajax()" data-dismiss="modal">Suspender</button>
                <button type="button" class="btn btn-secondary button_style_2" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL ACTIVAR ORDEN DE MANTENIMIENTO -->
<div class="modal fade" id="modal_activar_finalizar_orden" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info  text-white">
                <h5 class="modal-title" id="staticBackdropLabel" draggable="true">REANUDAR ORDEN DE MANTENIMIENTO</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body modal-body2">
                <form id="form_activar_finalizar_orden"> 
                    <div class="alert alert-info" role="alert">
                        <p class="font-weight-bold">¿Está seguro de que desea reanudar esta orden de mantenimiento?</p>
                        <p class="font-italic">Esta acción se puede revertir.</p>
                        <input type="text" name="activar_finalizar_orden" id="activar_finalizar_orden" hidden>
                    </div>
                </form>
            </div>
            <div class="modal-footer button_flex">
                <button type="button" class="btn btn-info button_style_2" onclick="activar_finalizar_orden_ajax()" data-dismiss="modal">Reanudar</button>
                <button type="button" class="btn btn-secondary button_style_2" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
