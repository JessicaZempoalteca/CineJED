<?php
  require('../../helpers/menu_panel.php');
  //Importa la ruta dependiendo de la carpeta
  require('../../helpers/funciones_generales.php');
  //Se utiliza las variables de sesion
  session_start();

  //Validamos si la posicion existe y ya tiene un valor determinado por la consulta
  if(!isset($_SESSION['idUsuario'])){
      echo '<script>
              alert("Error al mostrar la informació de este módulo, contacta al administrador");
              window.location = "../../usuario/login.php";
              </script>';
  }//end  if
  else {
    //Importamos la libreria de conexion
    include '../backend/admin/conexion.php';

    //Se realiza la petición sql 
    //specific select ya que se muestra informacion especifica de la tabla usuarios inner join roles
    $query_text = 'SELECT usuarios.nombre, usuarios.ApellidoPaterno, usuarios.apellidoMaterno, boleto.asiento, boleto.fecha, boleto.precio, peliculas.nombrePelicula, horarioPeliculas.horaProyeccion, sala.tipoSala
                    FROM boleto INNER JOIN salaproyectapeliculas INNER JOIN peliculas INNER JOIN horariopeliculas INNER JOIN usuarios INNER JOIN sala
                    ON boleto.idUsuario=usuarios.idUsuario AND boleto.idProyeccion=salaproyectapeliculas.idProyeccion AND salaproyectapeliculas.idPelicula=peliculas.idPelicula AND salaproyectapeliculas.idSala=sala.idSala
                    group by idBoleto;';

    // echo $query_text;

    //Se procesa con la consulta a la BD
    $query_res = mysqli_query($conexion, $query_text);

    //Arreglo temporal que almacenara la información
    $usuarios = array();

    //Se verifica si hay un resultado
    if(mysqli_num_rows($query_res) != 0){
      while($datos = mysqli_fetch_array($query_res, MYSQLI_ASSOC)){
        $usuarios[] = $datos; //dentro del arreglo guarda otro arreglo que son los datos del usuario de acuerdo a la consulta que se hizo
      }//end mientras sigan existiendo registros
    }//end if no hay resultados
    //Muestra el arreglo
    // print("<pre>".print_r($usuarios, true)."</pre>");
  }//end else 

  //ARREGLO ASOCIATIVO
  //es un arreglo que tiene como indice una cadena de texto de acuerdo a una llave de la tabla de la BD

?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Boletos</title>

    <!--RECURSOS PARA LOS ESTILOS DE LAS TABLAS-->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
      href="<?php echo $root_specific_panel.'plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'; ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo $root_specific_panel.'plugins/icheck-bootstrap/icheck-bootstrap.min.css'; ?>">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo $root_specific_panel.'plugins/jqvmap/jqvmap.min.css'; ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $root_specific_panel.'css/adminlte.min.css'; ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
      href="<?php echo $root_specific_panel.'plugins/overlayScrollbars/css/OverlayScrollbars.min.css'; ?>">
      <!-- Data Table -->
  <link rel="stylesheet"
      href="<?php echo $root_specific_panel.'plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'?>">
  <link rel="stylesheet"
      href="<?php echo $root_specific_panel.'plugins/datatables-responsive/css/responsive.bootstrap4.min.css'?>">
  <link rel="stylesheet"
      href="<?php echo $root_specific_panel.'plugins/datatables-buttons/css/buttons.bootstrap4.min.css'?>">
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
            <a class="nav-link" data-widget="fullscreen" href="#" role="button" data-toggle="tooltip" data-placement="top"
              title="Fullscreen">
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
            <img src="../img/<?php echo $_SESSION["imagenPerfil"];?>" class="img-circle elevation-2" alt="User Image">
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
            <?php echo crear_menu_panel('boletos');?>
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
                <h1 class="m-0 text-dark">Boletos</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="./dashboard.php">Inicio</a></li>
                  <li class="breadcrumb-item active">Boletos</li>
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
                    <div class="col-12">
                        <a href="./boleto_nuevo.php" class="btn btn-secondary btn-sm">Agregar nuevo</a><br><br>
                        <div class="card">
                            <div class="card-header">
                                <center>
                                    <h3 class="card-title">Lista de boletos vendidos</h3>
                                </center>
                            </div>
                            <div class="card-body">
                                <table id="table-usuarios" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Usuario</th>
                                            <th>Num asientos</th>
                                            <th>Fecha</th>
                                            <th>Precio</th>
                                            <th>Pelicula</th>
                                            <th>Hora</th>
                                            <th>Sala</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                          //Declaramos la variable para iterar a los usuarios
                                          $html = '';
                                          // print("<pre>".print_r($usuarios, true)."</pre>");

                                          //Verificamos que la variable ya este creada y que el tamaño debe de ser mayor a 0 - los registrps
                                          if(isset($usuarios) && sizeof($usuarios) > 0){
                                            //contador
                                              $num = 0;
                                            //foreach rompe el arreglo de usuarios que va mostrando la informacion
                                            foreach ($usuarios as $usuario) {
                                              $html.= '
                                                <tr>
                                                    <td>'.++$num.'</td>
                                                    <td>'.$usuario["nombre"].' '.$usuario["ApellidoPaterno"].' '.$usuario["apellidoMaterno"].'</td>
                                                    <td>'.$usuario["asiento"].'</td>
                                                    <td>'.$usuario["fecha"].'</td>
                                                    <td>'.$usuario["precio"].'</td>
                                                    <td>'.$usuario["nombrePelicula"].'</td>
                                                    <td>'.$usuario["horaProyeccion"].'</td>
                                                    <td>'.$usuario["tipoSala"].'</td>
                                                </tr>
                                              ';
                                            }//end foreach
                                          }//end if 
                                          echo $html;      
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      <!-- /.content -->
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
    <script src="<?php echo $root_specific_panel.'plugins/jquery/jquery.min.js';?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo $root_specific_panel.'plugins/jquery-ui/jquery-ui.min.js';?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo $root_specific_panel.'plugins/bootstrap/js/bootstrap.bundle.min.js';?>"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script
      src="<?php echo $root_specific_panel.'plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js';?>">
    </script>
    <!-- Summernote -->
    <script src="<?php echo $root_specific_panel.'plugins/summernote/summernote-bs4.min.js';?>"></script>
    <!-- overlayScrollbars -->
    <script src="<?php echo $root_specific_panel.'plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js';?>">
    </script>
    <!-- AdminLTE App -->
    <script src="<?php echo $root_specific_panel.'js/adminlte.js';?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo $root_specific_panel.'js/demo.js';?>"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo $root_specific_panel.'js/pages/dashboard.js';?>"></script>
    <!-- Data Table -->
    <script src="<?php echo $root_specific_panel.'plugins/datatables/jquery.dataTables.min.js';?>"></script>
    <script src="<?php echo $root_specific_panel.'plugins/datatables-bs4/js/dataTables.bootstrap4.min.js';?>"></script>
    <script src="<?php echo $root_specific_panel.'plugins/datatables-responsive/js/dataTables.responsive.min.js';?>"></script>
    <script src="<?php echo $root_specific_panel.'plugins/datatables-responsive/js/responsive.bootstrap4.min.js';?>"></script>
    <script src='../js/usuarios.js'></script>
  </body>

</html>