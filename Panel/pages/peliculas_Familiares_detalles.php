<?php

require('../../helpers/menu_panel.php');

require('../../helpers/funciones_generales.php');

session_start();

if (!isset($_SESSION['idUsuario'])) {
  echo '<script>
              alert("Error, no ha iniciado sesión y no se puede redirigir a la página deseada.");
              window.location = "../../usuario/login.php";
              </script>';
} 


$idPelicula = $_GET["idPelicula"];

if (empty($idPelicula)) {
  echo '<script>
                alert("Error, el usuario no se encontro");
                window.location = "./peliculas_Familiares.php";
                </script>';
} 
else {
  
  include '../backend/admin/conexion.php';
  
  $query_select = 'SELECT * FROM peliculas WHERE idPelicula = ' . $idPelicula;
  
  $query_res = mysqli_query($conexion, $query_select);
  $usuario = mysqli_fetch_array($query_res, MYSQLI_ASSOC);
  
  if (mysqli_num_rows($query_res) <= 0) {
    echo '<script>
                alert("El usuario no existe. Verifica la ID");
                window.location = "./peliculas_Familiares.php";
                </script>';
  } 
  
  mysqli_close($conexion);
  
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard | Detalles de la película</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https:
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https:
  <!-- Ionicons -->
  <link rel="stylesheet" href="https:
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo $root_specific_panel . 'plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'; ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo $root_specific_panel . 'plugins/icheck-bootstrap/icheck-bootstrap.min.css'; ?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo $root_specific_panel . 'plugins/jqvmap/jqvmap.min.css'; ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $root_specific_panel . 'css/adminlte.min.css'; ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo $root_specific_panel . 'plugins/overlayScrollbars/css/OverlayScrollbars.min.css'; ?>">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="../img/carga.gif" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-navicon"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Fullscreen -->
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button" data-toggle="tooltip" data-placement="top" title="Fullscreen">
            <i class="fa fa-arrows-alt"></i>
          </a>
        </li>
        <!-- Perfil -->
        <li class="nav-item">
        <?php
          $html = '';
          $html .= '  <a class="nav-link" href="./perfil.php?idUsuario=' . $_SESSION["idUsuario"] . '" role="button" data-toggle="tooltip" data-placement="top" title="Mi perfil">
            <i class="fa fa-user"></i></a> ';
          echo $html;
          ?>
        </li>
        <!-- Logout -->
        <li class="nav-item">
          <a class="nav-link" href="../backend/admin/cerrar_sesion.php" role="button" data-toggle="tooltip" data-placement="top" title="Cerrar sesión">
            <i class="fa fa-lock    "></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" -->
        <!-- style="opacity: .8"> -->
        <span class="brand-text font-weight-light">C I N E J E D</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../img/<?php echo $_SESSION["imagenPerfil"]; ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
          <?php
          $html = '';
          $html .= ' <b><a class="d-block" href="./perfil.php?idUsuario='. $_SESSION["idUsuario"].'">'. $_SESSION["nombreCompleto"].'</a></b>
                        <a href="./perfil.php?idUsuario='. $_SESSION["idUsuario"].'" class="d-block">'.$_SESSION["rol"].'</a>
          ';
          echo $html;
          ?>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <?php echo crear_menu_panel('peliculas', 'familiares'); ?>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Detalles de la película</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="./dashboard.php">Inicio</a></li>
                <li class="breadcrumb-item"><a href="./usuarios.php">Películas familiares</a></li>
                <li class="breadcrumb-item active">Detalles de la película</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- jquery validation -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Formulario de pelicula detalles</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="form-usuario" action="../backend/crud/peliculasFamiliares/updatePeliculaFamiliar.php" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <center>
                          <img src="<?php echo ($usuario['imagenPelicula'] == NULL) ? '../img/no-disponible.jpg' : '../img/' . $usuario['imagenPelicula']; ?>" class="img-rounded" alt="" id="img-preview" width="40%">
                        </center>
                      </div>
                    </div>
                    <input type="hidden" value="<?php echo $usuario['imagenPelicula']; ?>" name="foto_perfil_actual">
                    <br>
                    <input type="hidden" value="<?php echo $usuario['idPelicula']; ?>" name="idPelicula">
                    <input type="hidden" value="<?php echo $usuario['genero']; ?>" name="genero">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nombre de la película</label>
                          <input type="text" value="<?php echo $usuario['nombrePelicula']; ?>" name="nombre" class="form-control" id="nombre" placeholder="Nombre de la película">
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Descripción</label>
                          <textarea type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Descripción de la película" rows="3"><?php echo $usuario['descripcion']; ?></textarea>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Duración</label>
                          <input type="text" value="<?php echo $usuario['duracion']; ?>" name="duracion" class="form-control" id="duracion" placeholder="Duración de la película">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Director</label>
                          <input type="text" value="<?php echo $usuario['director']; ?>" name="director" class="form-control" id="director" placeholder="Protagonistas de la película">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Estatus</label>
                          <select class="form-control" name="estatus">
                            <option value="">Seleccionar un estado</option>
                            <option value="2" <?php echo ($usuario['estatus_pelicula'] == 2) ? 'selected' : ''; ?>>Inactiva</option>
                            <option value="1" <?php echo ($usuario['estatus_pelicula'] == 1) ? 'selected' : ''; ?>>Activa</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Año de estreno</label>
                          <input type="text" value="<?php echo $usuario['anioEstreno']; ?>" name="anioEstreno" class="form-control" id="anioEstreno" placeholder="Año de estreno">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <label for="exampleInputEmail1">Foto de portada</label>
                        <input type="file" name="foto_perfil" onchange="previsualizar_imagen('previsualizar_imagen','foto-input')" class="form-control" id="foto-input">
                      </div>
                    </div>

                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Editar</button>
                    <a href="./dashboard.php" class="btn btn-danger">Cancelar</a>
                  </div>
                </form>
              </div>
              <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>


    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2021 <a href="https:
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?php echo $root_specific_panel . 'plugins/jquery/jquery.min.js'; ?>"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo $root_specific_panel . 'plugins/jquery-ui/jquery-ui.min.js'; ?>"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo $root_specific_panel . 'plugins/bootstrap/js/bootstrap.bundle.min.js'; ?>"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?php echo $root_specific_panel . 'plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'; ?>">
  </script>
  <!-- Summernote -->
  <script src="<?php echo $root_specific_panel . 'plugins/summernote/summernote-bs4.min.js'; ?>"></script>
  <!-- overlayScrollbars -->
  <script src="<?php echo $root_specific_panel . 'plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'; ?>">
  </script>
  <!-- AdminLTE App -->
  <script src="<?php echo $root_specific_panel . 'js/adminlte.js'; ?>"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo $root_specific_panel . 'js/demo.js'; ?>"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?php echo $root_specific_panel . 'js/pages/dashboard.js'; ?>"></script>
  <!-- Jquery -->
  <script src="<?php echo $root_specific_panel . 'plugins/jquery-validation/jquery.validate.min.js'; ?>"></script>
  <script src="<?php echo $root_specific_panel . 'plugins/jquery-validation/additional-methods.min.js'; ?>"></script>
  <!-- Jquery Specific Validation -->
  <script src="../js/usuario_detalles.js"></script>
</body>

</html>