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
                <li class="breadcrumb-item active">Proveedores</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
<div class="style_general">
<div class="style">
<h4><strong>CONSULTAR PROVEEDORES</strong></h4>
<div id="load_suplier">
<table class="table table-striped table-bordered table-hover"  id="ConsulProv" style="text-align:center important;">
					<thead class="text-center">
						<tr id="statico_proveedor">
							<th>NIT</th>
							<th>Razón social</th>
							<th>Dirección</th>
                            <th>Correo</th>
							<th>Teléfono</th>
                            <!-- <th>Fecha de Registro</th> -->
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
					<?php
                        while ($row = mysqli_fetch_object($query)){
                        $id = $row->pro_id;
                        $nit = $row->pro_nit;
                        $razon_social = $row->pro_razon_social;
                        $direccion = $row->pro_direccion;
                        $correo = $row->pro_correo;
                        $telefono = $row->pro_telefono;
                        $fec_Creacion= $row->pro_fecha_registro;
                        $estado= $row->est_gen_nombre;
					?>
						<tr>
							<td><?php echo $nit; ?></td>
							<td><?php echo $razon_social; ?></td>
							<td><?php echo $direccion; ?></td>
							<td><?php echo $correo; ?></td>
                            <td><?php echo $telefono; ?></td>
                            <!-- <td><?php /* echo $fec_Creacion; */ ?></td> -->
							<td>

                <a type="button" onclick="update_supplier(
                        ('<?php echo $id?>'),
                        ('<?php echo $nit;?>'),
                        ('<?php echo $razon_social;?>'),
                        ('<?php echo $direccion;?>'),
                        ('<?php echo $correo;?>'),
                        ('<?php echo $telefono;?>'))" class="btn btn-warning text-white" title="EDITAR" data-toggle="modal" data-target="#modal_editar_proveedor"><i class="fas fa-pencil-alt"></i></a> 

                <a type="button" onclick="deleteSuppliers(<?php echo $id?>)" class="btn btn-danger text-white" title="ELIMINAR" data-toggle="modal" data-target="#modal_eliminar_proveedor"><i class="fas fa-trash"></i></a>

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
<a type="button" class="btn btn-info text-white añadyr" title="AÑADIR" data-toggle="modal" data-target="#modal_insertar_proveedor"><i class="fas fa-plus" ></i></a>
<!-- MODAL INSERTAR TERCERO -->
<div class="modal fade" id="modal_insertar_proveedor" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header bg-info text-white">
        <h5 class="modal-title" id="staticBackdropLabel">AÑADIR PROVEEDOR</h5>
        </div>
        <div class="modal-body">
        <form id="form_insert_supplier">
                <div class="form-group row">
					<div class="col-md-6">
                        <label class="form-label">NIT</label>
                        <input type="text" class="form-control" name="nit" id="nit"  autocomplete="off" maxlength="10">
					</div>
					<div class="col-md-6">
						<label class="form-label">Razón Social</label>
						<input type="text" class="form-control" name="razon_social" id="razon_social" autocomplete="off" maxlength="50">
					</div>
				</div>
                <div class="form-group row">
                    <div class="col-md-6">
						<label class="form-label">Correo</label>
						<input type="email" class="form-control" name="correo" id="correo"  autocomplete="off" maxlength="30">
					</div>
                    <div class="col-md-6">
						<label class="form-label"> Dirección</label>
						<input type="text" class="form-control" name="direccion" id="direccion" autocomplete="off" maxlength="40">
					</div>
                </div>
				<div class="form-group row">
					<div class="col-md-12">
						<label class="form-label">Teléfono</label>
						<input type="number" class="form-control" name="telefono" id="telefono" autocomplete="off" min="1" pattern="^[0-9]+">
					</div>
				</div>	
				</div>
            <div class="modal-footer button_flex">

        <button type="reset" class="btn btn-secondary text-white button_style_insert">Remover</button>
        <button type="button" onclick="add_supplier_ajax();"  class="btn btn-info text-white button_style_insert cellar_insert" data-dismiss="modal" >Añadir</button>
        <button type="button" class="btn btn-danger button_style_insert" data-dismiss="modal">Cancelar</button>
        
        </div>
        </form>
        </div>
        
    </div>
    </div>
</div>

<!-- MODAL ELIMINAR SUPPLIER -->

<div class="modal fade" id="modal_eliminar_proveedor" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header bg-danger  text-white">
        <h5 class="modal-title" id="staticBackdropLabel">ELIMINAR PROVEEDOR</h5>
        </div>
        <div class="modal-body">
        
            <form id="eliminar_proveedor">
            
            <div class="alert alert-danger" role="alert">
                <p class="font-weight-bold">¿Está seguro de que desea eliminar este proveedor?</p>
                <p class="font-italic">Esta acción no se puede deshacer.</p>
            <input type="text" hidden name="id_elim_prov" class="id" id="id_eliminar_supplier" >
            </div>
        </div> 
        <div class="modal-footer button_flex">
        <button type="button" onclick="deleteSuppliersAjax()"  class="btn btn-danger text-white button_style_2" data-dismiss="modal" >Eliminar</button>
            <button type="button" class="btn btn-secondary button_style_2" data-dismiss="modal">Cancelar</button>
        </div>
            </form>
    </div>
    </div>
</div>

<!-- MODAL EDITAR PROVEEDOR -->

<div class="modal fade" id="modal_editar_proveedor" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header bg-warning text-white">
        <h5 class="modal-title text-white" id="staticBackdropLabel">ACTUALIZAR PROVEEDOR</h5>
        </div>
        <div class="modal-body">

        <form id="form_edit_prov">
                <div class="form-group row">
                    <div class="col-md-6">
                            <label class="form-label">ID</label>
                            <input type="number" class="form-control id_edit_prov" readonly  name="id_edit_prov" autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">NIT</label>
                        <input type="text" class="form-control nit" name="nit" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
					<div class="col-md-6">
						<label class="form-label">Razón Social</label>
						<input type="text" class="form-control razon_social" name="razon_social" autocomplete="off">
					</div>
					<div class="col-md-6">
						<label class="form-label">Correo</label>
						<input type="email" class="form-control correo" name="correo"  autocomplete="off">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-6">
						<label class="form-label"> Dirección</label>
						<input type="text" class="form-control direccion" name="direccion" autocomplete="off" >
					</div>
					<div class="col-md-6">
						<label class="form-label">Teléfono</label>
						<input type="number" id="telefono_proveedor" class="form-control telefono" name="telefono" autocomplete="off" min="1" pattern="^[0-9]+">
					</div>
				</div>	
            <div class="modal-footer button_flex">
            <button type="button" onclick="update_supplier_ajax()"  class="btn btn-warning text-white button_style_2 cellar_insert" data-dismiss="modal" >Actualizar</button>
        <button type="button" class="btn btn-danger button_style_2" data-dismiss="modal">Cancelar</button>
        </div>  
        </div>
        </form>
        </div>
    </div>
    </div>
</div>
<!-- THEND STYLE -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

