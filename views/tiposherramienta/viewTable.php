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
                <li class="breadcrumb-item active">Tipos de Herramienta</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
<div class="style_general">
    <div class="style">
<h4>TIPOS DE HERRAMIENTAS</h4>
<div id="Table_Herramienta">
<table  class="table table-striped table-bordered table-hover">
    <thead>
        <th>ID</th>
        <th>Tipo de Herramienta</th>
        <th>Opciones</th>
    </thead>
    <tbody>
    <?php while($rows = mysqli_fetch_array($list)){ ?>
    <tr>
        <td><?php echo  $rows['tip_her_id']; ?></td> 
        <td><?php echo $rows['tip_her_descripcion'];?></td>
        <td><a onclick="SetData_TipHer(<?php echo  $rows['tip_her_id']; ?>,'<?php echo $rows['tip_her_descripcion'];?>')" data-toggle="modal" data-target="#modal_actualizar_herramienta" type="button" class="btn btn-warning text-white" title="EDITAR" ><i class="fas fa-pencil-alt"></i></a>
        <a onclick="SetData_TipHer(<?php echo  $rows['tip_her_id']; ?>,null)" data-toggle="modal" data-target="#modal_eliminar_herramienta" type="button" class="btn btn-danger text-white" title="ELIMINAR"><i class="fas fa-trash"></i></a></td>
    </tr>
    <?php } ?>
    </tbody>
    <tfoot>
    </tfoot>
</table>
</div>
</div>
</div>
<a data-toggle="modal" data-target="#modal_insertar_herramienta" type="button" class="btn btn-info text-white añadyr" title="AÑADIR"><i class="fas fa-plus"></i></a>
<!-- THEND STYLE -->
</div>
<!-- /.content -->
    </div>
<!-- /.content-wrapper -->