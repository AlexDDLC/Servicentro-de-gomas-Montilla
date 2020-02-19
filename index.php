<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="">

    <title>Servicentro de Gomas Montilla</title>

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

<body class="IndexBody">

    <!-- Header -->
    <div>
        <?php include("header.php") ?>
    </div>
    <!-- Header -->

    <!-- Container -->
    <div class="container">

        <!-- row -->
        <div class="row">

            <!-- col-lg-3 -->
            <div class="col-lg-3">
                <h1 class="my-0">Vehículos</h1>
                <div class="list-group">
                    <form action="" method="post">
                        <a href="./tienda.php" class="list-group-item text-decoration-none"><i class="fas fa-bicycle"></i> Bicicletas</a>
                        <a href="./tienda.php" class="list-group-item text-decoration-none"><i class="fas fa-motorcycle"></i> Motocicletas</a>
                        <a href="./tienda.php" class="list-group-item text-decoration-none"><i class="fas fa-car"></i> Sedanes</a>
                        <a href="./tienda.php" class="list-group-item text-decoration-none"><i class="fas fa-truck-pickup"></i> SUV y Pick-Up</a>
                        <a href="./tienda.php" class="list-group-item text-decoration-none"><i class="fas fa-bus-alt"></i> Autobuses</a>
                        <a href="./tienda.php" class="list-group-item text-decoration-none"><i class="fas fa-truck-moving"></i> Camiones</a>
                        <a href="./tienda.php" class="list-group-item text-decoration-none"><i class="fas fa-tractor"></i> Tractores</a>
                    </form>
                </div>
            </div>
            <!-- col-lg-3 -->

            <!-- col-lg-9 -->
            <div class="col-lg-9">

                <div id="carouselExampleIndicators" class="carousel slide my-4 carousel-fade" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid" src="./Imagenes/car-tires.jpg" alt="Primer slide">
                            <div class="b4 carousel-caption">
                                <h2>Neumáticos para cualquier vehículo</h2>
                                <p>Contamos con neumáticos que van desde autos compactos hasta grandes sedanes de lujo</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="./Imagenes/moto.jpg" alt="Segundo slide">
                            <div class="b4 carousel-caption">
                                <h2>Agárrate en las curvas</h2>
                                <p>Equipa tu motocicleta con los neumáticos que te permitan mantenerte pegado al asfalto cuando vas a toda velocidad.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="./Imagenes/neumaticos-camion.jpg" alt="Segundo slide">
                            <div class="b4 carousel-caption">
                                <h2>Lleva tu carga sobre buenos rieles.</h2>
                                <p>Que tu carga llegue bien a su destino al equipar tu camión con buenos neumáticos para recorrer largos caminos. </p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="./Imagenes/neumaticosarena.jpg" alt="Tercer slide">
                            <div class="b4 carousel-caption">
                                <h2>Todo terreno sin límite.</h2>
                                <p>Usa los mejores neumáticos para divertirte mientras te mueves libremente por encima de cualquier mal camino.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="./Imagenes/montain-bike.jpg" alt="Quinto slide">
                            <div class="b4 carousel-caption">
                                <h2>Sal de la ruta un rato.</h2>
                                <p>Vive la mejor experiencia fuera del camino corriendo a toda velocidad entre el montes y campo en tu bicicleta y pasa un buen rato haciendo ejercicio.</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <!-- col-lg-9 -->

            <!-- Container -->
            <div class="my-3 b4 container">
                <h1 class="b4 text-center">Ponle atención a tus neumáticos</h1>
            </div>
            <br>
            <!-- Container -->

            <div class="row">
                <!-- single-well start-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="well-left">
                        <div class="single-well">
                            <video src="./Videos/Bridgestone Turanza Tires - TV Commercial_Trim.mp4" muted width="560" autoplay loop></video>
                        </div>
                    </div>
                </div>
                <!-- single-well end-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="well-middle">
                        <div class="single-well">
                            <h4 class="sec-head">No importa que tanta agua haya tus neumáticos no deben resbalar</h4>
                            <p>
                                La lluvia puede provocar que los neumáticos pierdan adherencia al crearse una delgada película de agua entre el piso y los neumáticos si estos no pueden de denar el agua entre los surcos, por eso es recomendable no usar neumáticos desgastados y así evitar incidentes.
                            </p>
                            <ul>
                                <li>
                                    <i class="far fa-lightbulb"></i> Recerda esto siempre
                                </li>
                                <li>
                                    <i class="fa fa-check"></i> Usa neumáticos con los surcos bien macados
                                </li>
                                <li>
                                    <i class="fa fa-check"></i> Verifica la presión de los neumáticos
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End col-->
            </div>
            <br>
            <br>
            <!-- Container -->
            <div class="my-3 b4 container">
                <h1 class="b4 text-center">Versatilidad en todo ambiente.</h1>
            </div>
            <br>
            <!-- Container -->
            <br>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="well-middle">
                        <div class="single-well">
                            <br>
                            <br>
                            <br>
                            <br>
                            <h4 class="sec-head">Para el campo y para la carretera</h4>
                            <p>
                                Siéntete con la libertad de ir al campo y también volver a la calle como si nada con neumáticos preparados para ambos entornos.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="well-left">
                        <div class="single-well">
                            <video src="./Videos/Firestone Tires 'Truck Stuff' Commercial_Trim (2).mp4" muted width="560" autoplay loop></video>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container -->
        <br>
        <!-- Container -->
        <div class="my-3 b4 container">
            <h1 class="b4 text-center">No importa el terreno, no te quedaras varado.</h1>
        </div>
        <br>
        <div class="row">
            <!-- single-well start-->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="well-left">
                    <div class="single-well">
                        <video src="./Videos/Firestone Tires 'Truck Stuff' Commercial_Trim.mp4" muted width="560" autoplay loop></video>
                    </div>
                </div>
            </div>
            <!-- single-well end-->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="well-middle my-5">
                    <div class="single-well my-5">
                        <h4 class="sec-head">¿Terreno complicado? Con nuestros neumáticos ninguno es complicado.</h4>
                        <p>
                            Ve al campo, a la playa o pasa por cualquier camino de terracería sin sentir miedo de quedar atrapado en la tierra, barro, arena.
                        </p>
                    </div>
                </div>
            </div>
            <!-- End col-->
        </div>
        <br>
    </div>

    <!-- Footer -->
    <div>
        <?php include("footer.php") ?>
    </div>
    <!-- Footer -->

</body>

</html>