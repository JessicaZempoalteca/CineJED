<?php
require('../../helpers/menu_portal.php');
require('../../helpers/funciones_generales.php');


//Declaración de variables par la conexion con la BD
session_start();
//Validamos si la posicion existe y ya tiene un valor determinado por la consulta
if (!isset($_SESSION['idUsuario'])) {
  echo '<script>
              alert("Error, no ha iniciado sesión y no se puede redirigir a la página deseada.");
              window.location = "../../usuario/login.php";
              </script>';
} //

//Capturamos el id que se pasa por el URL
$idPelicula = $_GET["idPelicula"];
//Verificamos si la variable no esta vacia
if (empty($idPelicula)) {
  include '../backend/admin/conexion.php';

  $usuarios = array();
  $query_usuarios = 'SELECT CONCAT(nombre, " ", ApellidoPaterno, " ", apellidoMaterno) as nombreCompleto FROM usuarios WHERE idUsuario!="' . $_SESSION['idUsuario'] . '";';
  $query_resUsuarios = mysqli_query($conexion, $query_usuarios);
  if (mysqli_num_rows($query_resUsuarios) != 0) {
    while ($usuario = mysqli_fetch_array($query_resUsuarios, MYSQLI_ASSOC)) {
      $usuarios[] = $usuario;
    }
  }

  $peliculas = array();
  $query_peliculas = 'SELECT peliculas.nombrePelicula FROM salaproyectapeliculas INNER JOIN peliculas ON salaproyectapeliculas.idPelicula=peliculas.idPelicula;';
  $query_respeliculas = mysqli_query($conexion, $query_peliculas);
  if (mysqli_num_rows($query_respeliculas) != 0) {
    while ($peliculasPro = mysqli_fetch_array($query_respeliculas, MYSQLI_ASSOC)) {
      $peliculas[] = $peliculasPro;
    }
  }

  $horarios = array();
  $query_horarios = 'SELECT horariopeliculas.horaProyeccion FROM salaproyectapeliculas INNER JOIN horariopeliculas INNER JOIN peliculas ON salaproyectapeliculas.idHorario=horariopeliculas.idHorario AND salaproyectapeliculas.idPelicula=peliculas.idPelicula;';
  $query_reshorarios = mysqli_query($conexion, $query_horarios);
  if (mysqli_num_rows($query_reshorarios) != 0) {
    while ($horariosPel = mysqli_fetch_array($query_reshorarios, MYSQLI_ASSOC)) {
      $horarios[] = $horariosPel;
    }
  }
} else {
  //Se incoorpora la conexion
  include '../backend/admin/conexion.php';
  $usuarios = array();
  $query_usuarios = 'SELECT CONCAT(nombre, " ", ApellidoPaterno, " ", apellidoMaterno) as nombreCompleto FROM usuarios WHERE idUsuario!="' . $_SESSION['idUsuario'] . '";';
  $query_resUsuarios = mysqli_query($conexion, $query_usuarios);
  if (mysqli_num_rows($query_resUsuarios) != 0) {
    while ($usuario = mysqli_fetch_array($query_resUsuarios, MYSQLI_ASSOC)) {
      $usuarios[] = $usuario;
    }
  }

  $peliculas = array();
  $query_peliculas = 'SELECT peliculas.nombrePelicula, salaproyectapeliculas.idProyeccion, salaproyectapeliculas.idPelicula FROM salaproyectapeliculas INNER JOIN peliculas ON salaproyectapeliculas.idPelicula=peliculas.idPelicula;';
  $query_respeliculas = mysqli_query($conexion, $query_peliculas);
  if (mysqli_num_rows($query_respeliculas) != 0) {
    while ($peliculasPro = mysqli_fetch_array($query_respeliculas, MYSQLI_ASSOC)) {
      $peliculas[] = $peliculasPro;
    }
  }

  $horarios = array();
  $query_horarios = 'SELECT horariopeliculas.horaProyeccion FROM salaproyectapeliculas INNER JOIN horariopeliculas INNER JOIN peliculas ON salaproyectapeliculas.idHorario=horariopeliculas.idHorario AND salaproyectapeliculas.idPelicula=peliculas.idPelicula;';
  $query_reshorarios = mysqli_query($conexion, $query_horarios);
  if (mysqli_num_rows($query_reshorarios) != 0) {
    while ($horariosPel = mysqli_fetch_array($query_reshorarios, MYSQLI_ASSOC)) {
      $horarios[] = $horariosPel;
    }
  }
} //

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Películas de estreno</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="./assets/Vector-Cinema-Projector-PNG-File.png" />
  <!-- Font Awesome icons (free version)-->
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="../resources/css/styles.css" rel="stylesheet">
  <link rel="stylesheet" href="../resources/css/estilos.css">
  <link rel="shortcut icon" href="../img/boletosLogo.png">
  <!--FONT DE NAVBAR -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Mende+Kikakui&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>

<body id="page-top">

  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" style="background-color: #010101;">
    <div class="container nav">
      <a class="navbar-brand" href="../../index.php"><img src="../img/cineLogo.png" alt="..." /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars ms-1"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <?php echo crear_menuUser('pages', 'estrenos'); ?>
      </div>
      <div class="collapse navbar-collapse" id="navbarResponsive" style="font-family: 'Noto Sans Mende Kikakui', sans-serif;">
        <a href="../backend/admin/cerrar_sesion.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
      </div>
    </div>
  </nav>

  <!-- Masthead-->
  <header">
    </header>
    <br>
    <br>
    <br>

    <!-- Main content -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-4">
            <div class="login-wrap p-4 p-md-8">
              <img src="../img/cineee.png" alt="logo" style="width:400px;">
            </div>
          </div>
          <div class="col-md-8">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Pago de boletos</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <!--el id es para referenciar las validaciones
                        action es para el redireccionamiento del proceso del BACKEND
                        el metodo post es para enviar datos de manera segura
                        enctype envia y procesa informacion mediante los archivos por medio del metodo $_FILES-->
              <form id="form-usuario" action="../backend/crud/boletos/insertBoleto.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <br>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Peliculas disponibles</label>
                        <select class="form-control" name="pelicula">
                          <option value="">Selecciona una pelicula</option>
                          <?php
                          $html = '';
                          if (isset($peliculas) && sizeof($peliculas) > 0) {
                            foreach ($peliculas as $peliculas) {
                              $selected = ($peliculas['idPelicula'] == $idPelicula) ? 'selected' : '';
                              $html .= '
                                  <option value=' . $peliculas['idPelicula'] . ' ' . $selected . '> ' . $peliculas['nombrePelicula'] . ' </option>
                                ';
                            }
                          }
                          echo $html;
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Número de asientos</label>
                        <input type="number" name="numAsientos" class="form-control" id="numAsientos" placeholder="Asientos">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Fecha</label>
                        <input type="date" name="fechaBoleto" class="form-control" id="fechaBoleto" placeholder="fecha">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <br>
                      <label for="exampleInputEmail1">Horario</label>
                      <select class="form-control" name="horario">
                        <option value="">Selecciona un horario disponible</option>
                        <?php
                        $html = '';
                        if (isset($horarios) && sizeof($horarios) > 0) {
                          foreach ($horarios as $horarios) {
                            $html .= '
                                  <option> ' . $horarios['horaProyeccion'] . ' </option>
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
              <button type="submit" class="btn btn-primary">Comprar</button>
              <a href="./boletos.php" class="btn btn-danger">Cancelar</a>
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
      </div>
      <!-- /.container-fluid -->
    </section>


    <!-- Footer-->
    <footer class="py-2 bg-dark text-write">
      <div class="container no-width">
        <div class="row no-gutters my-5">
          <div class="col-12 col-lg-4">
            <div class="pr-lg-5 pb-5">
              <p class="h1 sc-bwzfXH cEFPpN">
                <small>Atención telefónica</small>
                <br>
                <a href="tel:5552576969" class="text-white">
                  <strong>246 175 9822</strong>
                </a>
              </p>
            </div>
            <div class="pr-lg-5 pt-5 border-top border-secondary">
              <div class="d-flex justify-content-between">
                <a class="btn btn-outline-white btn-icon-circle" href="http://www.facebook.com/pages/Cinemex/83988183288" target="_blank" rel="noopener noreferrer">
                  <i class="fab fa-fw fa-facebook-f">
                  </i>
                </a>
                <a class="btn btn-outline-white btn-icon-circle" href="https://twitter.com/cinemex" target="_blank" rel="noopener noreferrer">
                  <i class="fab fa-fw fa-twitter">
                  </i>
                </a>
                <a class="btn btn-outline-white btn-icon-circle" href="https://instagram.com/cinemex" target="_blank" rel="noopener noreferrer">
                  <i class="fab fa-fw fa-instagram">
                  </i>
                </a>
                <a class="btn btn-outline-white btn-icon-circle" href="https://www.youtube.com/channel/UCK7DXWnJJarFsyu3-kADUsg" target="_blank" rel="noopener noreferrer">
                  <i class="fab fa-fw fa-youtube">
                  </i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-4">
            <div class="px-5 py-5 py-lg-0 my-5 my-lg-0 sc-bxivhb hgSmeg">
              <ul class="font-weight-light small py-2">
                <li class="nav-item">
                  <a class="nav-link py-1 text-white" href="/nosotros">Sobre CineJED</a>
                </li>
                <li class="nav-item"><a class="nav-link py-1 text-white" href="/landing/privacidad-cinefan/privacidad-cinefan">Términos y condiciones Cinefan</a></li>
                <li class="nav-item"><a class="nav-link py-1 text-white" href="/politica-precios">Política de precios</a></li>
                <li class="nav-item"><a class="nav-link py-1 text-white" href="/politica-de-reembolsos">Política de reembolsos</a></li>
                <li class="nav-item"><a class="nav-link py-1 text-white" href="http://cinemex.bumeran.com.mx/" target="_blank" rel="noopener noreferrer">Bolsa de trabajo corporativo</a></li>
                <li class="nav-item"><a class="nav-link py-1 text-white" href="/terminos">Términos y condiciones</a></li>
                <li class="nav-item"><a class="nav-link py-1 text-white" href="/privacidadvisitantes">Aviso de Privacidad</a></li>
                <li class="nav-item"><a class="nav-link py-1 text-white" href="/empleos/formulario">Bolsa de trabajo cines</a></li>
              </ul>
            </div>
          </div>
          <div class="col-12 col-lg-4">
            <div class="d-flex justify-content-around justify-content-lg-between align-items-center pl-lg-5 pb-5">
              <a class="sc-bdVaJa jeNtWj" href="https://itunes.apple.com/mx/app/cinemex/id418163740" target="_blank" rel="noopener noreferrer">
                <img src="https://s3.amazonaws.com/statics3.cinemex.com/v2/dist/images/logo-app-store.png" class="img-fluid1" alt="App Store"></a>
              <a class="sc-bdVaJa jeNtWj" href="https://play.google.com/store/apps/details?id=com.cinemex&amp;hl=es" target="_blank" rel="noopener noreferrer">
                <img src="https://s3.amazonaws.com/statics3.cinemex.com/v2/dist/images/logo-google-play.png" class="img-fluid1" alt="Google Play"></a>
            </div>
            <div class="pt-5 border-top border-secondary">
              <div class="d-flex flex-wrap flex-md-nowrap justify-content-around justify-content-lg-between align-items-center pl-lg-5">
                <a href="https://www.fundaciongrupomexico.org/programas/Paginas/concienciaCinemex.aspx" target="_blank" rel="noopener noreferrer" class="m-2 mb-4">
                  <img src="https://s3.amazonaws.com/statics3.cinemex.com/v2/dist/images/logo-conciencia-cinemex.png" class="img-fluid1" alt="Conciencia Cinemex"></a>
                <a href="http://www.canacine.org.mx/" target="_blank" rel="noopener noreferrer" class="m-2 mb-4">
                  <img src="https://s3.amazonaws.com/statics3.cinemex.com/v2/dist/images/logo-canacine.png" class="img-fluid1" alt="Canacine"></a>
                <a href="http://www.alboa.com.mx/?utm_source=cinemex" target="_blank" rel="noopener noreferrer" class="m-2 mb-4">
                  <img src="https://s3.amazonaws.com/statics3.cinemex.com/v2/dist/images/logo-alboa.png" class="img-fluid1" alt="Alboa"></a>
                <a href="https://gamersarena.com.mx/?utm_source=cinemex" target="_blank" rel="noopener noreferrer" class="m-2 mb-4">
                  <img src="https://s3.amazonaws.com/statics3.cinemex.com/v2/dist/images/logo-arena.png" class="img-fluid1" alt="Gamers Arena"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="../resources/js/scripts.js"></script>
    <script src="../js/fechaBoleto.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>