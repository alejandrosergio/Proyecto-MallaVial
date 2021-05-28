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
                <li class="breadcrumb-item active">Terceros</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
<div class="style_general">
<h4><strong>CONSULTAR TERCEROS</strong></h4>
<div id="load_tercero">   
    <table class="table table-striped table-bordered table-hover"> 
        <thead>
                <tr>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Opciones</th>
                </tr>   
            </thead>
            <tbody>
                <?php
                for ($i = 0; $i < count($result); $i++) {
                ?>
                    <tr>
                        <td><?php echo $result[$i][1];  ?></td>
                        <td><?php echo $result[$i][2];  ?></td>
                        <td><?php echo $result[$i][4];  ?></td>
                        <td><?php echo $result[$i][6];  ?></td>
                        <td><?php echo $result[$i][8];  ?></td>
                        <td> 

                        <a type="button" class="btn btn-primary text-white" title="DETALLE" data-toggle="modal" data-target="#modal_detalle_tercero" onclick="detailThirdparties
                            (
                            ('<?php echo $result[$i][0];?>'),
                            ('<?php echo $result[$i][1];?>'),
                            ('<?php echo $result[$i][2];?>'),
                            ('<?php echo $result[$i][3];?>'),
                            ('<?php echo $result[$i][4];?>'),
                            ('<?php echo $result[$i][5];?>'),
                            ('<?php echo $result[$i][6];?>'),
                            ('<?php echo $result[$i][7];?>'),
                            ('<?php echo $result[$i][8];?>'),
                            ('<?php echo $result[$i][9];?>'),
                            ('<?php echo $result[$i][14];?>'),
                            ('<?php echo $result[$i][17];?>'),
                            ('<?php echo $result[$i][21];?>')
                            )
                            "><i class="fas fa-eye" ></i></a>

                        <a type="button" class="btn btn-warning text-white" title="EDITAR" data-toggle="modal" data-target="#modal_actualizar_tercero" onclick="editThird
                            (
                            ('<?php echo $result[$i][0];?>'),
                            ('<?php echo $result[$i][1];?>'),
                            ('<?php echo $result[$i][2];?>'),
                            ('<?php echo $result[$i][3];?>'),
                            ('<?php echo $result[$i][4];?>'),
                            ('<?php echo $result[$i][5];?>'),
                            ('<?php echo $result[$i][6];?>'),
                            ('<?php echo $result[$i][7];?>'),
                            ('<?php echo $result[$i][8];?>'),
                            ('<?php echo $result[$i][10];?>'),
                            ('<?php echo $result[$i][11];?>')
                            )
                            "><i class="fas fa-pencil-alt" ></i></a>
                        <a type="button" class="btn btn-danger text-white" title="ELIMINAR" data-toggle="modal" data-target="#modal_eliminar_tercero" onclick="deleteThirdparties(<?php echo $result[$i][0]; ?>)"><i class="fas fa-trash"></i></a> 
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
<a type="button" class="btn btn-info text-white añadyr" title="AÑADIR" data-toggle="modal" data-target="#modal_insertar_tercero"><i class="fas fa-plus" ></i></a>


<!-- MODALES -->

<!-- MODAL INSERTAR TERCERO -->

<div class="modal fade" id="modal_insertar_tercero" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header bg-info text-white">
        <h5 class="modal-title" id="staticBackdropLabel">AÑADIR TERCERO</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button> -->
        </div>
        <div class="modal-body">
        <!-- FORMULARiO -->
        <form class="row g-3" id="form_insertar_tercero" method="POST">
    <div class="col-md-12">
        <label for="documento" class="form-label">Documento</label>
        <input type="number" id="docu_insert_tercero" class="form-control" name="insert_documento" min="1" pattern="^[0-9]+"  autocomplete="off" >
    </div>
    <div class="col-md-6">
        <label for="name1" class="form-label">Primer Nombre</label>
        <input type="text" id="name_tercero_i" maxlength="30" class="form-control" name="insert_name1"  autocomplete="off" onkeypress="return onlytext(event)" onpaste="return false">
    </div>
    <div class="col-md-6">
        <label for="name2" class="form-label">Segundo Nombre</label>
        <input type="text" class="form-control" maxlength="30" name="insert_name2"  autocomplete="off" onkeypress="return onlytext(event)" onpaste="return false">
    </div>
    <div class="col-md-6">
        <label for="ape1" class="form-label">Primer Apellido</label>
        <input type="text" id="ape_tercero_i" maxlength="30" class="form-control" name="insert_ape1"  autocomplete="off" onkeypress="return onlytext(event)" onpaste="return false">
    </div>
    <div class="col-md-6">
        <label for="ape2" class="form-label">Segundo Apellido</label>
        <input type="text" id="ape2_tercero_i" maxlength="30" class="form-control" name="insert_ape2"  autocomplete="off" onkeypress="return onlytext(event)" onpaste="return false">
    </div>
    <div class="col-md-6">
        <label for="correo" class="form-label">Correo</label>
        <input type="email" id="corre_tercero_i" maxlength="30" class="form-control" name="insert_correo"  autocomplete="off" >
    </div>
    <div class="col-md-6">
        <label for="direccion" class="form-label">Dirección</label>
        <input type="text" id="drc_tercero_i" class="form-control" name="insert_direccion" maxlength="40" autocomplete="off" >
    </div>
    <div class="col-md-6">
                        <label for="tipoDocu" class="form-label">Tipo de Documento</label>
                        <select  name="insert_tipoDocu" id="tdoc_tercero_i" class="form-control" >
                            <option value="" selected>Seleccione...</option>
                            <?php
                                foreach ($documentos as $key => $tip_doc){
                            ?>
                                <option value="<?php echo $tip_doc['tip_doc_id'] ?>"><?php echo $tip_doc['tip_doc_descripcion'] ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="rol" class="form-label">Rol</label>
                        <select name="insert_rol" id="rol_tercero_i" class="form-control" >
                            <option value=""  selected>Seleccione...</option>
                            <?php
                                foreach ($roles as $key => $rols){
                            ?>
                                <option value="<?php echo $rols['rol_id'] ?>"><?php echo $rols['rol_descripcion'] ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-12">
                    <label for="telefono"  class="form-label">Teléfono</label>
                    <input type="number" min="1" pattern="^[0-9]+"  id="tel_insert_tercero" class="form-control" name="insert_telefono"  autocomplete="off" >
                    </div>
                </div>
            <div class="modal-footer button_flex">
                    <button type="reset" class="btn btn-secondary text-white button_style_insert">Remover</button>
                    <button type="button" onclick="insertar_tercero()"  class="btn btn-info text-white button_style_insert cerrar_modal_2" data-dismiss="modal" >Añadir</button>
                    <button type="button" class="btn btn-danger button_style_insert" data-dismiss="modal" onclick="this.form.reset();">Cancelar</button>
            </div>
    </form>
    </div>
    </div>
</div>
</div>
    </div>
    </div>
</div>

<!-- MODAL VER DETALLE TERCERO -->

<div class="modal fade modal_he" id="modal_detalle_tercero" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="staticBackdropLabel">DETALLES TERCERO</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button> -->
        </div>
        <div class="modal-body">
<!-- FORM -->
<form class="row g-3">
    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">ID</label>
        <input type="text" class="form-control id"  disabled>
    </div>
    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Documento</label>
        <input type="text" class="form-control docu"  disabled>
    </div>
    <div class="col-md-6">
        <label class="form-label">Primer Nombre</label>
        <input type="text" class="form-control name" disabled>
    </div>
    <div class="col-md-6">
        <label class="form-label">Segundo Nombre</label>
        <input type="text" class="form-control name2" disabled>
    </div>
    <div class="col-md-6">
        <label class="form-label">Primer Apellido</label>
        <input type="text" class="form-control ape" disabled>
    </div>
    <div class="col-md-6">
        <label class="form-label">Segundo Apellido</label>
        <input type="text" class="form-control ape2" disabled>
    </div>
    <div class="col-md-6">
        <label class="form-label">Correo</label>
        <input type="text" class="form-control  corre" disabled>
    </div>
    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Dirección</label>
        <input type="text" class="form-control dcc" disabled>
    </div>
    <div class="col-md-6">
        <label class="form-label">Teléfono</label>
        <input type="text" class="form-control tel" disabled>
    </div>
    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Tipo de Documento</label>
        <input type="text" class="form-control tdoc" disabled>
    </div>
    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Rol</label>
        <input type="text" class="form-control rol" disabled>
    </div>
    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Estado</label> 
        <input type="text" class="form-control estado"disabled>
    </div>
    <div class="col-md-12">
        <label for="inputPassword4" class="form-label">Fecha de Registro</label>
        <input type="text" class="form-control fecha" disabled>
    </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary detalle_style" data-dismiss="modal">Cerrar</button>
        </div>
    </form>
    </div>
    </div>
</div>

<!-- MODAL ACTUALIZAR TERCERO -->

<div class="modal fade" id="modal_actualizar_tercero" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header bg-warning text-white">
        <h5 class="modal-title text-white" id="staticBackdropLabel">ACTUALIZAR TERCERO</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button> -->
        </div>
        <div class="modal-body">
            <!-- FORM -->
            <form class="row g-3" action="controllers/thirdparties/C_thirdpartiesUpdate.php" id="form_actualizar_tercero" method="POST" >
    <div class="col-md-12">
        <input type="number" class="form-control id" name="update_id" readonly hidden>
    </div>
    <div class="col-md-12">
        <label for="inputPassword4" class="form-label">Documento</label>
        <input type="text" class="form-control docu" readonly autocomplete="off">
    </div>
    <div class="col-md-6">
        <label class="form-label">Primer Nombre</label>
        <input type="text" maxlength="30" class="form-control name" id="name_tercero" name="update_name1" autocomplete="off" onkeypress="return onlytext(event)" onpaste="return false">
    </div>
    <div class="col-md-6">
        <label class="form-label">Segundo Nombre</label>
        <input type="text" maxlength="30" class="form-control name2" id="name2_tercero" name="update_name2" autocomplete="off" onkeypress="return onlytext(event)" onpaste="return false">
    </div>
    <div class="col-md-6">
        <label class="form-label">Primer Apellido</label>
        <input type="text" maxlength="30" class="form-control ape" id="ape_tercero" name="update_ape1" autocomplete="off" onkeypress="return onlytext(event)" onpaste="return false">
    </div>
    <div class="col-md-6">
        <label class="form-label">Segundo Apellido</label>
        <input type="text" maxlength="30" class="form-control ape2" id="ape2_tercero" name="update_ape2" autocomplete="off" onkeypress="return onlytext(event)" onpaste="return false">
    </div>
    <div class="col-md-6">
        <label class="form-label">Correo</label>
        <input type="email" maxlength="30" class="form-control corre" id="corre_tercero" name="update_correo" autocomplete="off">
    </div>
    <div class="col-md-6">
        <label class="form-label">Dirección</label>
        <input type="text" maxlength="40" class="form-control dcc" id="drc_tercero" name="update_direccion" autocomplete="off">
    </div>
    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Tipo de Documento</label>
        <select name="update_Tdocumento" class="form-control select_cerrar" id="select_editar_tercero_tdoc">
        <?php
            foreach ($documentos as $key => $value) {
        ?>
            <option value="<?php echo $value['tip_doc_id'] ?>"><?php echo $value['tip_doc_descripcion'] ?></option>
        <?php
        }
        ?>
        </select>
    </div>
    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Rol</label>
        <select name="update_rol" class="form-control select_cerrar" id="select_editar_tercero_rol">
        <?php
            foreach ($roles as $key => $value){
        ?>
            <option value="<?php echo $value['rol_id'] ?>"><?php echo $value['rol_descripcion'] ?></option>
        <?php
        }
        ?>
        </select>
    </div>
    <div class="col-md-12">
        <label for="inputEmail4" class="form-label">Teléfono</label>
        <input type="number" id="tel_tercero" min="1" pattern="^[0-9]+" class="form-control tel" name="update_telefono" autocomplete="off">
    </div>
        </div>
            <div class="modal-footer button_flex">
                <button type="button" onclick="actualizar_tercero()" class="btn btn-warning text-white button_style_2 cerrar_modal_2" data-dismiss="modal">Actualizar</button>
                <button type="button" class="btn btn-danger button_style_2" data-dismiss="modal" onclick="CancelarSelect()">Cancelar</button>
            </div>
        </form>
    </div>
    </div>
</div>

<!-- MODAL ELIMINAR TERCERO -->

<div class="modal fade" id="modal_eliminar_tercero" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header bg-danger  text-white">
        <h5 class="modal-title" id="staticBackdropLabel">ELIMINAR TERCERO</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button> -->
        </div>
        <div class="modal-body">
            <form  id="form_eliminar_tercero" method="POST">
                <div class="alert alert-danger" role="alert">
                    <p class="font-weight-bold">¿Está seguro de que desea eliminar el Tercero? </p>
                    <p class="font-italic">Esta acción no se puede deshacer.</p>
                <input type="text" name="id_delete" class="id_delete" hidden>
            </div>
            </div> 
                <div class="modal-footer button_flex">
                <button type="button" onclick="eliminar_tercero()"  class="btn btn-danger button_style_2" data-dismiss="modal">Eliminar</button>
                <button type="button" class="btn btn-secondary button_style_2" data-dismiss="modal">Cancelar</button>
            </div>
            </form>
    </div>
    </div>
</div>
    <!-- /.content -->
</div>
