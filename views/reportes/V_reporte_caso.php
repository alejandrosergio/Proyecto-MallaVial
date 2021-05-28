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
                <li class="breadcrumb-item active">Reportes de Casos</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div id="logReporteCaso">
    <div class="style">
    <div class="pene">
    <!-- /.content-header -->
    <!-- Main content -->
    <h1>REPORTE DE CASOS</h1>
        <div class="reporte_container">
        <span class="obligatorio2">Campos Obligatorios (*)</span>
        <form id="form_reporte_caso">
        <h2 class="fecha_reporte">FECHAS</h2>
            <div class="form-row">
                <div class="form-group col-md-6">
                <span class="obligatorio">(*)</span><label>Fecha Inicial</label>
                <input type="date" id="fecha1Caso" class="form-control reporte_input" name="fecha1" required>
                </div>
                <div class="form-group col-md-6">
                <span class="obligatorio">(*)</span><label>Fecha Final</label>
                <input type="date" id="fecha2Caso" class="form-control reporte_input" name="fecha2" required>
                </div>
                <div class="form-group col-md-6">
                </div>
            </div>
            <button type="button" class="btn btn-primary buton_reporte" onclick="ajax_reporte_caso() , ver_reporte_caso()">
                Generar Reporte
            </button>
            <button type="button" hidden id="ver_button_reporte"  class="btn btn-success buton_reporte" data-toggle="modal" data-target="#modal_reporte_caso">
                Detalle del Reporte
            </button>
            </form>
        </div>
    </div>
    </div>
    </div>
</div>
    <!-- /.content -->
    </div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modal_reporte_caso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header bg-success text-white">
            <h5 class="modal-title" id="exampleModalLabel">REPORTES DE CASOS GENERADOS</h5>
            </button>
        </div>
        <div class="modal-body">
            <div id="table_reporte_caso"></div>
        </div>
        <div class="modal-footer">
            <button type="button" onclick="cerrar_reporte_caso()"  class="btn btn-success detalle_style" data-dismiss="modal">CERRAR</button>
        </div>
        </div>
    </div>
</div>