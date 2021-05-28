
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
                <li class="breadcrumb-item active">Reportes de Ordenes</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <h1 class="tylte_rep">reportes de ordenes realizadas</h1><br>
<div class="pene">
    <form id="reporte_orden_form" >
    <div class="row">
    <div class="col-md-6">
        <label for="">Fecha inicio</label>
        <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio">
    </div>
    <div class="col-md-6">
        <label for="">Fecha Fin</label>
        <input type="date" class="form-control" name="fecha_fin" id="fecha_fin">
    </div>
</div>

</div>
<center>
<button type="submit" class="btn btn-success" id="button_buscar_ord">BUSCAR</button>
</center>
</form>
    <div id="reportes_orden"></div>
    </div>
    <!-- /.content -->
    </div>
<!-- /.content-wrapper -->