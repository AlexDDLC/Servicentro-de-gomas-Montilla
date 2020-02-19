<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contáctanos</title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Los iconos tipo Solid de Font awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>

<body>

    <div>
        <?php include("./header.php") ?>
    </div>

    <div id="contact" class="contact-area">
        <div class="contact-inner area-padding">
            <div class="contact-overly"></div>
            <div class="container ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="section-headline text-center">
                            <h2>Contáctanos</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Start contact icon column -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="text-center">
                            <div class="single-icon">
                                <span><i class="fas fa-phone"></i></span>
                            </div>
                            <p>
                                Teléfono: (809) 562-0202<br>
                            </p>
                        </div>
                    </div>
                    <!-- Start contact icon column -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="text-center">
                            <div class="single-icon">
                                <span><i class="far fa-envelope"></i></span>
                            </div>
                            <p>
                                Email: servicentromontilla@gmail.com<br>
                            </p>
                        </div>
                    </div>
                    <!-- Start contact icon column -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="text-center">
                            <div class="single-icon">
                                <span><i class="fa fa-map-marker-alt"></i></span>
                            </div>
                            <p>
                                Locación: Av. Charles Summer <br>
                                <span>F2GX+M3 Santo Domingo</span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <!-- Start Google Map -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <!-- Start Map -->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3784.1548212288685!2d-69.95454378545719!3d18.476645075339323!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8eaf89f82c1232f7%3A0x850fac1735ce48e0!2sServicentro+de+Gomas+Montilla!5e0!3m2!1ses-419!2sdo!4v1562176414804!5m2!1ses-419!2sdo" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
                        <!-- End Map -->
                    </div>
                    <!-- End Google Map -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Area -->

    <div>
        <?php include("./footer.php") ?>
    </div>

</body>

</html>