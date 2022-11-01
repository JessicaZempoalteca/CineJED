
<!doctype html>
<html lang="en">

<head>
    <title>Inicio de sesion</title>
    <link rel="icon" href="./img/usuario.png" type="img">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="../resources/css/styles.css" rel="stylesheet">
        <link rel="stylesheet" href="../resources/css/estilos.css">
        <link rel="shortcut icon" href="../img/boletosLogo.png">

</head>

<body>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" style="background-color: #010101;">
            <div class="container nav">
                <a class="navbar-brand" href="#page-top"><img src="../img/cineLogo.png" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <?php echo crear_menu('pages','login');?>
                </div>
            </div>
        </nav>

    <section class="ftco-section">
        <div class="container">
        <center>
            <img src="../img/registro.png" alt="logo" style="width:700px;">
        </center>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url('../img/CINEJED.png');">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4 text-center">INICIAR SESION
                                    <img src="../img/pelis.png" alt="logo" style="width:70px;"></h3>
                                </div>
                            </div>
                            <form action="#" class="signin-form">
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Usuario</label>
                                    <input type="text" class="form-control" placeholder="Usuario" value="" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Contraseña</label>
                                    <input type="password" class="form-control" placeholder="contraseña" value="" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">
                                        Ingresar
                                    </button>
                                </div>
                            </form>
                            <p class="text-center">¿Quieres ser registrarte? <br>
                            <center><nav>
                              <a href="../../user/registro/index.php"  href="#signup">Registrase ahora</a><img src="../img/regis.png" alt="logo" style="width:50px;"></p></nav>
                            </center></div>
                    </div>
                </div>
            </div>
        </div>
        <footer id="site-footer">
      <div class="footer-col">
        <div style="max-width: 160px;margin: 1em auto 0;">
          <a href="https://www.paypal.com/signin" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/signin','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img src="https://www.paypalobjects.com/webstatic/mktg/logo-center/logotipo_paypal_seguridad.png" border="0" alt="Aceptamos PayPal" style="max-width: 100%;"></a>
          <br>
          <a href="https://www.paypal.com/signin" style="color:#ffffff; font-size:0.75em">Cómo funciona PayPal</a>
        </div>
      </div>
</footer>
    </section>

    <script src="<?php echo $root_specific_user.'js/jquery.min.js';?>"></script>
    <script src="<?php echo $root_specific_user.'js/popper.js';?>"></script>
    <script src="<?php echo $root_specific_user.'js/bootstrap.min.js';?>"></script>
    <script src="<?php echo $root_specific_user.'js/main.js';?>"></script>

</body>
</html>