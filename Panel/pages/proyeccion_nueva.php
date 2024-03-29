<?php
//Crea el menú
require('../../helpers/menu_panel.php');
//Importa la ruta dependiendo de la carpeta
require('../../helpers/funciones_generales.php');
//Se utiliza las variables de sesion
session_start();
//Validamos si la posicion existe y ya tiene un valor determinado por la consulta
if (!isset($_SESSION['idUsuario'])) {
    echo '<script>
              alert("Error, no ha iniciado sesión y no se puede redirigir a la página deseada.");
              window.location = "../../usuario/login.php";
              </script>';
}else{
    include '../backend/admin/conexion.php';

    $peliculas = array();
    $query_peliculas = 'SELECT idPelicula, nombrePelicula FROM peliculas;';
    $query_respeliculas = mysqli_query($conexion, $query_peliculas);
    if (mysqli_num_rows($query_respeliculas) != 0) {
      while ($peliculasPeliculas = mysqli_fetch_array($query_respeliculas, MYSQLI_ASSOC)) {
        $peliculas[] = $peliculasPeliculas;
      }
    }
    
    $horarios = array();
  $query_horarios = 'SELECT idHorario, horaProyeccion FROM horariopeliculas;';
  $query_resHorarios = mysqli_query($conexion, $query_horarios);
  if (mysqli_num_rows($query_resHorarios) != 0) {
    while ($horariosPeliculas = mysqli_fetch_array($query_resHorarios, MYSQLI_ASSOC)) {
      $horarios[] = $horariosPeliculas;
    }
  }
  
    $tipoSalas = array();
    $query_tipoSalas = 'SELECT sala.idSala, sala.tipoSala, sucursal.nombreSucursal FROM sala INNER JOIN sucursal
                        ON sala.idSucursal = sucursal.idSucursal;';
    $query_restipoSalas = mysqli_query($conexion, $query_tipoSalas);
    if (mysqli_num_rows($query_restipoSalas) != 0) {
      while ($salas = mysqli_fetch_array($query_restipoSalas, MYSQLI_ASSOC)) {
        $tipoSalas[] = $salas;
      }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Nueva proyección</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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
            <img class="animation__shake" src="../img/carga.gif" alt="AdminLTELogo" height="100" width="100">
            <video src=""></video>
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
                    <?php echo crear_menu_panel('proyeccion'); ?>
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
                            <h1 class="m-0 text-dark">Proyección nueva</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="./dashboard.php">Inicio</a></li>
                                <li class="breadcrumb-item"><a href="./sucursales.php">Proyecciones de peliculas</a></li>
                                <li class="breadcrumb-item active">Nueva proyeccion</li>
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
                                    <h3 class="card-title">Formulario de nueva proyección</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <!--el id es para referenciar las validaciones
                        action es para el redireccionamiento del proceso del BACKEND
                        el metodo post es para enviar datos de manera segura
                        enctype envia y procesa informacion mediante los archivos por medio del metodo $_FILES-->
                        <form id="form-usuario" action="../backend/crud/proyecciones/insertProyeccion.php" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <br>
                    <input type="hidden" value="<?php echo $usuario['idProyeccion']; ?>" name="idProyeccion">

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Película que será proyectada</label>
                          <select class="form-control" name="pelicula">
                            <option value="">Seleccionar un horario</option>
                          <?php
                            $html = '';
                            if (isset($peliculas) && sizeof($peliculas) > 0) {
                              foreach ($peliculas as $nomPeliculas) {
                                $html .= '
                                  <option value="'.$nomPeliculas['idPelicula'].'"> ' . $nomPeliculas['nombrePelicula'] . ' </option>
                                ';
                              }
                            }
                            echo $html;
                            ?>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Horario</label>
                          <select class="form-control" name="horario">
                            <option value="">Seleccionar un horario</option>
                            <?php
                            $html = '';
                            if (isset($horarios) && sizeof($horarios) > 0) {
                              foreach ($horarios as $horariosPeliculas) {
                                $html .= '
                                  <option value="'.$horariosPeliculas['idHorario'].'">'.$horariosPeliculas['horaProyeccion'].'</option>
                                ';
                              }
                            }
                            echo $html;
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Sala</label>
                          <select class="form-control" name="tipoSala">
                            <option value="">Seleccionar un rol</option>
                            <?php
                            $html = '';
                            if (isset($tipoSalas) && sizeof($tipoSalas) > 0) {
                              foreach ($tipoSalas as $tipoSala) {
                                $html .= '
                                  <option value="'.$tipoSala['idSala'].'"> ' . $tipoSala['idSala'] . ' ' . $tipoSala['tipoSala'] . ' ' . $tipoSala['nombreSucursal'] . '</option>
                                ';
                              }
                            }
                            echo $html;
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>

                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="./proyeccion.php" class="btn btn-danger">Cancelar</a>
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
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
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
    <script src="../js/usuario_nuevo.js"></script>
</body>

</html>