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
                <li class="breadcrumb-item active">Material</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
<div class="style_general">
<div class="style">
<h4><strong>CONSULTAR MATERIALES</strong></h4>

<div id="logmaterial">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>    
                <th>ID</th>
                <th>Nombre del Material</th>
                <th>Tipo de Material</th>
                <th>Fecha de Vencimiento</th>
                <th>Fecha de Registro</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                for ($i = 0; $i < count($resultados); $i++){
            ?>
                <tr>
                    <td><?php echo $resultados[$i][0]; ?></td>
                    <td><?php echo $resultados[$i][1]; ?></td>
                    <td><?php echo $resultados[$i][15]; ?></td>
                    <td>
                        <?php  
                            $fecha_actual = date("Y-m-d");
                            if ($resultados[$i][8] == '0000-00-00'){
                                echo "<b>No tiene</b>";
                            }else{
                            if ($fecha_actual <= $resultados[$i][8]){
                                echo "<div class='alert alert-success' role='alert'>".$resultados[$i][8]."</div>";
                            }if ($fecha_actual > $resultados[$i][8] ){
                                echo "<div  class='alert alert-danger' role='alert'>".$resultados[$i][8]."</div>";
                            }
                            }
                        ?>
                    </td>
                    <td><?php echo $resultados[$i][9]; ?></td>
                    <td> 
                        <a type="button" onclick="detailmaterial(('<?php echo $resultados[$i][0];?>'),
                        ('<?php echo $resultados[$i][1];?>'),
                        ('<?php echo $resultados[$i][2];?>'),
                        ('<?php echo $resultados[$i][3];?>'),
                        ('<?php echo '$'.number_format($resultados[$i][4]);?>'),
                        ('<?php echo $resultados[$i][5];?>'),
                        ('<?php echo $resultados[$i][6];?>'),
                        ('<?php echo $resultados[$i][7];?>'),
                        ('<?php echo $resultados[$i][8];?>'),
                        ('<?php echo $resultados[$i][9];?>'),
                        ('<?php echo $resultados[$i][15];?>'),
                        ('<?php echo $resultados[$i][23];?>'),
                        ('<?php echo $resultados[$i][26];?>'),
                        ('<?php echo $resultados[$i][33];?>')
                        )" 
                        class="btn btn-primary text-white" title="DETALLE" data-toggle="modal" data-target="#modal_detalle_material"><i class="fas fa-eye"></i></a>

                        <a type="button" onclick="update_materials(('<?php echo $resultados[$i][0];?>'),
                        ('<?php echo $resultados[$i][1];?>'),
                        ('<?php echo $resultados[$i][2];?>'),
                        ('<?php echo $resultados[$i][3];?>'),
                        ('<?php echo $resultados[$i][4];?>'),
                        ('<?php echo $resultados[$i][5];?>'),
                        ('<?php echo $resultados[$i][6];?>'),
                        ('<?php echo $resultados[$i][7];?>'),
                        ('<?php echo $resultados[$i][8];?>'),
                        ('<?php echo $resultados[$i][10];?>'),
                        ('<?php echo $resultados[$i][12];?>'),
                        ('<?php echo $resultados[$i][13];?>'),
                        ('<?php echo $resultados[$i][14];?>'),
                        ('<?php echo $resultados[$i][15];?>')
                        )" class="btn btn-warning text-white" title="EDITAR" data-toggle="modal" data-target="#modal_actualizar_material"><i class="fas fa-pencil-alt"></i></a>

                        <a type="button" onclick="delete_materials(<?php echo $resultados[$i][0];?>)" class="btn btn-danger text-white" title="ELIMINAR" data-toggle="modal" data-target="#modal_eliminar_material"><i class="fas fa-trash"></i></a>

                        <a type="button" onclick="stock_material
                        (
                            ('<?php echo $resultados[$i][0];?>'),
                            ('<?php echo $resultados[$i][7];?>'),
                            ('<?php echo $resultados[$i][6];?>'),
                            ('<?php echo $resultados[$i][5];?>')
                        )"
                        class="btn btn-success text-white" title="AÑADIR STOCK" data-toggle="modal" data-target="#modal_stock_material"><i class="fas fa-plus-square"></i></a>
                    </td>
                </tr>
            <?php
                }
            ?>   
        </tbody>
        <tfoot>
        </tr>
    </tfoot>
    </table>
</div>
</div>
</div>
<a type="button" class="btn btn-info text-white añadyr" title="AÑADIR" data-toggle="modal" data-target="#modal_insertar_material"><i class="fas fa-plus"></i></a>
<!-- MODALES -->
<!-- MODAL INSERTAR MATERIAL -->
<div class="modal fade" id="modal_insertar_material" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="staticBackdropLabel" draggable="true">AÑADIR MATERIAL</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body modal-body2">
                <!-- FORMULARIO -->
                <form class="row g-3" id="form_insertar_material">
                    <div class="col-md-12">
                        <input type="number" class="form-control" name="id_insert" id="id" hidden>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" for="inputPassword4" class="form-label">Nombre del Material</label>
                        <input type="text" class="form-control" name="des_insert" id="matdes" autocomplete="off" onpaste="return false" maxlength="40">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Número de Factura</label>
                        <input type="text" class="form-control" name="num_fac_insert" id="num_fac" maxlength="20">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Concepto</label>
                        <input type="text" class="form-control" name="conc_insert" id="conc" maxlength="70">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" for="inputEmail4" class="form-label">Costo del Material</label>
                        <input type="number" min="1" pattern="^[0-9]+" class="form-control" name="cost_insert" id="matcos" autocomplete="off" onpaste="return false">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" for="inputEmail4" class="form-label">Stock Mínimo</label>
                        <input type="number" min="1" pattern="^[0-9]+" class="form-control" name="min_insert" id="matmin" autocomplete="off" onpaste="return false">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" for="inputEmail4" class="form-label">Stock Máximo</label>
                        <input type="number" min="1" pattern="^[0-9]+" class="form-control" name="max_insert" id="matmax" autocomplete="off" onpaste="return false">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" for="inputEmail4" class="form-label">Stock en Existencia</label>
                        <input type="number" min="1" pattern="^[0-9]+" class="form-control" name="exi_insert" id="matexi" autocomplete="off" onpaste="return false">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" for="inputEmail4" class="form-label">Fecha de Vencimiento</label>
                        <input class="form-control" type="date" id="example-date-input1" name="fec_ven_insert" id="fec_ven_insert">
                    </div>
                    <div class="col-md-4">
                        <label draggable="true" for="inputPassword4" class="form-label">Tipo de Material</label>
                        <select name="tipmat_insert" id="tipmat" class="form-control">
                            <option draggable="true" value="" selected>Seleccione...</option>
                            <?php
                                foreach($selector1 as $tipo_material){
                                    echo "<option value=".$tipo_material["tip_mat_id"].">".$tipo_material["tip_mat_descripcion"]."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label draggable="true" for="inputPassword4" class="form-label">Bodega</label>
                        <select name="bod_insert" id="bod" class="form-control">
                            <option draggable="true" value="" selected>Seleccione...</option>
                            <?php
                                foreach($selector3 as $bodega){
                                    echo "<option value=".$bodega["bod_id"].">".$bodega["bod_descripcion"]."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label draggable="true" for="inputPassword4" class="form-label">Proveedor</label>
                        <select name="pro_insert" id="pro" class="form-control">
                            <option draggable="true" value="" selected>Seleccione...</option>
                            <?php
                                foreach($selector4 as $bodega){
                                    echo "<option value=".$bodega["pro_id"].">".$bodega["pro_razon_social"]."</option>";
                                }
                            ?>
                        </select>
                    </div>
                
            </div>
                <div class="modal-footer button_flex">
                    <button type="button" class="btn btn-info text-white button_style_insert_2 cerrar_modal_2" onclick="insert_material()" data-dismiss="modal">Añadir</button>
                    <button type="button" class="btn btn-danger button_style_insert_2" data-dismiss="modal">Cancelar</button>
                </div>
                </form>
        </div>
    </div>
</div>
<!-- MODAL VER DETALLE MATERIAL -->
<div class="modal fade" id="modal_detalle_material" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="staticBackdropLabel" draggable="true">DETALLE MATERIAL</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body modal-body2">
                <!-- FORMULARIO -->
                <form class="row g-3">
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">ID</label>
                        <input type="text" class="form-control id" disabled>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Nombre del Material</label>
                        <input type="text" class="form-control nombre" disabled>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Número Factura</label>
                        <input type="text" class="form-control num_fac1" disabled>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Concepto</label>
                        <input type="text" class="form-control concep1" disabled>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Costo del Material</label>
                        <input type="text" class="form-control costo" disabled>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Stock Mínimo</label>
                        <input type="text" class="form-control min" disabled>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Stock Máximo</label>
                        <input type="text" class="form-control max" disabled>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Stock en Existencia</label>
                        <input type="text" class="form-control exis" disabled>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Fecha de Vencimiento</label>
                        <input type="email" class="form-control venci" disabled>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Fecha de Registro</label>
                        <input type="text" class="form-control regis" disabled>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Tipo de Material</label>
                        <input type="text" class="form-control tip_mat" disabled>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Estado del Material</label>
                        <input type="text" class="form-control est" disabled>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Almacenado en la Bodega</label>
                        <input type="text" class="form-control bod" disabled>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Proveedor</label>
                        <input type="text" class="form-control pro" disabled>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary detalle_style" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL AÑADIR STOCK MATERIAL -->
<div class="modal fade" id="modal_stock_material" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="staticBackdropLabel" draggable="true">AÑADIR STOCK</h5>
            </div>
            <div class="modal-body modal-body2">
                <!-- FORMULARIO -->
                <form class="row g-3" id="form_stock_material">
                <div class="col-md-12">
                    <label hidden draggable="true" for="inputPassword4" class="form-label">ID</label>
                    <input hidden type="number" class="form-control id3" name="id_update" id="id_update_mat_2" readonly>
                </div>
                <div class="col-md-12">
                    <label hidden draggable="true" class="form-label">Stock Mínimo</label>
                    <input hidden min="1" pattern="^[0-9]+" type="number" readonly class="form-control stock_minimo" name="stock_minimo" id="stock_minimo" readonly>
                </div>
                <div class="col-md-6">
                    <label draggable="true" class="form-label">Stock Actual</label>
                    <input type="number" min="1" pattern="^[0-9]+" class="form-control stoex" name="stock_actual" id="stock_anterior" readonly>
                </div>
                <div class="col-md-6">
                    <label draggable="true" class="form-label">Stock Máximo</label>
                    <input type="number" min="1" pattern="^[0-9]+" readonly class="form-control stock_maximo" name="stock_maximo" id="stock_maximo" readonly>
                </div>
                <div class="col-md-6">
                    <label draggable="true" class="form-label">Número de Factura</label>
                    <input type="text" class="form-control" name="num_fac_stock" id="num_fac_stock" maxlength="255">
                </div>
                <div class="col-md-6">
                    <label draggable="true" class="form-label">Concepto</label>
                    <input type="text" class="form-control" name="concepto_sotck" id="concepto_sotck" maxlength="100">
                </div>
                <div class="col-md-6">
                        <label draggable="true" for="inputPassword4" class="form-label">Proveedor</label>
                        <select name="pro_insert3" id="pro3" class="form-control">
                            <option draggable="true" value="" selected>Seleccione...</option>
                            <?php
                                foreach($selector4 as $bodega){
                                    echo "<option value=".$bodega["pro_id"].">".$bodega["pro_razon_social"]."</option>";
                                }
                            ?>
                        </select>
                    </div>
                <div class="col-md-6">
                    <label draggable="true" for="inputEmail4" class="form-label">Agregar al Stock</label>
                    <input type="number" min="1" pattern="^[0-9]+" class="form-control stock_entrantee" oninput="validar_stock()" placeholder="Cantidad Añadir" name="stock_entrate" id="stock_entrante" autocomplete="off" onpaste="return false">
                </div>
                </form><br>
            </div>
            <div class="modal-footer button_flex">
                <button type="button" class="btn btn-success text-white button_style_2 cerrar_modal_2" onclick="add_stock_material()" data-dismiss="modal" id="captura_valores_stock_material">Añadir</button>
                <button type="button" id="cerrar_button_valy" class="btn btn-danger button_style_2" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL ACTUALIZAR MATERIAL -->
<div class="modal fade" id="modal_actualizar_material" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title text-white" id="staticBackdropLabel" draggable="true">ACTUALIZAR MATERIAL</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body modal-body2">
                <!-- FORMULARIO -->
                <form class="row g-3" id="form_actualizar_material">
                    <div class="col-md-6">
                        <label draggable="true" for="inputPassword4" class="form-label">ID</label>
                        <input type="number" class="form-control id2" name="id_update" id="id_update_mat" readonly>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" for="inputPassword4" class="form-label">Nombre del Material</label>
                        <input type="text" class="form-control mat2des" name="des_update" id="mat2des" autocomplete="off" onkeypress="return onlytext(event)" onpaste="return false" maxlength="20">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Número de Factura</label>
                        <input type="text" class="form-control num_fac2" name="num_fac_update" id="num_fac2" readonly maxlength="20">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Concepto</label>
                        <input type="text" class="form-control conc2" name="conc_update" id="conc2" maxlength="70">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" for="inputEmail4" class="form-label">Costo del Material</label>
                        <input type="number" min="1" pattern="^[0-9]+" class="form-control mat2costo" name="cost_update" id="mat2cos" autocomplete="off" onpaste="return false">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" for="inputEmail4" class="form-label">Stock Mínimo</label>
                        <input type="number" min="1" pattern="^[0-9]+" class="form-control mat2min" name="min_update" id="mat2min" autocomplete="off" onpaste="return false">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" for="inputEmail4" class="form-label">Stock Máximo</label>
                        <input type="number" min="1" pattern="^[0-9]+" class="form-control mat2max" name="max_update" id="mat2max" autocomplete="off" onpaste="return false">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" for="inputEmail4" class="form-label">Stock en Existencia</label>
                        <input type="number" min="1" pattern="^[0-9]+" class="form-control mat2exis" name="exi_update" id="mat2exi" autocomplete="off" onpaste="return false" readonly>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" for="inputEmail4" class="form-label">Fecha de Vencimiento</label>
                        <input class="form-control mat2fecven" type="date" id="example-date-input2" name="fec_ven_update">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" for="inputPassword4" class="form-label">Tipo de Material</label>
                        <select name="tipmat_update" id="mat2tip" class="form-control select_cerrar">
                            <?php
                                foreach($selector1 as $tipo_material){
                                    echo "<option value=".$tipo_material["tip_mat_id"].">".$tipo_material["tip_mat_descripcion"]."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" for="inputPassword4" class="form-label">Bodega</label>
                        <select name="bod_update" id="bod2" class="form-control select_cerrar">
                            <?php
                                foreach($selector3 as $bodega){
                                    echo "<option value=".$bodega["bod_id"].">".$bodega["bod_descripcion"]."</option>";
                                }
                            ?>
                        </select>
                    </div> 
                    <div class="col-md-6">
                        <label draggable="true" for="inputPassword4" class="form-label">Proveedor</label>
                        <select name="pro_update" id="pro2" class="form-control select_cerrar">
                            <?php
                                foreach($selector4 as $bodega){
                                    echo "<option value=".$bodega["pro_id"].">".$bodega["pro_razon_social"]."</option>";
                                }
                            ?>
                        </select>
                    </div>                   
                </form>
            </div>
            <div class="modal-footer button_flex">
                <button type="button" class="btn btn-warning text-white button_style_2 cerrar_modal_2" onclick="update_material()"  data-dismiss="modal">Actualizar</button>
                <button type="button" class="btn btn-danger button_style_2" data-dismiss="modal" onclick="CancelarSelect()">Cancelar</button>
            </div>
        </div>
    </div>
</div> 

<!-- MODAL ELIMINAR MATERIAL -->
<div class="modal fade" id="modal_eliminar_material" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-danger  text-white">
                <h5 class="modal-title" id="staticBackdropLabel" draggable="true">ELIMINAR MATERIAL</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body modal-body2">
                <form id="form_eliminar_material"> 
                    <div class="alert alert-danger" role="alert">
                        <p class="font-weight-bold">¿Está seguro de que desea eliminar este material?</p>
                        <p class="font-italic">Esta acción no se puede deshacer.</p>
                        <input type="text" name="id_delete" class="id" hidden>
                    </div>
                </form>
            </div>
            <div class="modal-footer button_flex">
                <button type="button" class="btn btn-danger button_style_2" onclick="delete_material()" data-dismiss="modal">Eliminar</button>
                <button type="button" class="btn btn-secondary button_style_2" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<!-- THEND STYLE --> 
</div>
    <!-- /.content -->
    </div>
<!-- /.content-wrapper -->