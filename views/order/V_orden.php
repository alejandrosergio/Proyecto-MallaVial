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
                <li class="breadcrumb-item active">Orden de Mantenimiento</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>            
    <!-- /.content-header -->
    <!-- Main content -->
<!-- PESTAÑAS DE ORDEN -->
<div class="style">
<nav>
    <div class="nav nav-tabs paginacion_ventanas" id="nav-tab" role="tablist">
    <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Crear Orden</a>
        <a class="nav-link" id="nav-pendiente-tab" data-toggle="tab" href="#nav-pendiente" role="tab" aria-controls="nav-pendiente" aria-selected="false">Ordenes Pendientes</a>
        <a class="nav-link" id="nav-proceso-tab" data-toggle="tab" href="#nav-proceso" role="tab" aria-controls="nav-proceso" aria-selected="false">Ordenes en Proceso</a>
        <a class="nav-link" id="nav-realizada-tab" data-toggle="tab" href="#nav-realizada" role="tab" aria-controls="nav-realizada" aria-selected="false">Ordenes Realizadas</a>
    </div>
</nav>
<div class="tab-content contend-fyxed" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <?php 
            include("V_anexar_casos.php"); 
        ?>
    </div>
    <div class="tab-pane fade" id="nav-pendiente" role="tabpanel" aria-labelledby="nav-pendiente-tab">
        <?php
            include("V_maintenance_order_pending.php");
        ?>
    </div>
    <div class="tab-pane fade" id="nav-proceso" role="tabpanel" aria-labelledby="nav-proceso-tab">
        <?php
            include("V_maintenance_order_process.php");
        ?>
    </div>
    <div class="tab-pane fade" id="nav-realizada" role="tabpanel" aria-labelledby="nav-realizada-tab">
        <?php 
            include("V_maintenance_order_performed.php");
        ?>
    </div>
</div>           
<!-- THEND PESTAÑA -->
</div>
<!-- THEND STYLE -->
<!-- /.content -->
    </div>
<!-- /.content-wrapper -->