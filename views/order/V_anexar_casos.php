<div class="style_order">
<div id="logCaso" class="logCaso">
    <table class="table table-striped table-bordered table-hover">
        <thead>
                <tr>
                <th>Anexar</th>
                <th>Número del Caso</th>
                <th>Dirección</th>
                <th>Prioridad</th>
                <th>Fecha de Registro</th>
                <th>Imagen del daño</th>
                <th>Detalle Caso</th>
            </tr>
        </thead>
        <tbody>
            <?php
                for ($i = 0; $i < count($resultCasos); $i++){
            ?>
                <tr>
                    <td><input type="checkbox" value="<?php echo $resultCasos[$i][0]; ?>" class="case"   name="case" id="case"></td>
                    <td><?php echo $resultCasos[$i][1]; ?></td>
                    <td><?php echo $resultCasos[$i][2]; ?></td>
                    <td>
                    <?php
                        if ($resultCasos[$i][41] == 'Alta'){
                                echo "<div  class='alert alert-danger' role='alert'>".$resultCasos[$i][41]."</div>";
                        }else{
                        if ($resultCasos[$i][41] == 'Media'){
                                echo "<div class='alert alert-warning' role='alert'>".$resultCasos[$i][41]."</div>";
                        }if ($resultCasos[$i][41] == 'Baja'){
                                echo "<div  class='alert alert-success' role='alert'>".$resultCasos[$i][41]."</div>";
                            }
                        }
                        ?>
                    </td>
                    <td><?php echo $resultCasos[$i][8]; ?></td>
                    <td><img src="<?php echo $resultCasos[$i][6];?>" height="100" width="100"></td>
                    <td>
                        <!-- detalle -->
                        <a type="button" onclick="detalleCaso
                        (
                        ('<?php echo $resultCasos[$i][16] .' '. $resultCasos[$i][18];?>'),
                        ('<?php echo $resultCasos[$i][1];?>'),
                        ('<?php echo $resultCasos[$i][2];?>'),
                        ('<?php echo number_format($resultCasos[$i][3]) . 'cm';?>'),
                        ('<?php echo number_format($resultCasos[$i][4]) . 'cm';?>'),
                        ('<?php echo number_format($resultCasos[$i][5]) . 'cm';?>'),
                        ('<?php echo $resultCasos[$i][30];?>'),
                        ('<?php echo $resultCasos[$i][41];?>'),
                        ('<?php echo $resultCasos[$i][38];?>'),
                        ('<?php echo $resultCasos[$i][8];?>'),
                        ('<?php echo $resultCasos[$i][7];?>'),
                        ('<?php echo $resultCasos[$i][6];?>')
                        )"
                        class="btn btn-primary text-white" title="DETALLE" data-toggle="modal" data-target="#modal_detalle_caso"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>
</div> 
<div class="recarga">
    <a type="button" id="adjuntar_ord" class="btn btn-info text-white mymodal openorder añadyr" title="GENERAR ORDEN" data-toggle="modal" data-target="#modal_registrar_orden"><i class="fas fa-paperclip"></i></a>
    <div  id="removeAnexo" class="alert alert-danger anexarCheck" role="alert">
            <strong>¡Para crear una orden de mantenimiento adjunte al menos un caso!</strong>
    </div>
</div>
<!-- MODALES -->

<!-- MODAL VER DETALLE CASO -->
<div class="modal fade" id="modal_detalle_caso" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="staticBackdropLabel" draggable="true">DETALLE DEL CASO</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <!-- FORMULARIO -->
                <form class="row g-3" >
                    <div class="order_style_an">
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Realizador por</label>
                        <input type="text" class="form-control usuario_caso"readonly >
                    </div>  
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Número del Caso</label>
                        <input type="text" class="form-control numero_caso" readonly>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Dirección del Daño</label>
                        <input type="text" class="form-control direccion_caso"readonly >
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Profundidad del Daño</label>
                        <input type="text" class="form-control profundidad_caso" readonly>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Largo del Daño</label>
                        <input type="text" class="form-control largo_caso"readonly >
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Ancho del Daño</label>
                        <input type="text" class="form-control ancho_daño"readonly >
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
                        <input type="text" class="form-control estado_daño"readonly >
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Fecha de Registro</label>
                        <input type="text" class="form-control fecha_daño" readonly >
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Descripción del Daño</label>
                    <br><br>
                        <textarea class="form-control descripcion_caso" cols="50" rows="8" readonly></textarea>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true">Foto del Daño</label>
                        <br><br>
                        <img style='width:250px; height:200px;' id="foto_caso">
                    </div>
            </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary detalle_style" data-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
    </div>
</div>


<!-- MODAL GENERAR ORDEN DE MANTENIMIENTO -->
<div id="loadModaAnexarCasos">
    <div class="modal fade" id="modal_registrar_orden" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-info  text-white">
                    <h5 class="modal-title" id="staticBackdropLabel" draggable="true">GENERAR ORDEN DE MANTENIMIENTO</h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="modal-body">
                    <!--Tabla lista de casos-->
                    <h4>Casos Adjuntados</h4>
                    <div class="table_ACasos">
                    <table class="table table-hover" id="listaCostos">
                    <thead>
                        <tr>
                            <th>Número Tramo</th>
                            <th>Profundidad</th>
                            <th>Largo</th>
                            <th>Tipo de Daño</th>
                            <th>Realizado por</th>
                        </tr>
                    </thead>
                    <tbody id="list_casos">
                    </tbody>
                </table>
                </div>
                <br>
                <h4>Agregar Insumos</h4>
                    <form id="form_orden">
                    <!--input hidden que tendrá como value la variable de session
                    que me trae el id del usuario-->
                    <input type="text" id="usuario" name="usuario" value="<?php echo $_SESSION['usu_id']; ?>" hidden>
                    <div class="row">
                    <div class="form-group">
                    <select name="orden_prioridad" id="orden_prioridad" class="form-control selec_max">
                    </select>
                    </div>
                    <div class="form-group">
                    <select name="orden_tercero" id="orden_tercero" class="form-control selec_max">
                    </select>
                    </div>
                    <div class="form-group">
                    <select name="tp-orden_insumo" id="tp-orden_insumo" class="form-control orden_insumo_anexo selec_max">
                            <option>Seleccione Tipo Insumos</option>
                            <option value="tblmaterial,mat_id,mat_descripcion,mat_existencia">Material</option>
                            <option value="tblmaquinaria,maq_id,maq_descripcion,maq_existencia">Maquinaria</option>
                            <option value="tblherramienta,her_id,her_descripcion,her_existencia">Herramienta</option>
                    </select>
                    </div>
                        </div>
                    <select class="hello world form-control" name="orden_insumo" id="orden_insumo">
                        <option>Seleccione Primero El tipo De Insumo</option>
                    </select>
                        <br><br>
                        <label for="ornden_cantidad">Cantidad</label>
                        <input type="number" min="1" name="cantidad" id="ornden_cantidad"  class="form-control ornden_cantidad">
                        </form>
                        <br>
                        <div id="existencia"></div>
                    <!--Tabla lista de insumos-->
                    <h4>Insumos</h4>
                    <div class="table_ACasos">
                    <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Insumo</th>
                            <th>Cantidad</th>
                            <th>Costo Unitario</th>
                            <th>Costo Total</th>
                            
                        </tr>
                    </thead>
                    <tbody id="list_insumos">
                    </tbody>
                    <tfoot>
                        <tr> 
                        <td colspan='2' class="text-right">TOTAL:</td>
                        <td colspan='3' class="text-left" id="totalito"></td>
                        </tr>
                    </tfoot>
                </table>
                </div>
                        <button id="agrgar_insumo" class="btn btn-info" onclick="agregar_insumo()">Agregar Insumo</button>
                </div>
                <div class="modal-footer button_flex">
                    <button type="button" id="generar_orden" onclick="generar_orden()" class="btn btn-info button_style_2"  data-dismiss="modal">Generar Orden</button>
                    <!-- <button type="button" id="generar_orden2" class="btn btn-info button_style_2" onclick="alertInsumo()">Generar Orden</button> -->
                    <button type="button" id="cancel_insumo" class="btn btn-secondary button_style_2" data-dismiss="modal" >Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>