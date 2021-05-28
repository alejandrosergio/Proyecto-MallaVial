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
                <li class="breadcrumb-item active">Maquinaria</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
<div class="style_general">
<div class="style">
<h4><strong>CONSULTAR MAQUINARIA</strong></h4>
<div id="load_Machinerys">
<table class="table table-striped table-bordered table-hover"  id="ConsulProv" style="text-align:center important;">
					<thead class="text-center">
						<tr id="statico_Machinery">
							<th>ID</th>
							<th>Descripción</th>
                            <th>Tipo de Maquinaria</th>
                            <th>Fecha de Registro</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
					<?php
                        while ($row = mysqli_fetch_object($query)){
                        $id = $row->maq_id;
                        $descripcion = $row->maq_descripcion;
                        $fecha_registro = $row->maq_fecha_registro;
                        $tipo_maquinaria = $row->tip_maq_descripcion;
                        $estado = $row->tblestado_est_id;
                        $tip_maq = $row->tbltipo_maquinaria_tip_maq_id;
                        $tip_est_description = $row->tip_est_descripcion;
                        $bodega = $row->tblbodega_bod_id;
                        $bodega_descripcion = $row->bod_descripcion;
                        $estado_Descripcion = $row->tip_est_descripcion;
                        $maq_costo = $row->maq_costo;
                        $maq_stock_min = $row->maq_stock_min;
                        $maq_stock_max = $row->maq_stock_max;
                        $maq_existencia = $row->maq_existencia;

                        $id_proveedor = $row->pro_id;
                        $descripcion_proveedor = $row->pro_razon_social;

                        $factura_descripcion = $row->maq_numero_factura;
                        $concepto_descripcion = $row->maq_concepto;
					?>
						<tr>
							<td><?php echo $id; ?></td>
							<td><?php echo $descripcion; ?></td>
							<td><?php echo $tipo_maquinaria; ?></td>
                            <td><?php echo $fecha_registro; ?></td>
                            <!-- <td><?php /* echo $fec_Creacion; */ ?></td> -->
							<td>
                            <a type="button" onclick="detailmaq(
                        ('<?php echo $id;?>'),
                        ('<?php echo $descripcion;?>'),
                        ('<?php echo $tipo_maquinaria?>'),
                        ('<?php echo $tip_est_description?>'),
                        ('<?php echo '$'.number_format($maq_costo);?>'),
                        ('<?php echo $maq_stock_min?>'),
                        ('<?php echo $maq_stock_max?>'),
                        ('<?php echo $maq_existencia?>'),
                        ('<?php echo $fecha_registro?>'),
                        ('<?php echo $bodega_descripcion?>'),
                        ('<?php echo $descripcion_proveedor?>'),
                        ('<?php echo $factura_descripcion?>'),
                        ('<?php echo $concepto_descripcion?>')
                        )" 
                        class="btn btn-primary text-white" title="DETALLE" data-toggle="modal" data-target="#modal_detalle_maquinaria"><i class="fas fa-eye"></i></a>
                <a type="button" onclick="update_Machinery(
                        ('<?php echo $id;?>'),
                        ('<?php echo $descripcion;?>'),
                        ('<?php echo $tip_maq?>'),
                        ('<?php echo $maq_costo;?>'),
                        ('<?php echo $maq_stock_min?>'),
                        ('<?php echo $maq_stock_max?>'),
                        ('<?php echo $maq_existencia?>'),
                        ('<?php echo $bodega?>'),
                        ('<?php echo $id_proveedor?>'),
                        ('<?php echo $factura_descripcion?>'),
                        ('<?php echo $concepto_descripcion?>')
                        )" class="btn btn-warning text-white" title="EDITAR" data-toggle="modal" data-target="#modal_editar_Machinery"><i class="fas fa-pencil-alt"></i></a> 

                <a type="button" onclick="deleteMachinerys(<?php echo $id?>)" class="btn btn-danger text-white" title="ELIMINAR" data-toggle="modal" data-target="#modal_eliminar_Machinery"><i class="fas fa-trash"></i></a>

                <a type="button" onclick="stock_maquinaria(
                    ('<?php echo $id;?>'),
                    ('<?php echo $maq_existencia?>'),
                    ('<?php echo $maq_stock_max?>'),
                    ('<?php echo $maq_stock_min?>'))" class="btn btn-success text-white" title="AÑADIR STOCK" data-toggle="modal" data-target="#añadir_maq"><i class="fas fa-plus-square"></i></a>
                </td>
						</tr>
					<?php } ?>
					</tbody>
                    <tfoot>
    </tfoot>
</table>
</div>
</div>
</div>
<a type="button" class="btn btn-info text-white añadyr" title="AÑADIR" data-toggle="modal" data-target="#modal_insertar_Machinery"><i class="fas fa-plus" ></i></a>
<!-- MODAL VER DETALLE MAQUINARIA -->
<div class="modal fade" id="modal_detalle_maquinaria" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="staticBackdropLabel">DETALLE MAQUINARIA</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body modal-body2">
                <!-- FORMULARIO -->
                <form class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">ID</label>
                        <input type="text" class="form-control id"  disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Descripción</label>
                        <input type="text" class="form-control docu" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Número de Factura</label>
                        <input type="text" class="form-control" name="detail_numero_factura" id="detail_numero_factura"  autocomplete="off" disabled>
					</div>
					<div class="col-md-6">
                        <label class="form-label">Concepto</label>
                        <input type="text" class="form-control" name="detail_concepto" id="detail_concepto"  autocomplete="off" disabled>
					</div>
                    <div class="col-md-6">
                        <label class="form-label">Tipo de Maquinaria</label>
                        <input type="text" class="form-control name" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Estado</label>
                        <input type="text" class="form-control name2" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Costo</label>
                        <input type="text" class="form-control ape" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Stock Mínimo</label>
                        <input type="text" class="form-control ape2" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Stock Máximo</label>
                        <input type="text" class="form-control ape3" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Stock en Existencia</label>
                        <input type="text" class="form-control existencia" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Fecha de Registro</label>
                        <input type="text" class="form-control fech" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Bodega</label>
                        <input type="text" class="form-control bodega" disabled>
                    </div>
                    
                    <div class="col-md-12">
                        <label class="form-label">Proveedor</label>
                        <input type="text" class="form-control proveedor" disabled>
                    </div>
                    
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary detalle_style" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- MODAL INSERTAR MAQUINARIA -->
<div class="modal fade" id="modal_insertar_Machinery" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header bg-info text-white">
        <h5 class="modal-title" id="staticBackdropLabel">AÑADIR MAQUINARIA</h5>
        </div>
        <div class="modal-body modal-body2">
        <form id="form_insert_Machinery">
                <div class="form-group row">
					<div class="col-md-12">
                        <label class="form-label">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" id="descripcion_aña_machy"  autocomplete="off" maxlength="50">
					</div>
					
				</div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label class="form-label">Número de Factura</label>
                        <input type="text" class="form-control" name="numero_factura_aña" id="numero_factura_aña"  autocomplete="off" maxlength="20">
					</div>
					<div class="col-md-6">
                        <label class="form-label">Concepto</label>
                        <input type="text" class="form-control" name="concepto_aña" id="concepto_aña"  autocomplete="off" maxlength="30">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-6">
                        <label class="form-label">Stock Mínimo</label>
                        <input type="number" min="1" pattern="^[0-9]+"  class="form-control" name="stock_min_ins_maq" id="stock_min_ins_maq"  autocomplete="off" >
					</div>
                    <div class="col-md-6">
                        <label class="form-label">Stock Máximo</label>
                        <input type="number" min="1" pattern="^[0-9]+"  class="form-control" name="stock_max_ins_maq" id="stock_max_ins_maq"  autocomplete="off">
					</div>
                    
				</div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label class="form-label">Existencia</label>
                        <input type="number" min="1" pattern="^[0-9]+"  class="form-control" name="Existencia_ins_maq" id="Existencia_ins_maq"  autocomplete="off">
					</div>
					<div class="col-md-6">
                        <label class="form-label">Costo</label>
                        <input type="number" min="1" pattern="^[0-9]+"  class="form-control" name="Costo_maq" id="Costo_maq"  autocomplete="off">
					</div>
				</div>
                
                <div class="form-group row">
                <div class="col-md-4">
                            <label for="rol" class="form-label">Bodega</label>
                                <select id="tip_bodega_inst" name="tip_bodega_inst" class="form-control" >
                                    <option value="" selected>Seleccione...</option>
                                    <?php 
                        foreach ($queryBodega as $bodega){
                            echo "<option value=".$bodega['bod_id'].">".$bodega['bod_descripcion']."</option>";
                        }
                ?> 
                        </select>
                    </div>
                    <div class="col-md-4">
                            <label for="rol" class="form-label">Proveedor</label>
                                <select id="tip_proveedor_inst" name="tip_proveedor_inst" class="form-control" >
                                    <option value="" selected>Seleccione...</option>
                                    <?php 
                        foreach ($querySupplier as $proveedor){
                            echo "<option value=".$proveedor['pro_id'].">".$proveedor['pro_razon_social']."</option>";
                        }
                ?> 
                        </select>
                    </div>
                <div class="col-md-4">
                            <label for="rol" class="form-label">Tipo de maquinaria</label>
                                <select id="tipo_maquinaria1" name="tipo_maquinaria1" class="form-control">
                                    <option value="" selected>Seleccione...</option>
                                    <?php 
                        foreach ($queryMaquinery as $tipo_maquinaria){
                            echo "<option value=".$tipo_maquinaria['tip_maq_id'].">".$tipo_maquinaria['tip_maq_descripcion']."</option>";
                        }
                ?> 
                        </select>
                    </div>
                    
                </div>
				</div>
            <div class="modal-footer button_flex">

        
        <button type="button" onclick="add_Machinery_ajax();"  class="btn btn-info text-white button_style_insert_2 cellar_insert" data-dismiss="modal">Añadir</button>
        <button type="button" onclick="m()" class="btn btn-danger button_style_insert_2" data-dismiss="modal">Cancelar</button>
        
        </div>
        </form>
        </div>
        
    </div>
    </div>
</div>

<!-- MODAL ELIMINAR MAQUINARIA -->

<div class="modal fade" id="modal_eliminar_Machinery" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header bg-danger  text-white">
        <h5 class="modal-title" id="staticBackdropLabel">ELIMINAR MAQUINARIA</h5>
        </div>
        <div class="modal-body modal-body2 modal-body2">
        
            <form id="eliminar_Machinery">
            
            <div class="alert alert-danger" role="alert">
                <p class="font-weight-bold">¿Está seguro de que desea eliminar esta maquinaria?</p>
                <p class="font-italic">Esta acción no se puede deshacer.</p>
            <input type="text" hidden  name="id_elim_machinery"  id="id_elim_machinery" >
            </div>
        </div> 
        <div class="modal-footer button_flex">
        <button type="button" onclick="deleteMachinerysAjax()"  class="btn btn-danger text-white button_style_2" data-dismiss="modal" >Eliminar</button>
        <button type="button" onclick="m()" class="btn btn-secondary button_style_2" data-dismiss="modal">Cancelar</button>
        </div>
            </form>
    </div>
    </div>
</div>

<!-- MODAL EDITAR MAQUINARIA -->

<div class="modal fade" id="modal_editar_Machinery" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header bg-warning text-white">
        <h5 class="modal-title text-white" id="staticBackdropLabel">ACTUALIZAR MAQUINARIA</h5>
        </div>
        <div class="modal-body modal-body2">

        <form id="form_edit_Machinery">
                <div class="form-group row">
                    <div class="col-md-4">
                        <label class="form-label">ID</label>
                        <input type="number" class="form-control id" id="id_edit_maq" readonly  name="id"  autocomplete="off">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Descripción</label>
                        <input type="text" class="form-control Descripcion" name="Descripcion" autocomplete="off" id="id_edit_description" maxlength="60">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Número de Factura</label>
                        <input type="text" class="form-control" name="numero_factura_edit" id="numero_factura_edit"  autocomplete="off" maxlength="15">
					</div>
                </div>
                <div class="form-group row">
					<div class="col-md-4">
                        <label class="form-label">Concepto</label>
                        <input type="text" class="form-control" name="concepto_edit" id="concepto_edit"  autocomplete="off" maxlength="60">
					</div>
                    <div class="col-md-4">
                        <label class="form-label">Stock Mínimo</label>
                        <input type="number" min="1" pattern="^[0-9]+"  class="form-control" name="stock_min_edit_maq" id="stock_min_edit_maq"  autocomplete="off" >
					</div>
                    <div class="col-md-4">
                        <label class="form-label">Stock Máximo</label>
                        <input type="number" min="1" pattern="^[0-9]+"  class="form-control" name="stock_max_edit_maq" id="stock_max_edit_maq"  autocomplete="off" >
					</div>
				</div>
                <div class="form-group row">
					<div class="col-md-4">
                        <label class="form-label">Costo</label>
                        <input type="number" min="1" pattern="^[0-9]+"  class="form-control" name="Costo_edit_maq" id="Costo_edit_maq"  autocomplete="off" >
					</div>
                    <div class="col-md-4">
                        <label class="form-label">Stock en Existencia</label>
                        <input type="number"  class="form-control" name="Existencia_edit_maq" id="Existencia_edit_maq"  autocomplete="off" readonly >
					</div>
                    <div class="col-md-4">
                            <label for="tipo_maquinaria" class="form-label">Tipo de Maquinaria</label>
                                <select id="tipo_maquinaria" name="tipo_maquinaria" class="form-control select_cerrar">
                                    <?php 
                        foreach ($queryMaquinery as $tipo_maquinaria){
                            echo "<option value=".$tipo_maquinaria['tip_maq_id'].">".$tipo_maquinaria['tip_maq_descripcion']."</option>";
                        }
                ?> 
                        </select>
                    </div>
                    
				</div>
                    <div class="form-group row">
                    <div class="col-md-6">
                            <label for="rol" class="form-label">Bodega</label>
                                <select id="tip_bodega_insss" name="tip_bodega_insss" class="form-control select_cerrar">
                                    
                                    <?php 
                        foreach ($queryBodega as $bodega){
                            echo "<option value=".$bodega['bod_id'].">".$bodega['bod_descripcion']."</option>";
                        }
                ?> 
                        </select>
                    </div>
                    <div class="col-md-6">
                            <label for="rol" class="form-label">Proveedor</label>
                                <select id="tip_proveedor_edit" name="tip_proveedor_edit" class="form-control select_cerrar">
                                    <?php 
                        foreach ($querySupplier as $proveedor){
                            echo "<option value=".$proveedor['pro_id'].">".$proveedor['pro_razon_social']."</option>";
                        }
                ?> 
                        </select>
                    </div>
				</div>
                
                    
	

            <div class="modal-footer button_flex">
            <button type="button" onclick="updateMachinerysAjax()"  class="btn btn-warning text-white button_style_2 cellar_insert" data-dismiss="modal" >Actualizar</button>
            <button type="button" class="btn btn-danger button_style_2 " data-dismiss="modal" onclick="CancelarSelect()">Cancelar</button>
        </div>  
        </div>
        </form>
        </div>
    </div>
    </div>
</div>
<div class="modal fade" id="añadir_maq" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title " id="staticBackdropLabel">AÑADIR STOCK</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body modal-body2">
                <!-- FORMULARIO -->
                <form id="formulario_aña_maquinary" class="row g-12">
                <input  type="text" class="form-control id" name="id_registro" hidden id="mrd">
                    <div class="col-md-12">
                        <label hidden class="form-label">Stock Minimo</label>
                        <input hidden type="text" readonly class="form-control stock_min_m" id="stock_min_m">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Stock Existente</label>
                        <input type="text" readonly class="form-control stock" id="zz">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Stock Máximo</label>
                        <input type="text" readonly class="form-control stock_max" id="ww">
                    </div>
                    
                    <div class="col-md-6">
                        <label class="form-label">Número de Factura</label>
                        <input type="text"   maxlength="255" class="form-control " name="num_fac_añadir" id="num_fac_añadir">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Concepto</label>
                        <input type="text" maxlength="100" class="form-control " name="concepto_añadir" id="concepto_añadir">
                    </div>
                    <div class="col-md-6">
                            <label for="rol" class="form-label">Proveedor</label>
                                <select id="tip_proveedor_añañay" name="tip_proveedor_añañay" class="form-control" >
                                    <option value="" selected>Seleccione...</option>
                                    <?php 
                        foreach ($querySupplier as $proveedor){
                            echo "<option value=".$proveedor['pro_id'].">".$proveedor['pro_razon_social']."</option>";
                        }
                ?> 
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Agregar al Stock</label>
                        <input type="number" min="1" pattern="^[0-9]+" placeholder="Añadir Cantidad" class="form-control" name="agg_stock" id="aa">
                    </div>
                </form>
            </div>
            <div class="modal-footer button_flex">
            <button type="button" onclick="añadirMaquinariaStock()"  class="btn btn-success text-white button_style_2 cellar_insert" data-dismiss="modal">Añadir</button>
            <button type="button" class="btn btn-danger button_style_2" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<!-- THEND STYLE -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


