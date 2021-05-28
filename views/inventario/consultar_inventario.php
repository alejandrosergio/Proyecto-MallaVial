<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tablero</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Miinerva</a></li>
                <li class="breadcrumb-item active">Consultar Inventario</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<!-- Main content -->
<h4><strong>CONSULTAR INVENTARIO</strong></h4>
<div class="container_ynnv">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">        
                    <table id="sergio_el_rey_del_ajax" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Insumo</th>
                                <th>Costo Unidad</th>
                                <th>Stock Máximo</th>
                                <th>Stock Existente</th>
                                <th>Stock Mínimo</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 0; $i < count($result); $i++) {
                            ?>
                                <tr>
                                    <td><?php echo $result[$i][1];  ?></td>
                                    <td><?php echo "$".number_format($result[$i][2]);  ?></td>
                                    <td><?php echo $result[$i][4];  ?></td>
                                    <td><?php echo $result[$i][5];  ?></td>
                                    <td><?php echo $result[$i][3];  ?></td>
                                    <td> 
                                    <a type="button" class="btn btn-primary text-white" title="DETALLE" data-toggle="modal" data-target="#modal_detalle_inventario" onclick="inventarioDetale
                                        (
                                        ('<?php echo $result[$i][0];?>'),
                                        ('<?php echo $result[$i][1];?>'),
                                        ('<?php echo $result[$i][4];?>'),
                                        ('<?php echo $result[$i][3];?>'),
                                        ('<?php echo $result[$i][5];?>'),
                                        ('<?php echo $result[$i][17];?>'),
                                        ('<?php echo $result[$i][6];?>'),
                                        ('<?php echo $result[$i][27];?>'),
                                        ('<?php echo '$'.number_format($result[$i][2]);?>'),
                                        ('<?php echo $result[$i][31];?>')
                                        )
                                        "><i class="fas fa-eye" ></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6">
                                    <div class="button_actualizar">
                                        <a type="button" class="btn btn-success text-white" onclick="llamarData2()" title="ENTRADA" data-toggle="modal" data-target="#modal_detalle_entrada"><i class="fas fa-arrow-circle-up"></i></a>
                                            
                                        <a type="button" class="btn btn-danger text-white" onclick="llamarData3()" title="SALIDA" data-toggle="modal" data-target="#modal_detalle_salida"><i class="fas fa-arrow-circle-down"></i></i></a>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!-- MODALES -->

<!-- MODAL VER DETALLE INVENTARIO -->

<div class="modal fade modal_he" id="modal_detalle_inventario" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="staticBackdropLabel">DETALLES INSUMO</h5>
        </div>
        <div class="modal-body modal-body2">
<!-- FORM -->
<form class="row g-3">
    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">ID</label>
        <input type="text" class="form-control id"  disabled>
    </div>
    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Insumo</label>
        <input type="text" class="form-control descripcion"  disabled>
    </div>
    <div class="col-md-6">
        <label class="form-label">Stock Máximo</label>
        <input type="text" class="form-control Smax" disabled>
    </div>
    <div class="col-md-6">
        <label class="form-label">Stock Mínimo</label>
        <input type="text" class="form-control Smin" disabled>
    </div>
    <div class="col-md-6">
        <label class="form-label">Stock Existente</label>
        <input type="text" class="form-control Sext" disabled>
    </div>
    <div class="col-md-6">
        <label class="form-label">Almacenado en Bodega</label>
        <input type="text" class="form-control bodega" disabled>
    </div>
    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Estado</label>
        <input type="text" class="form-control estado" disabled>
    </div>
    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Costo Unidad</label>
        <input type="text" class="form-control unidad" disabled>
    </div>
    <div class="col-md-6">
        <label class="form-label">Proveedor</label>
        <input type="text" class="form-control proveedor" disabled>
    </div>
    <div class="col-md-6">
        <label class="form-label">Fecha de Registro</label>
        <input type="text" class="form-control fechaR" disabled>
    </div>
    </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary detalle_style" data-dismiss="modal">Cerrar</button>
    </div>
    </form>
    </div>
    </div>
</div>

<!-- MODAL VER DETALLE ENTRADA -->
<div class="modal fade modal_he" id="modal_detalle_entrada" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="staticBackdropLabel">HISTORIAL INSUMO ENTRADA</h5>
    </div>
<div class="modal-body">
<div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">        
                    <table id="sergio_el_rey_del_ajax2" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                    <th>Número Factura</th>
                                    <th>Insumo</th>
                                    <th>Stock Actual</th>
                                    <th>Costo Total</th>
                                    <th>Proveedor</th>
                                    <th>Concepto</th>
                                    <th>Fecha Registro</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    for ($i = 0; $i < count($entrada); $i++) {
                                ?>
                                    <tr>
                                        <td><?php echo $entrada[$i][9];?></td>
                                        <td><?php echo $entrada[$i][1]; ?></td>
                                        <td><?php echo number_format($entrada[$i][5]);  ?></td>
                                        <td><?php echo "$".number_format($entrada[$i][6]);  ?></td>
                                        <td><?php echo $entrada[$i][14]; ?></td>
                                        <td><?php echo $entrada[$i][10]; ?></td>
                                        <td><?php echo $entrada[$i][4]; ?></td>
                                    </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="7">
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-success detalle_style" data-dismiss="modal">Cerrar</button>
    </div>
    </div>
    </div>
</div>
</div>


<!-- MODAL VER DETALLE SALIDA -->

<div class="modal fade modal_he" id="modal_detalle_salida" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="staticBackdropLabel">HISTORIAL INSUMO SALIDA</h5>
        </div>
        <div class="modal-body">
<div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">        
                    <table id="sergio_el_rey_del_ajax3" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                    <th>Insumo</th>
                                    <th>Stock Saliente</th>
                                    <th>Stock Actual</th>
                                    <th>Costo Stock Salida</th>
                                    <th>Costo Stock Actual</th>
                                    <th>Fecha Registro</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for ($i = 0; $i < count($salida); $i++) {
                                ?>
                                    <tr>
                                        <td><?php echo $salida[$i][1];  ?></td>
                                        <td><?php echo number_format($salida[$i][2]);  ?></td>
                                        <td><?php echo number_format($salida[$i][5]);  ?></td>
                                        <td><?php echo "$".number_format($salida[$i][3]);  ?></td>
                                        <td><?php echo "$".number_format($salida[$i][6]);  ?></td>
                                        <td><?php echo $salida[$i][4]; ?></td>
                                    </tr>
                                    <?php
                                    }
                                ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="6">
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger detalle_style" data-dismiss="modal">Cerrar</button>
    </div>
    </div>
    </div>
</div>
</div>