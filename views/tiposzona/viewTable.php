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
                <li class="breadcrumb-item active">Tipos de Zona</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
<div class="style_general">
    <div class="style">
<h4>TIPOS DE ZONAS</h4>
<div id="Table_Zona">
<table  class="table table-striped table-bordered table-hover">
    <thead>
        <th>ID</th>
        <th>Tipo de Zona</th>
        <th>Opciones</th>
    </thead>
    <tbody>
    <?php while($rows = mysqli_fetch_array($list)){ ?>
    <tr>
        <td><?php echo  $rows['tip_zon_id']; ?></td> 
        <td><?php echo $rows['tip_zon_descripcion'];?></td>
        <td><a onclick="SetData_TipZon(<?php echo  $rows['tip_zon_id']; ?>,'<?php echo $rows['tip_zon_descripcion'];?>')" data-toggle="modal" data-target="#modal_actualizar_zona" type="button" class="btn btn-warning text-white" title="EDITAR" ><i class="fas fa-pencil-alt"></i></a>
        <a onclick="SetData_TipZon(<?php echo  $rows['tip_zon_id']; ?>,null)" data-toggle="modal" data-target="#modal_eliminar_zona" type="button" class="btn btn-danger text-white" title="ELIMINAR"><i class="fas fa-trash"></i></a></td>
    </tr>
    <?php } ?>
    </tbody>
    <tfoot>
    </tfoot>
</table>
</div>
</div>
</div>
<a data-toggle="modal" data-target="#modal_insertar_zona" type="button" class="btn btn-info text-white añadyr" title="AÑADIR"><i class="fas fa-plus"></i></a>
<!-- THEND STYLE -->
</div>
<!-- /.content -->
    </div>
<!-- /.content-wrapper -->