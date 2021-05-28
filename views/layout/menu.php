<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="title">MIINERVA</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="<?php echo $_SESSION['usu_foto']; ?>" class="img-circle elevation-2 img_user" alt="User Image">
        </div>
        <center>
        <div class="info">
            <h7><a href="#" class="d-block name_user"> <?php echo $_SESSION['nom_app']; ?></a></h7>
            <h7><a href="#" class="d-block rol_user"><?php echo $_SESSION['nameRol']; ?></a></h7>
        </div>
        </center>
    </div>
    <?php
      if ($_SESSION['nameRol']=='Administrador') {
        include('admin.php');
      }elseif ($_SESSION['nameRol']=='Jefe de Bodega') {
        include('jefebodega.php');
      }elseif ($_SESSION['nameRol']=='Secretario de Infraestructura') {
        include('secretario.php');
      }elseif ($_SESSION['nameRol']=='Subsecretario') {
        include('subsecre.php');
      }else{
        include('gestorvial.php');
      }
    ?>
    </div>
    <!-- /.sidebar -->
  </aside>