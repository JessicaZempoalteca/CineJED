<?php
require('../../helpers/menu_portal.php');
require('../../helpers/funciones_generales.php');

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Películas familiares</title>
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
                    <?php echo crear_menu('pages','peliculas');?>
                </div>
                <div class="collapse navbar-collapse" id="navbarResponsive" style="font-family: 'Noto Sans Mende Kikakui', sans-serif;">
                <a href="../../User/pages/login.php"><span class="material-symbols-outlined" style="color: white;">login</span></a>
                </div>
            </div>
        </nav>

        <!-- Masthead-->
        <header">
        </header>
        <br>
        <br>
        <br>

        <!--Peliculas Primero fila-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="container">
                    <h1 class="h3 d-flex align-items-center sc-iyvyFf fPOSuk">
                        Películas Familiares
                        <span class="sc-kfGgVZ dPGWdA">🎬</span>
                    </h1>
                    <br>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-sm-6 mb-4">
                        <!-- Angry2-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="../../Portal/img/Familiares/angry2.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <br>
                                <div class="portfolio-caption-heading">Angry Birds 2 </div>
                                <div class="portfolio-caption-subheading text-muted">2019</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6 mb-4">
                        <!-- Baby-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="../../Portal/img/Familiares/baby.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <br>
                                <div class="portfolio-caption-heading">Un jefe en pañales 2</div>
                                <div class="portfolio-caption-subheading text-muted">2021</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6 mb-4">
                        <!-- Brujas-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="../../Portal/img/Familiares/brujas.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <br>
                                <div class="portfolio-caption-heading">El retorno de las brujas 2</div>
                                <div class="portfolio-caption-subheading text-muted">2022</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6 mb-4 mb-lg-0">
                        <!--Buz-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="../../Portal/img/Familiares/buz.png" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <br>    
                                <div class="portfolio-caption-heading">Lightyear</div>
                                <div class="portfolio-caption-subheading text-muted">2022</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6 mb-4 mb-sm-0">
                        <!--Dc-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal5">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="../../Portal/img/Familiares/dc.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <br>
                                <div class="portfolio-caption-heading">Liga de supermascotas</div>
                                <div class="portfolio-caption-subheading text-muted">2022</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6">
                        <!--Era-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal6">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="../../Portal/img/Familiares/era.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <br>
                                <div class="portfolio-caption-heading">Ice Age: Las aventuras de Buck</div>
                                <div class="portfolio-caption-subheading text-muted">2022</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

                <!-- Portfolio Modals-->
                <!-- Angry-->
                <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="close-modal" data-bs-dismiss="modal"><img src="../../Portal/img/close.png" alt="Close modal" style="width: 100%;"></div>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <div class="modal-body">
                                            <!-- Project details-->
                                            <h2 class="text-uppercase">Angry Birds 2</h2>
                                            <br>
                                            <iframe width="560" height="315" src="https://www.youtube.com/embed/yoz7tb4CP7w" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            <p>Los enemigos se unen cuando los cerdos le proponen una tregua a las aves para unirse contra un nuevo y terrible rival que los amenaza a todos.</p>
                                            <ul class="list-inline">
                                                <li>
                                                    <strong>Protagonistas:</strong>
                                                    Jason Sudeikis,Rachel Bloom,Leslie Jones
                                                </li>
                                                <li>
                                                    <strong>Categoria:</strong>
                                                    Familiar
                                                </li>
                                            </ul>
                                            <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                                <i class="fas fa-xmark me-1"></i>
                                                Close Project
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Baby-->
                <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="close-modal" data-bs-dismiss="modal"><img src="../../Portal/img/close.png" alt="Close modal" style="width: 100%;"></div>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <div class="modal-body">
                                            <!-- Project details-->
                                            <h2 class="text-uppercase"></h2>
                                            <h2 class="text-uppercase">Un jefe en pañales 2</h2>
                                            <br>
                                            <iframe width="560" height="315" src="https://www.youtube.com/embed/Xh1YjppO5ig" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            <p>Theodore Templeton y su hermano, ahora adultos, toman una pócima mágica que los transforma en bebés durante 48 horas. Juntos, deben evitar que un villano convierta a otros niños pequeños en monstruitos insoportables.</p>
                                            <ul class="list-inline">
                                                <li>
                                                    <strong>Director:</strong>
                                                    Tom McGrath
                                                </li>
                                                <li>
                                                    <strong>Categoria:</strong>
                                                    Familiar
                                                </li>
                                            </ul>
                                            <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                                <i class="fas fa-xmark me-1"></i>
                                                Close Project
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Brujas-->
                <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="close-modal" data-bs-dismiss="modal"><img src="../../Portal/img/close.png" alt="Close modal" style="width: 100%;"></div>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <div class="modal-body">
                                            <!-- Project details-->
                                            <h2 class="text-uppercase">El retorno de las brujas 2</h2>
                                            <br>
                                            <iframe width="560" height="315" src="https://www.youtube.com/embed/v5lPpRM5psw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            <p>Han pasado 29 años desde que alguien encendió la Vela de la Llama Negra y resucitó a las hermanas Sanderson del siglo XVII, y ahora buscan venganza. De tres estudiantes de secundaria depende impedir que las voraces brujas causen un nuevo tipo de estrago en Salem antes del amanecer el día de Halloween.</p>
                                            <ul class="list-inline">
                                                <li>
                                                    <strong>Director: </strong>
                                                    Anne Fletcher
                                                </li>
                                                <li>
                                                    <strong>Categoria:</strong>
                                                    Familiar
                                                </li>
                                            </ul>
                                            <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                                <i class="fas fa-xmark me-1"></i>
                                                Close Project
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Buz-->
                <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="close-modal" data-bs-dismiss="modal"><img src="../../Portal/img/close.png" alt="Close modal" style="width: 100%;"></div>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <div class="modal-body">
                                            <!-- Project details-->
                                            <h2 class="text-uppercase">Lightyear</h2>
                                            <br>
                                            <iframe width="560" height="315" src="https://www.youtube.com/embed/WikwAJ3NQew" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            <p>Atrapado en un planeta hostil a 4,2 millones de años luz de la Tierra junto a su comandante y su tripulación, Buzz Lightyear intenta encontrar la manera de volver a casa a través del espacio y el tiempo. Pero la llegada de Zurg, una presencia imponente con un ejército de robots despiadados y una agenda misteriosa, complica aún más las cosas y pone en peligro la misión.</p>
                                            <ul class="list-inline">
                                                <li>
                                                    <strong>Director: </strong>
                                                    Angus MacLane
                                                </li>
                                                <li>
                                                    <strong>Categoria:</strong>
                                                    Familiar
                                                </li>
                                            </ul>
                                            <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                                <i class="fas fa-xmark me-1"></i>
                                                Close Project
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Dc-->
                <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="close-modal" data-bs-dismiss="modal"><img src="../../Portal/img/close.png" alt="Close modal" style="width: 100%;"></div>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <div class="modal-body">
                                            <!-- Project details-->
                                            <h2 class="text-uppercase">Liga de supermascotas</h2>
                                            <br>
                                            <iframe width="560" height="315" src="https://www.youtube.com/embed/DHzpY0UO47w" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            <p>Krypto el Superperro y Superman son amigos inseparables que comparten los mismos superpoderes y luchan juntos contra el crimen en Metrópolis. Cuando Superman y el resto de la Liga de la Justicia son secuestrados, Krypto debe convencer a un variopinto grupo de un albergue –Ace el sabueso, PB la cerdita barrigona, Merton la tortuga y Chip la ardilla– de dominar sus nuevos poderes y ayudarlo a rescatar a los superhéroes. Animación Acción Familia Comedia Ciencia ficción</p>
                                            <ul class="list-inline">
                                                <li>
                                                    <strong>Director:</strong>
                                                    Jared Stern
                                                </li>
                                                <li>
                                                    <strong>Categoria:</strong>
                                                    Familiar
                                                </li>
                                            </ul>
                                            <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                                <i class="fas fa-xmark me-1"></i>
                                                Close Project
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Era-->
                <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="close-modal" data-bs-dismiss="modal"><img src="../../Portal/img/close.png" alt="Close modal" style="width: 100%;"></div>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <div class="modal-body">
                                            <!-- Project details-->
                                            <h2 class="text-uppercase">Ice Age: Las aventuras de Buck</h2>
                                            <br>
                                            <iframe width="560" height="315" src="https://www.youtube.com/embed/1ECN-CIBRGk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            <p>Continúa contando las hilarantes aventuras de uno de los mamíferos favoritos de la prehistoria. Tras un distanciamiento con su hermana mayor, Ellie, los hermanos Crash y Eddie parten a la búsqueda de un lugar propio, pero rápidamente acaban atrapados en una caverna subterránea. El aventurero Buck Wild acudirá a su rescate y juntos, tendrán que enfrentarse a los dinosaurios del Mundo Perdido.</p>
                                            <ul class="list-inline">
                                                <li>
                                                    <strong>Director:</strong>
                                                    John C. Donkin
                                                </li>
                                                <li>
                                                    <strong>Categoria:</strong>
                                                    Familiar
                                                </li>
                                            </ul>
                                            <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                                <i class="fas fa-xmark me-1"></i>
                                                Close Project
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        <!--Peliculas Segunda fila-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-sm-6 mb-4">
                        <!-- Angry2-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal7">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="../../Portal/img/Familiares/red.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <br>
                                <div class="portfolio-caption-heading">Red</div>
                                <div class="portfolio-caption-subheading text-muted">2022</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6 mb-4">
                        <!-- Baby-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal8">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="../../Portal/img/Familiares/groot.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <br>
                                <div class="portfolio-caption-heading">Yo soy Groot</div>
                                <div class="portfolio-caption-subheading text-muted">2022</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6 mb-4">
                        <!-- Brujas-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal9">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="../../Portal/img/Familiares/hotel.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <br>
                                <div class="portfolio-caption-heading">Hotel Transilvania</div>
                                <div class="portfolio-caption-subheading text-muted">2022</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6 mb-4 mb-lg-0">
                        <!--Buz-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal10">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="../../Portal/img/Familiares/minions.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <br>
                                <div class="portfolio-caption-heading">Minions: El origen de Gru</div>
                                <div class="portfolio-caption-subheading text-muted">2022</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6 mb-4 mb-sm-0">
                        <!--Dc-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal11">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="../../Portal/img/Familiares/peter.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <br>
                                <div class="portfolio-caption-heading">Peter Rabbit</div>
                                <div class="portfolio-caption-subheading text-muted">2021</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6">
                        <!--Era-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal12">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="../../Portal/img/Familiares/pinocho.jpg " alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <br>
                                <div class="portfolio-caption-heading">Pinocho</div>
                                <div class="portfolio-caption-subheading text-muted">2022</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Portfolio Modals-->
        <!-- Angry-->
        <div class="portfolio-modal modal fade" id="portfolioModal7" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="../../Portal/img/close.png" alt="Close modal" style="width: 100%;"></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Red</h2>
                                    <br>
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/upGoAejd7LM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    <p>Los enemigos se unen cuando los cerdos le proponen una tregua a las aves para unirse contra un nuevo y terrible rival que los amenaza a todos.</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Protagonistas:</strong>
                                            Jason Sudeikis,Rachel Bloom,Leslie Jones
                                        </li>
                                        <li>
                                            <strong>Categoria:</strong>
                                            Familiar
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Baby-->
        <div class="portfolio-modal modal fade" id="portfolioModal8" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="../../Portal/img/close.png" alt="Close modal" style="width: 100%;"></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Yo soy Groot</h2>
                                    <br>
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/l-IEfXlZj1A" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    <p>Theodore Templeton y su hermano, ahora adultos, toman una pócima mágica que los transforma en bebés durante 48 horas. Juntos, deben evitar que un villano convierta a otros niños pequeños en monstruitos insoportables.</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Director:</strong>
                                            Tom McGrath
                                        </li>
                                        <li>
                                            <strong>Categoria:</strong>
                                            Familiar
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Brujas-->
        <div class="portfolio-modal modal fade" id="portfolioModal9" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="../../Portal/img/close.png" alt="Close modal" style="width: 100%;"></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Hotel Transylvania 4</h2>
                                    <br>
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/laTKwRae9-M" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    <p>Han pasado 29 años desde que alguien encendió la Vela de la Llama Negra y resucitó a las hermanas Sanderson del siglo XVII, y ahora buscan venganza. De tres estudiantes de secundaria depende impedir que las voraces brujas causen un nuevo tipo de estrago en Salem antes del amanecer el día de Halloween.</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Director: </strong>
                                            Anne Fletcher
                                        </li>
                                        <li>
                                            <strong>Categoria:</strong>
                                            Familiar
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Buz-->
        <div class="portfolio-modal modal fade" id="portfolioModal10" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="../../Portal/img/close.png" alt="Close modal" style="width: 100%;"></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Minions 2</h2>
                                    <br>
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/klsYgu5Y9Ww" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    <p>Atrapado en un planeta hostil a 4,2 millones de años luz de la Tierra junto a su comandante y su tripulación, Buzz Lightyear intenta encontrar la manera de volver a casa a través del espacio y el tiempo. Pero la llegada de Zurg, una presencia imponente con un ejército de robots despiadados y una agenda misteriosa, complica aún más las cosas y pone en peligro la misión.</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Director: </strong>
                                            Angus MacLane
                                        </li>
                                        <li>
                                            <strong>Categoria:</strong>
                                            Familiar
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Dc-->
        <div class="portfolio-modal modal fade" id="portfolioModal11" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="../../Portal/img/close.png" alt="Close modal" style="width: 100%;"></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Peter Rabbit</h2>
                                    <br>
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/euGHcnyUo84" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    <p>Krypto el Superperro y Superman son amigos inseparables que comparten los mismos superpoderes y luchan juntos contra el crimen en Metrópolis. Cuando Superman y el resto de la Liga de la Justicia son secuestrados, Krypto debe convencer a un variopinto grupo de un albergue –Ace el sabueso, PB la cerdita barrigona, Merton la tortuga y Chip la ardilla– de dominar sus nuevos poderes y ayudarlo a rescatar a los superhéroes. Animación Acción Familia Comedia Ciencia ficción</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Director:</strong>
                                            Jared Stern
                                        </li>
                                        <li>
                                            <strong>Categoria:</strong>
                                            Familiar
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Era-->
        <div class="portfolio-modal modal fade" id="portfolioModal12" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="../../Portal/img/close.png" alt="Close modal" style="width: 100%;"></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Pinocho</h2>
                                    <br>
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/TITv1TNi5mI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    <p>Continúa contando las hilarantes aventuras de uno de los mamíferos favoritos de la prehistoria. Tras un distanciamiento con su hermana mayor, Ellie, los hermanos Crash y Eddie parten a la búsqueda de un lugar propio, pero rápidamente acaban atrapados en una caverna subterránea. El aventurero Buck Wild acudirá a su rescate y juntos, tendrán que enfrentarse a los dinosaurios del Mundo Perdido.</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Director:</strong>
                                            John C. Donkin
                                        </li>
                                        <li>
                                            <strong>Categoria:</strong>
                                            Familiar
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                            <a class="nav-link py-1 text-white" href="/nosotros">Sobre CineJED</a></li>
                            <li class="nav-item"><a class="nav-link py-1 text-white" href="/landing/privacidad-cinefan/privacidad-cinefan">Términos y condiciones Cinefan</a></li>
                            <li class="nav-item"><a class="nav-link py-1 text-white" href="/politica-precios">Política de precios</a></li>
                            <li class="nav-item"><a class="nav-link py-1 text-white" href="/politica-de-reembolsos">Política de reembolsos</a></li>
                            <li class="nav-item"><a class="nav-link py-1 text-white" href="http://cinemex.bumeran.com.mx/" target="_blank" rel="noopener noreferrer">Bolsa de trabajo corporativo</a></li>
                            <li class="nav-item"><a class="nav-link py-1 text-white" href="/terminos">Términos y condiciones</a></li>
                            <li class="nav-item"><a class="nav-link py-1 text-white" href="/privacidadvisitantes">Aviso de Privacidad</a></li>
                            <li class="nav-item"><a class="nav-link py-1 text-white" href="/empleos/formulario">Bolsa de trabajo cines</a></li></ul>
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
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
