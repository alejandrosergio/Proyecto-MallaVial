<!DOCTYPE html>
<html>
<head>
  <!-- HEAD -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> MIINERVA </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="views/assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="icon" href="views/assets/img/VIA-icon.png">
  <!-- Tempusdominus Bbootstrap 4 -->
  <!-- <link rel="stylesheet" href="views/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> -->
  <!-- iCheck -->
  <!-- <link rel="stylesheet" href="views/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
  <!-- JQVMap -->
  <link rel="stylesheet" href="views/assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="views/assets/dist/css/adminlte.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="views/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="views/assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="views/assets/plugins/summernote/summernote-bs4.css">
  
  <!-- jQuery -->
<script src="views/assets/plugins/jquery/jquery-3.5.1.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="views/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- jQuery validate 1.19.3 -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 4 -->
<script src="views/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="views/assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="views/assets/plugins/sparklines/sparkline.js"></script>
<!-- jQuery Knob Chart -->
<script src="views/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="views/assets/plugins/moment/moment.min.js"></script>
<script src="views/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="views/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="views/assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="views/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- AdminLTE App -->
<script src="views/assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="views/assets/dist/js/demo.js"></script>

<!-- PERSONALES -->

    <!-- CSS BOOTSTRAP -->
    <!-- <link rel="stylesheet" href="views/assets/bootstrap/css/bootstrap.css"> -->
    <!-- CSS -->
    <link rel="stylesheet" href="views/assets/css/style.css"> 
    <!-- ICONS -->
    <link rel="stylesheet" href="views/assets/icons/css/all.min.css">
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="views/assets/datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="views/assets/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="views/assets/datatables/Responsive-2.2.7/css/responsive.dataTables.min.css">
    
  <!-- THEND HEAD -->
</head>
<body class="hold-transition sidebar-mini layout-fixed" >
<div class="wrapper" >
    <?php
    
      include('views/layout/encabezado.php');
      include('views/layout/menu.php');
      include('views/layout/button_ayuda.php');
      
      if(isset($_GET['ruta'])){
        if(
            $_GET['ruta']=="C_inicio"||
            $_GET['ruta']=="C_thirdparties"||
            $_GET['ruta']=="C_users"||
            $_GET['ruta']=="C_Tipo_documento"||
            $_GET['ruta']=="C_rol"||
            $_GET['ruta']=="C_suppliersListActive"||
            $_GET['ruta']=="C_Tipo_Maquinaria"||
            $_GET['ruta']=="C_Tipo_Zona"||
            $_GET['ruta']=="C_Tipo_Herramienta"||
            $_GET['ruta']=="C_Tipo_Material"||
            $_GET['ruta']=="C_machinery"||
            $_GET['ruta']=="C_ToolsListActive"||
            $_GET['ruta']=="C_material"||
            $_GET['ruta']=="C_cellar"||
            $_GET['ruta']=="C_Tipo_dano"||
            $_GET['ruta']=="C_inventario_consultar"||
            $_GET['ruta']=="C_registro_compras"||
            $_GET['ruta']=="C_reguistrar_anomalia"||
            $_GET['ruta']=="C_mis_reportes"||
            $_GET['ruta']=="C_caso"||
            $_GET['ruta']=="C_consultar_caso"||
            $_GET['ruta']=="C_ordenes_pestanas"||
            $_GET['ruta']=="C_reporte_caso1"||
            $_GET['ruta']=="C_reporte_orden"
            ){
          include('controllers/'.$_GET['ruta'].".php"); 
        }else{
          include('views/404.php');
        }
      }else{
        include('controllers/C_inicio.php');
      }
      include('views/layout/footer.php');
      ?>
  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- SCRIPTS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q==" crossorigin="anonymous"></script>

<!-- SCRIPTS BOOTSTRAP-->
    <script src="views/assets/bootstrap/js/popper.min.js"></script>
    <script src="views/assets/bootstrap/js/bootstrap.min.js"></script>

<!-- SCRIPTS PERSONALES-->
    <script src="views/assets/js/suppliers.js"></script>
    <script src="views/assets/js/thirdparties.js"></script>
    <script src="views/assets/js/inventario.js"></script>
    <script src="views/assets/js/rol.js"></script>
    <script src="views/assets/js/tipo_documento.js"></script>
    <script src="views/assets/js/tipo_daño.js"></script>
    <script src="views/assets/js/tipo_herramienta.js"></script>
    <script src="views/assets/js/tipo_zonas.js"></script>
    <script src="views/assets/js/tipo_material.js"></script>
    <script src="views/assets/js/tipo_maquinaria.js"></script>
    <script src="views/assets/js/tools.js"></script>
    <script src="views/assets/js/machinery.js"></script>
    <script src="views/assets/js/material.js"></script>
    <script src="views/assets/js/cellar.js"></script>
    <script src="views/assets/js/users.js"></script>
    <script src="views/assets/js/casos.js"></script>
    <script src="views/assets/js/order.js"></script>
    <script src="views/assets/js/reporte_orden.js"></script>
    <script src="views/assets/js/404.js"></script>
    <script src="views/assets/js/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="views/assets/js/sweetalert2/sweetalert2@10.js"></script>

<!-- SCRIPTS PLUGINS -->
    <script src="views/assets/js/general.js"></script>
    <!-- datatables JS -->
      <script type="text/javascript" src="views/assets/datatables/datatables.min.js"></script> 
      <script type="text/javascript" src="views/assets/datatables/Responsive-2.2.7/js/dataTables.responsive.min.js"></script>
</body>
</html>