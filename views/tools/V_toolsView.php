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
                <li class="breadcrumb-item active">Herramienta</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
<div class="style_general">
<div class="style">
<h4><strong>CONSULTAR HERRAMIENTA</strong></h4>
<div id="load_tools">
<table class="table table-striped table-bordered table-hover"  id="ConsulProv" style="text-align:center important;">
					<thead class="text-center">
						<tr id="statico_Tool">
							<th>ID</th>
							<th>Descripción</th>
                            <th>Tipo de herramienta</th>
                            <th>Fecha de Registro</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
					<?php
                        while ($row = mysqli_fetch_object($query)){
                        $id = $row->her_id;
                        $descripcion = $row->her_descripcion;
                        $factura = $row->her_numero_factura;
                        $concepto = $row->her_concepto;
                        $fecha_registro = $row->her_fecha_registro;
                        $tipo_herramienta = $row->tip_her_descripcion;
                        $cod_herramienta = $row->tbltipo_herramienta_tip_her_id;
                        $cod_estado = $row->tblestado_est_id;
                        $tip_est_description = $row->tip_est_descripcion;
                        $estado_descripcion = $row->tip_est_descripcion;
                        $her_costo = $row->her_costo;
                        $her_stock_min = $row->her_stock_min;
                        $her_stock_max = $row->her_stock_max;
                        $her_existencia = $row->her_existencia;
                        $bodega = $row->tblbodega_bod_id;
                        $bodega_descripcion = $row->bod_descripcion;

                        $descripcion_proveedor = $row->pro_razon_social;
                        $id_prov=$row->pro_id;
                        
					?>
						<tr>
							<td><?php echo $id; ?></td>
							<td><?php echo $descripcion; ?></td>
							<td><?php echo $tipo_herramienta; ?></td>
                            <td><?php echo $fecha_registro; ?></td>
                            <td>
                        <a type="button" onclick="detailtools(
                        ('<?php echo $id;?>'),
                        ('<?php echo $descripcion;?>'),
                        ('<?php echo $factura;?>'),
                        ('<?php echo $concepto;?>'),
                        ('<?php echo $tipo_herramienta?>'),
                        ('<?php echo $tip_est_description?>'),
                        ('<?php echo '$'.number_format($her_costo)?>'),
                        ('<?php echo $her_stock_min?>'),
                        ('<?php echo $her_stock_max?>'),
                        ('<?php echo $her_existencia?>'),
                        ('<?php echo $fecha_registro?>'),
                        ('<?php echo $bodega_descripcion?>'),
                        ('<?php echo $descripcion_proveedor?>')
                        )" 
                        class="btn btn-primary text-white" title="DETALLE" data-toggle="modal" data-target="#modal_detalle_tools"><i class="fas fa-eye"></i></a>

                        <a type="button" onclick="update_Tools(
                        ('<?php echo $id?>'),
                        ('<?php echo $descripcion?>'),
                        ('<?php echo $factura;?>'),
                        ('<?php echo $concepto;?>'),
                        ('<?php echo $tipo_herramienta?>'),
                        ('<?php echo $cod_herramienta?>'),
                        ('<?php echo $her_costo?>'),
                        ('<?php echo $her_stock_min?>'),
                        ('<?php echo $her_stock_max?>'),
                        ('<?php echo $her_existencia?>'),
                        ('<?php echo $bodega?>'),
                        ('<?php echo $id_prov?>')
                        )" class="btn btn-warning text-white" title="EDITAR" data-toggle="modal" data-target="#modal_editar_Tool"><i class="fas fa-pencil-alt"></i></a> 

                <a type="button" onclick="deleteTools(<?php echo $id?>)" class="btn btn-danger text-white" title="ELIMINAR" data-toggle="modal" data-target="#modal_eliminar_Tool"><i class="fas fa-trash"></i></a>
                
                <a type="button" onclick="stock_herramienta(('<?php echo $id;?>'),
                        ('<?php echo $her_existencia?>'),
                        ('<?php echo $her_stock_max?>'),
                        ('<?php echo $her_stock_min?>'))" class="btn btn-success text-white" title="AÑADIR STOCK" data-toggle="modal" data-target="#añadir_her"><i class="fas fa-plus-square"></i></a>
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
<a type="button" class="btn btn-info text-white añadyr" title="AÑADIR" data-toggle="modal" data-target="#modal_insertar_Tool"><i class="fas fa-plus" ></i></a>
<!-- MODAL VER DETALLE HERRAMIENTA -->
<div class="modal fade" id="modal_detalle_tools" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title text-white" id="staticBackdropLabel">DETALLE HERRAMIENTA</h5>
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
                        <label class="form-label">Número Factura</label>
                        <input type="text" class="form-control factu" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Concepto</label>
                        <input type="text" class="form-control concet" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tipo de Herramienta</label>
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
<!-- MODAL INSERTAR HERRAMIENTA -->
<div class="modal fade" id="modal_insertar_Tool" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header bg-info text-white">
        <h5 class="modal-title text-white" id="staticBackdropLabel">AÑADIR HERRAMIENTA</h5>
        </div>
        <div class="modal-body modal-body2">
        <form id="form_insert_tools">
                <div class="form-group row">
					<div class="col-md-12">
                        <label class="form-label">Descripción</label>
                        <input type="text" class="form-control" name="Descripcion_edit" id="Descripcion_edit"  autocomplete="off" maxlength="70">
                    </div>
				</div>
                <div class="form-group row">
					<div class="col-md-6">
                        <label class="form-label">Número de Factura</label>
                        <input type="text" class="form-control" name="num_fac_ins_her" id="num_fac_ins_her"  autocomplete="off" maxlength="20">
					</div>
                    <div class="col-md-6">
                        <label class="form-label">Concepto</label>
                        <input type="text" class="form-control" name="conceptp_ins_her" id="conceptp_ins_her"  autocomplete="off" maxlength="60">
					</div>
				</div>
				<div class="form-group row">
                    <div class="col-md-6">
                        <label class="form-label">Costo</label>
                        <input type="number" min="1" pattern="^[0-9]+" class="form-control" name="Costo_her" id="Costo_her"  autocomplete="off">
					</div>
					<div class="col-md-6">
                        <label class="form-label">Stock Mínimo</label>
                        <input type="number" min="1" pattern="^[0-9]+" class="form-control" name="stock_min_ins_her" id="stock_min_ins_her"  autocomplete="off">
					</div>
				</div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label class="form-label">Stock Máximo</label>
                        <input type="number" min="1" pattern="^[0-9]+" class="form-control" name="stock_max_ins_her" id="stock_max_ins_her"  autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Existencia</label>
                        <input type="number" min="1" pattern="^[0-9]+" class="form-control" name="Existencia_ins_her" id="Existencia_ins_her"  autocomplete="off">
                    </div>
				</div>
                <div class="form-group row">
                <div class="col-md-4">
                            <label for="rol" class="form-label">Tipo de Herramienta</label>
                                <select id="tip_herramienta_edit" name="tip_herramienta_edit" class="form-control" >
                                    <option value="" selected>Seleccione...</option>
                                    <?php 
                        foreach ($queryHerramienta as $tipo_herramienta){
                            echo "<option value=".$tipo_herramienta['tip_her_id'].">".$tipo_herramienta['tip_her_descripcion']."</option>";
                        }
                ?> 
                        </select>
                    </div>
                <div class="col-md-4">
                            <label for="rol" class="form-label">Bodega</label>
                                <select id="tip_bodega_edit" name="tip_bodega_edit" class="form-control" >
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
                                <select id="tip_proveedor_inst_tools" name="tip_proveedor_inst_tools" class="form-control" >
                                    <option value="" selected>Seleccione...</option>
                                    <?php 
                        foreach ($querySupplier as $proveedor){
                            echo "<option value=".$proveedor['pro_id'].">".$proveedor['pro_razon_social']."</option>";
                        }
                ?> 
                        </select>
                    </div>
                    </div>
            <div class="modal-footer button_flex">

                    <button type="button" onclick="add_tools_ajax();"  class="btn btn-info text-white button_style_insert_2 cellar_insert" data-dismiss="modal" >Añadir</button>
                    <button type="button"  class="btn btn-danger button_style_insert_2"  data-dismiss="modal">Cancelar</button>
                    
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- MODAL ELIMINAR SUPPLIER -->

<div class="modal fade" id="modal_eliminar_Tool" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header bg-danger  text-white">
        <h5 class="modal-title" id="staticBackdropLabel">ELIMINAR HERRAMIENTA</h5>
        </div>
        <div class="modal-body modal-body2">
        
            <form id="eliminar_Tool">
            
            <div class="alert alert-danger" role="alert">
                <p class="font-weight-bold">¿Está seguro de que desea eliminar esta herramienta?</p>
                <p class="font-italic">Esta acción no se puede deshacer.</p>
            <input type="text" hidden  name="id_elim_tool"  id="id_eliminar_tool" >
            </div>
        </div> 
        <div class="modal-footer button_flex">
        <button type="button" onclick="deleteToolsAjax()"  class="btn btn-danger text-white button_style_2" data-dismiss="modal" >Eliminar</button>
            <button type="button" class="btn btn-secondary button_style_2" data-dismiss="modal">Cancelar</button>
        </div>
            </form>
    </div>
    </div>
</div>

<!-- MODAL EDITAR Tool -->

<div class="modal fade" id="modal_editar_Tool" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header bg-warning text-white">
        <h5 class="modal-title text-white" id="staticBackdropLabel">ACTUALIZAR HERRAMIENTA</h5>
        </div>
        <div class="modal-body modal-body2">

        <form id="form_edit_tools">
                <div class="form-group row">
                    <div class="col-md-4">
                            <label class="form-label">ID</label>
                            <input type="number" class="form-control id" readonly  name="id_edit_machinery" id="id_edit_tools" autocomplete="off" >
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Descripción</label>
                        <input type="text" class="form-control descripcion" name="Descripcion" autocomplete="off" id="Descripcion_edit_tools" maxlength="70">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Número de Factura</label>
                        <input type="text" class="form-control " name="fact_edit_her" id="fact_edit_her"  autocomplete="off" maxlength="20">
					</div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label class="form-label">Concepto</label>
                        <input type="text" class="form-control" name="concepto_edit_her" id="concepto_edit_her"  autocomplete="off" maxlength="60">
					</div>
                    <div class="col-md-4">
                        <label class="form-label">Stock Mínimo</label>
                        <input type="number" min="1" pattern="^[0-9]+" class="form-control" name="stock_min_edit_her" id="stock_min_edit_her"  autocomplete="off">
					</div>
                    <div class="col-md-4">
                        <label class="form-label">Stock Máximo</label>
                        <input type="number" min="1" pattern="^[0-9]+" class="form-control" name="stock_max_edit_her" id="stock_max_edit_her"  autocomplete="off">
					</div>
				</div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label class="form-label">Costo</label>
                        <input type="number" min="1" pattern="^[0-9]+" class="form-control" name="Costo_edit_her" id="Costo_edit_her"  autocomplete="off">
					</div>
                    <div class="col-md-4">
                        <label class="form-label">Stock en Existencia</label>
                        <input type="number" min="1" pattern="^[0-9]+" class="form-control" name="Existencia_edit_her" id="Existencia_edit_her"  autocomplete="off" readonly>
					</div>
                    <div class="col-md-4">
                        <label class="form-label">Tipo de herramienta</label>
                        <select  name="tip_herramienta" id="tip_herramienta" class="form-control select_cerrar">
                            <?php
                                foreach ($queryHerramienta as $key => $rolsito){
                            ?>
                                <option value="<?php echo $rolsito['tip_her_id'] ?>"><?php echo $rolsito['tip_her_descripcion'] ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
				</div>
    <div class="form-group row">
    <div class="col-md-6">
                            <label for="rol" class="form-label">Bodega</label>
                                <select id="tip_bodega_ins" name="tip_bodega_ins" class="form-control select_cerrar" >
                                    
                                    <?php 
                        foreach ($queryBodega as $bodega){
                            echo "<option value=".$bodega['bod_id'].">".$bodega['bod_descripcion']."</option>";
                        }
                ?> 
                        </select>
                    </div>
                    <div class="col-md-6">
                            <label for="rol" class="form-label">Proveedor</label>
                                <select id="tip_proveedor_edit_tools" name="tip_proveedor_edit_tools" class="form-control select_cerrar">
                                    <?php 
                        foreach ($querySupplier as $proveedor){
                            echo "<option value=".$proveedor['pro_id'].">".$proveedor['pro_razon_social']."</option>";
                        }
                ?> 
                        </select>
                    </div>
	</div>
        <div class="modal-footer button_flex">
            <button type="button" onclick="update_Tools_ajax()"  class="btn btn-warning text-white button_style_2 cellar_insert" data-dismiss="modal">Actualizar</button>
            <button type="button" class="btn btn-danger button_style_2" data-dismiss="modal" onclick="CancelarSelect()">Cancelar</button>
        </div>  
    </div>
        </form>
    </div>
    </div>
    </div>
</div>
<div class="modal fade" id="añadir_her" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                <form id="formulario_aña_herramienta" class="row g-12">
                <input  type="text" class="form-control id" name="id_stock" hidden id="mrd">
                    <div class="col-md-12">
                        <label hidden class="form-label">Stock Mínimo</label>
                        <input hidden type="text" readonly class="form-control stock_min" id="stock_min">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Stock Actual</label>
                        <input type="text" readonly class="form-control stock" id="actualstock">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Stock Máximo</label>
                        <input type="text" readonly class="form-control stock2" id="maxstock">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Número De Factura</label>
                        <input type="text"  class="form-control " name="num_fac_añadir" id="num_fac_añadir">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Concepto</label>
                        <input type="text"  class="form-control " name="concepto_añadir" id="concepto_añadir">
                    </div>
                    <div class="col-md-6">
                            <label for="rol" class="form-label">Proveedor</label>
                                <select id="tip_proveedor_inst_tools2" name="tip_proveedor_inst_tools2" class="form-control">
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
                        <input type="number" min="1" pattern="^[0-9]+" placeholder="Añadir al Stock" class="form-control" name="agg_stock" id="aa">
                    </div>
                </form>
            </div>
            <div class="modal-footer button_flex">
            <button type="button" onclick="añadirHerramientaStock()"  class="btn btn-success text-white button_style_2 cellar_insert" data-dismiss="modal">Añadir</button>
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


