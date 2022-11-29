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
} //

//Capturamos el id que se pasa por el URL
$idProyeccion = $_GET["idProyeccion"];
$idHorario = $_GET["idHorario"];

$idSala = $_GET["idSala"];
//Verificamos si la variable no esta vacia
if (empty($idProyeccion)) {
  echo '<script>
                alert("Error, el usuario no se encontro");
                window.location = "./proyeccion.php";
                </script>';
} //end empty
else {
  //Se incoorpora la conexion
  include '../backend/admin/conexion.php';
  //Se prepara la consulta para realizar la peticion
  $query_select = 'SELECT * FROM salaproyectapeliculas INNER JOIN peliculas INNER JOIN horariopeliculas INNER JOIN sala INNER JOIN sucursal
                  ON salaproyectapeliculas.idPelicula = peliculas.idPelicula AND salaproyectapeliculas.idHorario = horariopeliculas.idHorario AND salaproyectapeliculas.idSala = sala.idSala AND sala.idSucursal = sucursal.idSucursal
                  WHERE idProyeccion = ' . $idProyeccion;
  //Petición del sql a la BD
  $query_res = mysqli_query($conexion, $query_select);
  $usuario = mysqli_fetch_array($query_res, MYSQLI_ASSOC);

  $horarios = array();
  $query_horarios = 'SELECT horaProyeccion FROM horariopeliculas;';
  $query_resHorarios = mysqli_query($conexion, $query_horarios);
  if (mysqli_num_rows($query_resHorarios) != 0) {
    while ($horariosPeliculas = mysqli_fetch_array($query_resHorarios, MYSQLI_ASSOC)) {
      $horarios[] = $horariosPeliculas;
    }
  }

  $sucursales = array();
  $query_sucursales = 'SELECT nombreSucursal FROM sucursal;';
  $query_resSucursales = mysqli_query($conexion, $query_sucursales);
  if (mysqli_num_rows($query_resSucursales) != 0) {
    while ($nomSucursales = mysqli_fetch_array($query_resSucursales, MYSQLI_ASSOC)) {
      $sucursales[] = $nomSucursales;
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

  //print("<pre>".print_r($sucursales, true)."</pre>");
  //Verificar si realmente el usuario existe
  if (mysqli_num_rows($query_res) <= 0) {
    echo '<script>
                alert("El usuario no existe. Verifica la ID");
                window.location = "./usuarios.php";
                </script>';
  } //
  //Se libera la conexion
  mysqli_close($conexion);
  // print("<pre>".print_r($usuario,true)."</pre>");
} //end else
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard | Detalles de proyección</title>

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
          <a class="nav-link" href="#" role="button" data-toggle="tooltip" data-placement="top" title="Mi perfil">
            <i class="fa fa-user"></i>
          </a>
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
            <img src="<?php echo $_SESSION["imagenPerfil"]; ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $_SESSION["nombreCompleto"]; ?></a>
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
              <h1 class="m-0 text-dark">Detalles de la proyeccion</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="./dashboard.php">Inicio</a></li>
                <li class="breadcrumb-item"><a href="./proyeccion.php">Proyecciones</a></li>
                <li class="breadcrumb-item active">Detalles de proyeccion</li>
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
                  <h3 class="card-title">Formulario de detalles</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="form-usuario" action="../backend/crud/proyecciones/updateProyeccion.php" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <br>
                    <input type="hidden" value="<?php echo $usuario['idProyeccion']; ?>" name="idProyeccion">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Película proyectada</label>
                          <input type="text" value="<?php echo $usuario['nombrePelicula']; ?>" name="nombrePelicula" class="form-control" id="nombrePelicula" placeholder="Nombre de película" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Horario</label>
                          <select class="form-control" name="horaProyeccion">
                            <option value="">Seleccionar un horario</option>
                            <?php
                            $html = '';
                            if (isset($horarios) && sizeof($horarios) > 0) {
                              foreach ($horarios as $horariosPeliculas) {
                                $html .= '
                                  <option> ' . $horariosPeliculas['horaProyeccion'] . ' </option>
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
                          <label for="exampleInputEmail1">Sucursal</label>
                          <select class="form-control" name="sucursal">
                            <option value="">Seleccionar un rol</option>
                            <?php
                            $html = '';
                            if (isset($sucursales) && sizeof($sucursales) > 0) {
                              foreach ($sucursales as $nSucursales) {
                                $html .= '
                                  <option> ' . $nSucursales['nombreSucursal'] . ' </option>
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
                          <label for="exampleInputEmail1">Tipo de sala</label>
                          <select class="form-control" name="tipoSala">
                            <option value="">Seleccionar un rol</option>
                            <?php
                            $html = '';
                            if (isset($tipoSalas) && sizeof($tipoSalas) > 0) {
                              foreach ($tipoSalas as $tipoSala) {
                                $html .= '
                                  <option> ' . $tipoSala['tipoSala'] . ' ' . $tipoSala['nombreSucursal'] . '</option>
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
                    <button type="submit" class="btn btn-primary">Editar</button>
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
  <script src="../js/usuario_detalles.js"></script>
</body>

</html>