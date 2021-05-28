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
                <li class="breadcrumb-item active">Bodegas</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
<div class="style_general">
<div class="style">
<h4><strong>CONSULTAR BODEGAS</strong></h4>
<div id="logcellar">
    <table  class="table table-striped table-bordered table-hover">
        
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Bodega</th>
                <th>Dirección</th>
                <th>Zona</th>
                <th>Fecha de Registro</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                for ($i = 0; $i < count($result); $i++){
            ?>
                <tr>
                    <td><?php echo $result[$i][0]; ?></td>
                    <td><?php echo $result[$i][1]; ?></td>
                    <td><?php echo $result[$i][2]; ?></td>
                    <td><?php echo $result[$i][7]; ?></td>
                    <td><?php echo $result[$i][3]; ?></td>
                    <td> 
                        <a type="button" onclick="update_cellars(('<?php echo $result[$i][0];?>'),
                        ('<?php echo $result[$i][1];?>'),
                        ('<?php echo $result[$i][2];?>'),
                        ('<?php echo $result[$i][4];?>')
                        )" class="btn btn-warning text-white" title="EDITAR" data-toggle="modal" data-target="#modal_actualizar_bodega"><i class="fas fa-pencil-alt"></i></a>
                        <a type="button" onclick="delete_cellars(<?php echo $result[$i][0];?>)" class="btn btn-danger text-white" title="ELIMINAR" data-toggle="modal" data-target="#modal_eliminar_bodega"><i class="fas fa-trash"></i></a>
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
</div>
<a type="button" class="btn btn-info text-white añadyr" title="AÑADIR" data-toggle="modal" data-target="#modal_insertar_bodega"><i class="fas fa-plus"></i></a>
<!-- MODALES -->
<!-- MODAL INSERTAR BODEGA -->
<div class="modal fade" id="modal_insertar_bodega" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="staticBackdropLabel" draggable="true">AÑADIR BODEGA</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <form class="row g-3" id="form_insertar_bodega">
                    <div class="col-md-6">
                        <input type="number" class="form-control" name="id_insert" id="id" hidden>
                    </div>
                    <div class="col-md-12">
                        <label draggable="true" for="inputPassword4" class="form-label">Nombre Bodega</label>
                        <input type="text" class="form-control" name="nom_insert" id="cellardesc" autocomplete="off" onpaste="return false" maxlength="50">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" for="inputPassword4" class="form-label">Dirección</label>
                        <input type="text" class="form-control" name="dir_insert" id="cellardire" autocomplete="off" onpaste="return false" maxlength="40">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" for="inputPassword4" class="form-label">Zona</label>
                        <select name="zon_insert" id="cellarzon" class="form-control">
                            <option value="" draggable="true" selected>Seleccione...</option>
                            <?php
                                foreach($selector as $tipo_zona){
                                    echo "<option value=".$tipo_zona["tip_zon_id"].">".$tipo_zona["tip_zon_descripcion"]."</option>";
                                }
                            ?>
                        </select>
                    </div>
            </div>
                <div class="modal-footer button_flex">
                    <button type="button" class="btn btn-info text-white button_style_insert_2 cerrar_modal_2" onclick="insert_cellar()">Añadir</button>
                    <button type="button" class="btn btn-danger button_style_insert_2" data-dismiss="modal">Cancelar</button>
                </div>
                </form>
        </div>
    </div>
</div>
<!-- MODAL ACTUALIZAR BODEGA -->
<div class="modal fade" id="modal_actualizar_bodega" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title text-white" id="staticBackdropLabel" draggable="true">ACTUALIZAR BODEGA</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <!-- FORM -->
                <div class="modal-body">
                <form class="row g-3" id="form_actualizar_bodega">
                    <div class="col-md-6">
                        <label draggable="true" for="inputPassword4" class="form-label">ID</label>
                        <input type="text" class="form-control id" name="id_update" readonly>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" for="inputPassword4" class="form-label">Nombre Bodega</label>
                        <input type="text" class="form-control cellardesc2" name="desc_update" id="cellardesc2" autocomplete="off" maxlength="20" onpaste="return false" maxlength="30">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" for="inputPassword4" class="form-label">Dirección</label>
                        <input type="text" class="form-control cellardire2" name="dire_update" id="cellardire2" maxlength="30" autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" for="inputPassword4" class="form-label">Zona</label>
                        <select name="zon_update" id="cellarzon2" class="form-control select_cerrar">
                            <?php
                                foreach($selector as $tipo_zona){
                                    echo "<option value=".$tipo_zona["tip_zon_id"].">".$tipo_zona["tip_zon_descripcion"]."</option>";
                                }
                            ?>
                        </select>
                    </div>
                </form>
            </div>
            </div>
            <div class="modal-footer button_flex">
                <button type="button" class="btn btn-warning text-white button_style_2 cerrar_modal_2" onclick="update_cellar()"  data-dismiss="modal">Actualizar</button>
                <button type="button" class="btn btn-danger button_style_2" data-dismiss="modal" onclick="CancelarSelect()">Cancelar</button>
            </div>
                
        </div>
    </div>
</div> 
<!-- MODAL ELIMINAR BODEGA -->
<div class="modal fade" id="modal_eliminar_bodega" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-danger  text-white">
                <h5 class="modal-title" id="staticBackdropLabel" draggable="true">ELIMINAR BODEGA</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <form id="form_eliminar_bodega"> 
                    <div class="alert alert-danger" role="alert">
                        <p class="font-weight-bold">¿Está seguro de que desea eliminar esta bodega?</p>
                        <p class="font-italic">Esta acción no se puede deshacer.</p>
                        <input type="text" name="id_deletebodega" class="id" hidden>
                    </div>
                </form>
            </div>
            <div class="modal-footer button_flex">
                <button type="button" class="btn btn-danger button_style_2" onclick="delete_cellar()" data-dismiss="modal">Eliminar</button>
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