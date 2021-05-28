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
                <li class="breadcrumb-item active">Consultar Caso</li>
            </ol>
            </div><!-- /.col -->
            
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
<div class="style">
<h4><strong>CONSULTAR CASO</strong></h4>
<div class="style_order2">
<div id="logCaso">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
            
                <th>Número del Caso</th>
                <th>Dirección</th>
                <th>Prioridad</th>
                <th>Fecha de Registro</th>
                <th>Imagen del daño</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                for ($i = 0; $i < count($resultCaso); $i++){
            ?>
                <tr>
                    <td><?php echo $resultCaso[$i][1]; ?></td>
                    <td><?php echo $resultCaso[$i][2]; ?></td>
                    <td>
                        <?php  
                            
                            if ($resultCaso[$i][41] == 'Alta'){
                                echo "<div  class='alert alert-danger' role='alert'>".$resultCaso[$i][41]."</div>";
                            }else{
                            if ($resultCaso[$i][41] == 'Media'){
                                echo "<div class='alert alert-warning' role='alert'>".$resultCaso[$i][41]."</div>";
                            }if ($resultCaso[$i][41] == 'Baja'){
                                echo "<div  class='alert alert-success' role='alert'>".$resultCaso[$i][41]."</div>";
                            }
                            }
                        ?>
                    </td>
                    <td><?php echo $resultCaso[$i][8]; ?></td>
                    <td> <img draggable="false" src="<?php echo $resultCaso[$i][6];?>" height="100" width="100"></td>
                    <td>
                        <!-- detalle -->
                        <a type="button" onclick="detalleCaso
                        (
                        ('<?php echo $resultCaso[$i][16] .' '. $resultCaso[$i][18];?>'),
                        ('<?php echo $resultCaso[$i][1];?>'),
                        ('<?php echo $resultCaso[$i][2];?>'),
                        ('<?php echo number_format($resultCaso[$i][3]) . 'cm';?>'),
                        ('<?php echo number_format($resultCaso[$i][4]) . 'cm';?>'),
                        ('<?php echo number_format($resultCaso[$i][5]) . 'cm';?>'),
                        ('<?php echo $resultCaso[$i][30];?>'),
                        ('<?php echo $resultCaso[$i][41];?>'),
                        ('<?php echo $resultCaso[$i][38];?>'),
                        ('<?php echo $resultCaso[$i][8];?>'),
                        ('<?php echo $resultCaso[$i][7];?>'),
                        ('<?php echo $resultCaso[$i][6];?>')
                        )"
                        class="btn btn-primary text-white" title="DETALLE" data-toggle="modal" data-target="#modal_detalle_caso"><i class="fas fa-eye"></i></a>

                        <?php
                            if ($resultCaso[$i][13] == 14 || $resultCaso[$i][13] == 16 ) {
                        ?>
                                <!-- editar -->
                                <a type="button" onclick="actualizarCaso(
                                ('<?php echo $resultCaso[$i][0];?>'),
                                ('<?php echo $resultCaso[$i][1];?>'),
                                ('<?php echo $resultCaso[$i][7];?>'),
                                ('<?php echo $resultCaso[$i][2];?>'),
                                ('<?php echo $resultCaso[$i][3];?>'),
                                ('<?php echo $resultCaso[$i][4];?>'),
                                ('<?php echo $resultCaso[$i][5];?>'),
                                ('<?php echo $resultCaso[$i][10];?>'),
                                ('<?php echo $resultCaso[$i][9];?>'),
                                ('<?php echo $resultCaso[$i][6];?>')
                                )"class="btn btn-warning text-white" title="EDITAR" data-toggle="modal" data-target="#modal_actualizar_caso"><i class="fas fa-pencil-alt"></i></a>
                        <?php
                            }else{
                            }
                        ?>
                        <?php
                            if ($resultCaso[$i][13] == 14) {
                        ?>
                                <!-- eliminar -->
                                <a type="button" onclick="delete_modal(<?php echo $resultCaso[$i][0];?>)" class="btn btn-danger text-white" title="INHABILITAR" data-toggle="modal" data-target="#modal_eliminar_caso"><i class="fas fa-trash"></i></a>
                        <?php
                            }elseif ($resultCaso[$i][13] == 16) {
                        ?>
                                <!-- activar -->
                                <a type="button" onclick="activar_modal(<?php echo $resultCaso[$i][0];?>)" class="btn btn-success text-white" title="Habilitar" data-toggle="modal" data-target="#modal_activar_caso"><i class="fas fa-plus-square"></i></a>
                        <?php
                            }elseif ($resultCaso[$i][13] == 15) {
                        ?>
                                <a type="button" class="btn btn-info text-white" title="PROCESO" data-toggle="modal" data-target="#modal_proceso_caso"><i class="fas fa-parking"></i></a>
                        <?php
                            }elseif ($resultCaso[$i][13] == 13) {
                        ?>
                                <a type="button" class="btn btn-secondary text-white" title="TERMINADO" data-toggle="modal" data-target="#modal_terminado_caso"><i class="fas fa-check-double"></i></a>
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
        <tr>
        </tr>
    </tfoot>
    </table>
</div>
</div>
<a type="button" onclick="default_img2()" class="btn btn-dark text-white añadyr" title="AÑADIR" data-toggle="modal" data-target="#modal_insertar_caso"><i class="fas fa-plus"></i></a>

<!-- MODALES -->

<!-- MODAL INSERTAR CASO -->
<div class="modal fade" id="modal_insertar_caso" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="staticBackdropLabel" draggable="true">AÑADIR CASO</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <!-- FORMULARIO -->
                <form class="row g-3" id="form_insertar_caso">
                <input type="number" class="form-control" value="<?php echo $_SESSION['usu_id']; ?>" name="usuario_caso" id="usuario_caso" hidden>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Número del Caso</label>
                        <input type="text" class="form-control" name="numero_caso" id="numero_caso" autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Descripción del Daño</label>
                        <input type="text" class="form-control" name="descripcion_caso" id="descripcion_caso" autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Dirección del Daño</label>
                        <input type="text" class="form-control" name="direccion_caso" id="direccion_caso" autocomplete="off" maxlength="30">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Profundidad del Daño</label>
                        <input type="number" class="form-control" min="1" pattern="^[0-9]+" name="profundidad_caso"  id="profundidad_caso" autocomplete="off" maxlength="30">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Largo del Daño</label>
                        <input type="number" class="form-control" min="1" pattern="^[0-9]+" name="largo_caso" id="largo_caso" autocomplete="off" maxlength="30">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Ancho del Daño</label>
                        <input type="number" class="form-control" min="1" pattern="^[0-9]+" name="ancho_daño" id="ancho_daño" autocomplete="off" maxlength="30">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Tipo de Daño</label>
                        <select name="tipo_daño" id="tipo_daño" class="form-control">
                            <option draggable="true" selected>Seleccione...</option>
                            <?php
                                foreach($selectorDaño as $tip_dañ){
                                    echo "<option value=".$tip_dañ["tip_dañ_id"].">".$tip_dañ["tip_dañ_descripcion"]."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Prioridad del Daño</label>
                        <select name="prioridad_daño" id="prioridad_daño" class="form-control">
                            <option draggable="true" selected>Seleccione...</option>
                            <?php
                                foreach($selectorPrioridad as $prioridad){
                                    echo "<option value=".$prioridad["tip_pri_id"].">".$prioridad["tip_pri_descripcion"]."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <br><br><br>
                        <label draggable="true" class="form-label">Foto del Daño</label>
                        <br><br><br>
                        <div class="custom-file">
                            <input draggable="true" type="file" class="custom-file-input" name="adjunto" id="adjuntoCaso" accept="image/*">
                            <label draggable="true" class="custom-file-label" for="inputGroupFile01" data-browse="Subir">Elija el archivo</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Vista Previa del Daño</label>
                        <div id="foto1">
                            <img draggable="false" id="imgCaso" style='width:250px; height:250px;'>
                        </div>
                    </div>  
            </div>
                <div class="modal-footer button_flex">
                    <button type="reset" class="btn btn-secondary text-white button_style_insert">Remover</button>
                    <button type="button" class="btn btn-info text-white button_style_insert cerrar_modal_2" onclick="insert_caso()" data-dismiss="modal">Añadir</button>
                    <button type="button" class="btn btn-danger button_style_insert" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL VER DETALLE CASO -->
<div class="modal fade" id="modal_detalle_caso" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="staticBackdropLabel" draggable="true">DETALLE CASO</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <!-- FORMULARIO -->
                <form class="row g-3">
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Realizado por</label>
                        <input type="text" class="form-control usuario_caso" readonly>
                    </div>  
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Número del Caso</label>
                        <input type="text" class="form-control numero_caso" readonly>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Dirección del Daño</label>
                        <input type="text" class="form-control direccion_caso" readonly>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Profundidad del Daño</label>
                        <input type="text" class="form-control profundidad_caso" readonly>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Largo del Daño</label>
                        <input type="text" class="form-control largo_caso" readonly>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Ancho del Daño</label>
                        <input type="text" class="form-control ancho_daño" readonly>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Tipo de Daño</label>
                        <input type="text" class="form-control tipo_daño" readonly>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Prioridad del Daño</label>
                        <input type="text" class="form-control prioridad_daño" readonly>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Estado del Daño</label>
                        <input type="text" class="form-control estado_daño" readonly >
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Fecha de Registro</label>
                        <input type="text" class="form-control fecha_daño" readonly>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Descripción del Daño</label>
                    <br><br>
                        <textarea class="form-control descripcion_caso" cols="50" rows="8" readonly></textarea>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true">Foto del Daño</label>
                        <br><br>
                        <img draggable="false" style='width:250px; height:200px;' id="foto_caso">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary detalle_style" data-dismiss="modal">Cerrar</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- MODAL ACTUALIZAR USUARIO -->
<div class="modal fade" id="modal_actualizar_caso" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title text-white" id="staticBackdropLabel" draggable="true">ACTUALIZAR CASO</h5>
            </div>
            <div class="modal-body">
                <!-- FORMULARIO -->
                <form class="row g-3" id="form_actualizar_caso">
                    <div class="col-md-6" hidden>
                        <label draggable="true" class="form-label">ID</label>
                        <input type="number" class="form-control id_caso_update" name="id_caso_update" id="id_caso_update" readonly>
                    </div>
                    <div class="col-md-6" hidden>
                        <label draggable="true" class="form-label">Realizado por</label>
                        <input type="number" class="form-control" value="<?php echo $_SESSION['usu_id']; ?>" name="usuario_caso_update" id="usuario_caso_update" readonly>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Número del Caso</label>
                        <input type="text" class="form-control numero_caso_update"  name="numero_caso_update" id="numero_caso_update" readonly>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Descripción del Daño</label>
                        <input type="text" class="form-control descripcion_caso_update" name="descripcion_caso_update" id="descripcion_caso_update" autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Dirección del Daño</label>
                        <input type="text" class="form-control direccion_caso_update" name="direccion_caso_update" id="direccion_caso_update" autocomplete="off" maxlength="30">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Profundidad del Daño</label>
                        <input type="number" class="form-control profundidad_caso_update" name="profundidad_caso_update" id="profundidad_caso_update" min="1" pattern="^[0-9]+" autocomplete="off"  maxlength="30">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Largo del Daño</label>
                        <input type="number" class="form-control largo_caso_update" name="largo_caso_update" id="largo_caso_update" autocomplete="off" min="1" pattern="^[0-9]+" maxlength="30">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Ancho del Daño</label>
                        <input type="number" class="form-control ancho_daño_update" name="ancho_daño_update" id="ancho_daño_update" autocomplete="off" min="1" pattern="^[0-9]+" maxlength="30">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Tipo de Daño</label>
                        <select name="tipo_daño_update" id="tipo_daño_update" class="form-control select_cerrar">
                        <?php
                            foreach($selectorDaño as $daño){
                                echo "<option value=".$daño["tip_dañ_id"].">".$daño["tip_dañ_descripcion"]."</option>";
                            }
                        ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Prioridad del Daño</label>
                        <select name="prioridad_daño_update" id="prioridad_daño_update" class="form-control select_cerrar">
                        <?php
                            foreach($selectorPrioridad as $prioridad){
                                echo "<option value=".$prioridad["tip_pri_id"].">".$prioridad["tip_pri_descripcion"]."</option>";
                            }
                        ?>
                        </select>
                    </div>
                    <div class="col-md-6"><br><br><br><br>
                        <label draggable="true" class="form-label">Reemplazar Foto</label>
                        <br><br>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input 2" name="adjunto2_caso" id="adjunto2_caso" accept="image/*">
                            <input type="text" name="oldimg_caso" class="oldimg_caso" value="foto2_caso" hidden>
                            <label draggable="true" class="custom-file-label" for="inputGroupFile01" data-browse="Subir">Elija el archivo</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true">Foto Actual</label>
                        <br>
                        <div id="fotonew">
                            <img style='width:250px; height:250px;' id="foto2_caso">
                        </div>
                    </div>
            </div>
            <div class="modal-footer button_flex">
                <button type="button" onclick="update_caso()" class="btn btn-warning text-white button_style_2 cerrar_modal_2" data-dismiss="modal">Actualizar</button>
                <button type="button" class="btn btn-danger button_style_2" data-dismiss="modal" onclick="CancelarSelect()">Cancelar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL ELIMINAR CASO -->
<div class="modal fade" id="modal_eliminar_caso" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-danger  text-white">
                <h5 class="modal-title" id="staticBackdropLabel" draggable="true">INHABILITAR CASO</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <form id="form_eliminar_caso"> 
                    <div class="alert alert-danger" role="alert">
                        <p class="font-weight-bold">¿Está seguro de que desea Inhabilitar este caso?</p>
                        <p class="font-italic">Esta acción se puede revertir.</p>
                        <input type="text" name="id_delete_caso" class="id_delete_caso" hidden>
                    </div>
                </form>
            </div>
            <div class="modal-footer button_flex">
                <button type="button" class="btn btn-danger button_style_2" onclick="delete_caso()" data-dismiss="modal">Inhabilitar</button>
                <button type="button" class="btn btn-secondary button_style_2" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_activar_caso" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success  text-white">
                <h5 class="modal-title" id="staticBackdropLabel" draggable="true">HABILITAR CASO</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <form id="form_activar_caso"> 
                    <div class="alert alert-success" role="alert">
                        <p class="font-weight-bold">¿Está seguro de que desea Habilitar este caso?</p>
                        <p class="font-italic">Esta acción se puede revertir.</p>
                        <input type="text" name="id_activar_caso" class="id_activar_caso" hidden>
                    </div>
                </form>
            </div>
            <div class="modal-footer button_flex">
                <button type="button" class="btn btn-success button_style_2" onclick="activar_caso()" data-dismiss="modal">Habilitar</button>
                <button type="button" class="btn btn-danger button_style_2" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_proceso_caso"  data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info  text-white">
                <h5 class="modal-title" id="staticBackdropLabel" draggable="true">CASO EN PROCESO</h5>
            </div>
            <div class="modal-body">
                <form> 
                    <div class="alert alert-info" role="alert">
                        <p class="font-weight-bold">¡Este caso se encuentra en proceso!</p>
                        <p class="font-italic">Este mensaje es solo informativo.</p>
                        <input type="text" name="id_activar_caso" class="id_activar_caso" hidden>
                    </div>
                </form>
            </div>
            <div class="modal-footer button_flex">
            <button type="button" class="btn btn-info detalle_style" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div> 

<div class="modal fade" id="modal_terminado_caso"  data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-secondary  text-white">
                <h5 class="modal-title" id="staticBackdropLabel" draggable="true">CASO TERMINADO</h5>
            </div>
            <div class="modal-body">
                <form> 
                    <div class="alert alert-secondary" role="alert">
                        <p class="font-weight-bold">¡Este caso se encuentra terminado!</p>
                        <p class="font-italic">Este mensaje es solo informativo.</p>
                        <input type="text" name="id_activar_caso" class="id_activar_caso" hidden>
                    </div>
                </form>
            </div>
            <div class="modal-footer button_flex">
            <button type="button" class="btn btn-secondary detalle_style" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- THEND STYLE --> 
</div>
    <!-- /.content -->
    </div>
<!-- /.content-wrapper -->