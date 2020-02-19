<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nosotros</title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="CSS/Estilos.css" rel="stylesheet">

</head>

<body class="Nosotros">

    <!-- HEADER -->
    <div>
        <?php include('header.php') ?>
    </div>
    <!-- HEADER -->

    <!-- Acerca de nosotros -->
    <div class="area-padding">
        <div class="container">

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center mb-4">
                        <h2>Acerca de nosotros</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- single-well start-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <img src="Imagenes/nosotros.jpg" alt="">
                </div>
                <!-- single-well end-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="single-well">
                        <h4>¿Qué es Servicentro de gomas Montilla?</h4>
                        <p class="b4 text-justify">
                            Servicentro de gomas Montilla es una empresa Dominicana, respaldada por un joven y entusiasta equipo humano, nos avalan 15 años de experiencia en el sector de neumáticos para automóviles y nos respalda un equipo formado por los mejores profesionales y especializado en este sector y contamos con:
                        </p>
                        <ul>
                            <li>
                                <span><i class="fas fa-check"></i></span> Un personal capacitado.
                            </li>
                            <li>
                                <span><i class="fas fa-check"></i></span> Buena atención al cliente.
                            </li>
                            <li>
                                <span><i class="fas fa-check"></i></span> Taller con todo lo necesario para ofrecer un buen servicio.
                            </li>
                            <li>
                                <span><i class="fas fa-check"></i></span> Años de experiencia en el área.
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End col-->

                <div class="row my-5">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <h4>Nuestra visión</h4>
                        <p class="b4 text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus dicta, reprehenderit et repellendus quam repellat ipsum eligendi ipsa unde in dolores, natus aliquam! Unde voluptatem optio deserunt dolore nesciunt quam.</p>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <img src="Imagenes/vision.png" alt="">
                    </div>
                </div>

                <div class="row my-5">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <img src="Imagenes/mision.png" alt="">
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <h4>Nuestra misión</h4>
                        <p class="b4 text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae itaque dolores accusantium mollitia fuga quae, illo quas aliquam provident doloremque suscipit cum necessitatibus modi amet soluta ut veritatis eligendi? Quisquam?</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /Acerca de nosotros -->

    <!-- Nuestros servicios -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center my-4">
                    <h2>Nuestros servicios</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- single-awesome-project start -->
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="single-awesome-project">
                    <div class="awesome-img">
                        <a href="#"><img src="Imagenes/servicio1.jpg" alt="" /></a>
                        <div class="add-actions text-center">
                            <div class="project-dec">
                                <span>
                                    <h4>Grúa</h4>
                                    <span>Siéntete seguro en caso de cualquier pinchazo con nuestro servicio de grúa.</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- single-awesome-project end -->

            <!-- single-awesome-project start -->
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="single-awesome-project">
                    <div class="awesome-img">
                        <a href="#"><img src="Imagenes/servicio2.jpg" alt="" /></a>
                        <div class="add-actions text-center">
                            <div class="project-dec">
                                <a href="img/portfolio/2.jpg">
                                    <h4>Cambio de neumáticos</h4>
                                    <span>Hacemos el cambio de neumáticos a cualquier tipo de rines.</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- single-awesome-project end -->

            <!-- single-awesome-project start -->
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="single-awesome-project">
                    <div class="awesome-img">
                        <a href="#"><img src="Imagenes/servicio3.jpg" alt="" /></a>
                        <div class="add-actions text-center">
                            <div class="project-dec">
                                <span>
                                    <h4>Alineación de neumáticos</h4>
                                    <span>Que tu vehículo se mantenga en línea recta con los neumáticos bien alineados.</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- single-awesome-project end -->

            <!-- single-awesome-project start -->
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="single-awesome-project">
                    <div class="awesome-img">
                        <a href="#"><img src="Imagenes/servicio4.jpg" alt="" /></a>
                        <div class="add-actions text-center">
                            <div class="project-dec">
                                <span>
                                    <h4>Balaceo de neumáticos</h4>
                                    <span>Conduce sin extrañas vibraciones ni perturbaciones manteniendo tus neumáticos bien balanceados.</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- single-awesome-project end -->

            <!-- single-awesome-project start -->
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="single-awesome-project">
                    <div class="awesome-img">
                        <a href="#"><img src="Imagenes/servicio5.jpg" alt="" /></a>
                        <div class="add-actions text-center text-center">
                            <div class="project-dec">
                                <span>
                                    <h4>Ajuste de presión de neumáticos</h4>
                                    <span>Mantén tus neumáticos inflados y con la presión justa.</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- single-awesome-project end -->

            <!-- single-awesome-project start -->
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="single-awesome-project">
                    <div class="awesome-img">
                        <a href="#"><img src="Imagenes/servicio6.jpg" alt="" /></a>
                        <div class="add-actions text-center">
                            <div class="project-dec">
                                <span>
                                    <h4>Reparación de neumáticos</h4>
                                    <span>Búscanos ante cualquier pinchadura y nosotros te resolveremos.</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- single-awesome-project end -->

        </div>
    </div>
    <!-- /Nuestros servicios -->

    <!-- Start Suscrive Area -->
    <div class="suscribe-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">
                    <div class="suscribe-text text-center">
                        <h3>Regístrate con en nuestra web</h3>
                        <a class="sus-btn" href="./registro.php">Regístrate</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Suscrive Area -->

    <!-- FOOTER -->
    <div>
        <?php include('footer.php') ?>
    </div>
    <!-- FOOTER -->

</body>

</html>