<div class="style_order2">
<div class="style">
<div id="log_orden_realizada">
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
                while ($fila = mysqli_fetch_object($resultadosRealizada)){
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
                        <a type="button" onclick="modal_detalles(
                    ('<?php echo $id;?>'),
                    ('<?php echo 'realizada';?>'))" class="btn btn-primary text-white mymodal" title="DETALLE" data-toggle="modal" data-target="#modal_detalle_orden_realizada"><i class="fas fa-eye"></i></a>
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

<!-- MODAL VER DETALLE ORDEN PENDIENTE -->
<div class="modal fade" id="modal_detalle_orden_realizada" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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




<!-- THEND STYLE --> 
</div>
    <!-- /.content -->
    </div>
<!-- /.content-wrapper -->