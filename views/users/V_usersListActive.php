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
                <li class="breadcrumb-item active">Usuarios</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
<div class="style_general">
<div class="style">
<h4><strong>CONSULTAR USUARIO</strong></h4>
<div id="loguser">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>Documento</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Rol</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                for ($i = 0; $i < count($resultados); $i++){
            ?>
                <tr>
                    <td><?php echo $resultados[$i][1]; ?></td>
                    <td><?php echo $resultados[$i][2]; ?></td>
                    <td><?php echo $resultados[$i][4]; ?></td>
                    <td><?php echo $resultados[$i][9]; ?></td>
                    <td><?php echo $resultados[$i][20]; ?></td>
                    <td> 
                        <a type="button" onclick="detailuser
                        (
                        ('<?php echo $resultados[$i][0];?>'),
                        ('<?php echo $resultados[$i][1];?>'),
                        ('<?php echo $resultados[$i][2];?>'),
                        ('<?php echo $resultados[$i][3];?>'),
                        ('<?php echo $resultados[$i][4];?>'),
                        ('<?php echo $resultados[$i][5];?>'),
                        ('<?php echo $resultados[$i][6];?>'),
                        ('<?php echo $resultados[$i][8];?>'),
                        ('<?php echo $resultados[$i][9];?>'),
                        ('<?php echo $resultados[$i][10];?>'),
                        ('<?php echo $resultados[$i][11];?>'),
                        ('<?php echo $resultados[$i][24];?>'),
                        ('<?php echo $resultados[$i][20];?>'),
                        ('<?php echo $resultados[$i][16];?>')
                        )" 
                        class="btn btn-primary text-white" title="DETALLE" data-toggle="modal" data-target="#modal_detalle_usuario"><i class="fas fa-eye"></i></a>
                        <a type="button" onclick="update_users(('<?php echo $resultados[$i][0];?>'),
                        ('<?php echo $resultados[$i][1];?>'),
                        ('<?php echo $resultados[$i][2];?>'),
                        ('<?php echo $resultados[$i][3];?>'),
                        ('<?php echo $resultados[$i][4];?>'),
                        ('<?php echo $resultados[$i][5];?>'),
                        ('<?php echo $resultados[$i][6];?>'),
                        ('<?php echo $resultados[$i][8];?>'),
                        ('<?php echo $resultados[$i][9];?>'),
                        ('<?php echo $resultados[$i][12];?>'),
                        ('<?php echo $resultados[$i][13];?>'),
                        ('<?php echo $resultados[$i][10];?>')
                        )" class="btn btn-warning text-white" title="EDITAR" data-toggle="modal" data-target="#modal_actualizar_usuario"><i class="fas fa-pencil-alt"></i></a>
                        <a type="button" onclick="delete_users(<?php echo $resultados[$i][0];?>)" class="btn btn-danger text-white" title="ELIMINAR" data-toggle="modal" data-target="#modal_eliminar_usuario"><i class="fas fa-trash"></i></a>
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
<a type="button" onclick="default_img()" class="btn btn-info text-white añadyr" title="AÑADIR" data-toggle="modal" data-target="#modal_insertar_usuario"><i class="fas fa-plus"></i></a>
<!-- MODALES -->
<!-- MODAL INSERTAR USUARIO -->
<div class="modal fade" id="modal_insertar_usuario" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="staticBackdropLabel" draggable="true">AÑADIR USUARIO</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <!-- FORMULARIO -->
                <form class="row g-3" id="form_insertar_usuario">
                    <div class="col-md-6">
                        <input type="number" class="form-control" name="id_insert" id="id" hidden>
                    </div>
                    <div class="col-md-12">
                        <label draggable="true" for="inputPassword4" class="form-label">Documento</label>
                        <input type="number" class="form-control" name="doc_insert" id="userdoc" maxlength="10" minlength="8" min="1" pattern="^[0-9]+">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" for="inputEmail4" class="form-label">Primer Nombre</label>
                        <input type="text" class="form-control" name="nom1_insert" id="usernom1" autocomplete="off" onkeypress="return onlytext(event)" onpaste="return false" maxlength="30">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" for="inputPassword4" class="form-label">Segundo Nombre</label>
                        <input type="text" class="form-control" name="nom2_insert" id="usernom2" autocomplete="off" onkeypress="return onlytext(event)" onpaste="return false" maxlength="30">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" for="inputEmail4" class="form-label">Primer Apellido</label>
                        <input type="text" class="form-control" name="ape1_insert"  id="userape1" autocomplete="off" onkeypress="return onlytext(event)" onpaste="return false" maxlength="30">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" for="inputPassword4" class="form-label">Segundo Apellido</label>
                        <input type="text" class="form-control" name="ape2_insert" id="userape2" autocomplete="off" onkeypress="return onlytext(event)" onpaste="return false" maxlength="30">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" for="inputEmail4" class="form-label">Correo</label>
                        <input type="email" class="form-control" name="cor_insert" id="usercor" autocomplete="off" maxlength="30">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" for="inputEmail4" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="con_insert" id="usercon" autocomplete="off" maxlength="40" minlength="12">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" for="inputPassword4" class="form-label">Dirección</label>
                        <input type="text" class="form-control" name="dir_insert" id="userdir" autocomplete="off" maxlength="40">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" for="inputEmail4" class="form-label">Teléfono</label>
                        <input type="number" maxlength="10" minlength="7" class="form-control" name="tel_insert" id="usertel" autocomplete="off" min="1" pattern="^[0-9]+">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" for="inputPassword4" class="form-label">Tipo de Documento</label>
                        <select name="tipdocu_insert" id="usertipdocu" class="form-control">
                            <option val="" draggable="true" selected>Seleccione...</option>
                            <?php
                                foreach($selector1 as $tip_doc){
                                    echo "<option value=".$tip_doc["tip_doc_id"].">".$tip_doc["tip_doc_descripcion"]."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" for="inputEmail4" class="form-label">Rol</label>
                        <select name="rol_insert" id="userrol" class="form-control">
                            <option value="" draggable="true" selected>Seleccione...</option>
                            <?php
                                foreach($selector2 as $rol){
                                    echo "<option value=".$rol["rol_id"].">".$rol["rol_descripcion"]."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                    <br><br>
                        <label draggable="true" for="inputEmail4" class="form-label">Foto de Perfil</label>
                        <br><br>
                        <div class="custom-file">
                            <input draggable="true" type="file" class="custom-file-input" name="adjunto" id="adjunto" accept="image/*">
                            <label draggable="true" class="custom-file-label" for="inputGroupFile01" data-browse="Subir">Elija el archivo</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" for="inputEmail4" class="form-label">Vista Previa</label>
                        <div id="foto1">
                            <img draggable="true" id="img1" style='width:150px; height:150px;'>
                        </div>
                    </div>
            </div>
                <div class="modal-footer button_flex">
                    <button type="reset" class="btn btn-secondary text-white button_style_insert">Remover</button>
                    <button type="button" class="btn btn-info text-white button_style_insert cerrar_modal_2" onclick="insert_user()" data-dismiss="modal">Añadir</button>
                    <button type="button" class="btn btn-danger button_style_insert" data-dismiss="modal">Cancelar</button>
                </div>
                </form>
        </div>
    </div>
</div>
<!-- MODAL VER DETALLE USUARIO -->
<div class="modal fade" id="modal_detalle_usuario" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="staticBackdropLabel" draggable="true">DETALLE USUARIO</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <!-- FORMULARIO -->
                <form class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">ID</label>
                        <input type="text" class="form-control id" disabled>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Documento</label>
                        <input type="text" class="form-control docu" disabled>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Primer Nombre</label>
                        <input type="text" class="form-control name" disabled>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Segundo Nombre</label>
                        <input type="text" class="form-control name2" disabled>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Primer Apellido</label>
                        <input type="text" class="form-control ape" disabled>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Segundo Apellido</label>
                        <input type="text" class="form-control ape2" disabled>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Correo</label>
                        <input type="email" class="form-control corre" disabled>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Dirección</label>
                        <input type="text" class="form-control dcc" disabled>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Teléfono</label>
                        <input type="text" class="form-control tel" disabled>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Tipo de Documento</label>
                        <input type="text" class="form-control tdoc" disabled>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Rol</label>
                        <input type="text" class="form-control rol" disabled>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Estado</label>
                        <input type="text" class="form-control estado" disabled>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Fecha de Registro</label>
                        <input type="text" class="form-control fecha" disabled>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true">Foto de Perfil</label>
                        <br>
                        <img style='width:150px; height:150px;' id="foto" src="" alt="">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary detalle_style" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- MODAL ACTUALIZAR USUARIO -->
<div class="modal fade" id="modal_actualizar_usuario" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title text-white" id="staticBackdropLabel" draggable="true">ACTUALIZAR USUARIO</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <!-- FORMULARIO -->
                <form class="row g-3" id="form_actualizar_usuario">
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">ID</label>
                        <input type="number" class="form-control id" name="id_update" readonly>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Documento</label>
                        <input type="number" class="form-control doc" id="user2doc" readonly>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Primer Nombre</label>
                        <input type="text" class="form-control nom1" name="nom1_update" id="user2nom1" autocomplete="off" onkeypress="return onlytext(event)" onpaste="return false">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Segundo Nombre</label>
                        <input type="text" class="form-control nom2" name="nom2_update" id="user2nom2" autocomplete="off" onkeypress="return onlytext(event)" onpaste="return false">
                    </div>                   
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Primer Apellido</label>
                        <input type="text" class="form-control ape1" name="ape1_update" id="user2ape1" autocomplete="off" onkeypress="return onlytext(event)" onpaste="return false">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Segundo Apellido</label>
                        <input type="text" class="form-control ape2" name="ape2_update" id="user2ape2" autocomplete="off" onkeypress="return onlytext(event)" onpaste="return false">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Correo</label>
                        <input type="email" class="form-control cor" name="cor_update" id="user2cor" autocomplete="off">
                    </div>       
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Contraseña</label>
                        <input type="password" class="form-control con" name="con_update" id="user2con" autocomplete="off" placeholder="Digite La Nueva Contraseña">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Dirección</label>
                        <input type="text" class="form-control dir" name="dir_update" id="user2dir" autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" class="form-label">Teléfono</label>
                        <input type="number" class="form-control tel" name="tel_update" id="user2tel" autocomplete="off" min="1" pattern="^[0-9]+">
                    </div>                    
                    <div class="col-md-6">
                        <label draggable="true" for="inputPassword4" class="form-label">Tipo de Documento</label>
                        <select name="tipdocu_update" id="usertipdocu2" class="form-control select_cerrar">
                        <?php
                            foreach($selector1 as $tip_doc){
                                echo "<option value=".$tip_doc["tip_doc_id"].">".$tip_doc["tip_doc_descripcion"]."</option>";
                            }
                        ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true" for="inputEmail4" class="form-label">Rol</label>
                        <select name="rol_update" id="userrol2" class="form-control select_cerrar">
                        <?php
                            foreach($selector2 as $rol){
                                echo "<option draggable='true' value=".$rol["rol_id"].">".$rol["rol_descripcion"]."</option>";
                            }
                        ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label draggable="true">Foto Actual</label>
                        <br>
                        <div id="fotonew">
                            <img style='width:150px; height:150px;' id="foto2" src="" alt="">
                        </div>
                    </div>
                    
                    <div class="col-md-6"><br><br>
                        <label draggable="true" for="inputEmail4" class="form-label">Reemplazar Foto</label>
                        <br><br>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input 2" name="adjunto2" id="adjunto2" accept="image/*">
                            <input type="text" name="oldimg" class="oldimg" value="foto2" hidden>
                            <label draggable="true" class="custom-file-label" for="inputGroupFile01" data-browse="Subir">Elija el archivo</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer button_flex">
                <button type="button" id="enviar" class="btn btn-warning text-white button_style_2 cerrar_modal_2" onclick="update_user()"  data-dismiss="modal">Actualizar</button>
                <button type="button" class="btn btn-danger button_style_2" data-dismiss="modal" onclick="CancelarSelect()">Cancelar</button>
            </div>
        </div>
    </div>
</div> 
<!-- MODAL ELIMINAR USUARIO -->
<div class="modal fade" id="modal_eliminar_usuario" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-danger  text-white">
                <h5 class="modal-title" id="staticBackdropLabel" draggable="true">ELIMINAR USUARIO</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <form id="form_eliminar_usuario"> 
                    <div class="alert alert-danger" role="alert">
                        <p class="font-weight-bold">¿Está seguro de que desea eliminar este usuario?</p>
                        <p class="font-italic">Esta acción no se puede deshacer.</p>
                        <input type="text" name="id_delete" class="id" hidden>
                    </div>
                </form>
            </div>
            <div class="modal-footer button_flex">
                <button type="button" class="btn btn-danger button_style_2" onclick="delete_user()" data-dismiss="modal">Eliminar</button>
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