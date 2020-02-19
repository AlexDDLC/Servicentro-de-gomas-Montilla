<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Header</title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Los iconos tipo Solid de Font awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="CSS/Estilos.css" rel="stylesheet">

</head>

<body>

    <div id="mySidenav" class="sidenav">
        <ul class="sidebar navbar-nav">
            <?php if ($_SESSION['user_rol'] != "Cajero") : ?>
                <li class="nav-item">
                    <a class="nav-link" href="./productos.php">
                        <i class="fas fa-boxes"></i>
                        <span>Productos</span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if ($_SESSION['user_rol'] != "Bodeguero") { ?>
                <li class="nav-item">
                    <a class="nav-link" href="./venta.php">
                        <i class="fas fa-cash-register"></i>
                        <span>Ventas</span></a>
                </li>
            <?php } ?>
            <?php if ($_SESSION['user_rol'] != 'Contable' || $_SESSION['user_rol'] != 'Cajero' || $_SESSION['user_rol'] != "Bodeguero") { ?>
                <li class="nav-item">
                    <a class="nav-link" href="./empleados.php">
                        <i class="fas fa-user-tie"></i>
                        <span>Empleados </span></a>
                </li>
            <?php } ?>
        </ul>
    </div>

    <!-- Header -->
    <div class="HeaderUniversal">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <?php if (!empty($_SESSION['user_name'])) : ?>
                    <?php if ($_SESSION['user_rol'] != "Cliente") : ?>
                        <button class="SideBarBtn mx-2" onclick="openNav()"><i class="fas fa-bars"></i></button>
                    <?php endif; ?>
                <?php endif; ?>
                <a class="navbar-brand" href="index.php">Servicentro de Gomas Montilla</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto nav navbar-nav navbar-right">
                        <li class="nav-item b4 my-1">
                            <a href="./tienda.php"><i class="fas fa-store-alt"></i> Tienda </a>
                        </li>
                        <li class="nav-item b4 my-1">
                            <a href="./nosotros.php"><i class="fas fa-users"></i> Nosotros</a>
                        </li>
                        <li class="nav-item b4 my-1">
                            <a href="./contactanos.php"><i class="fas fa-mail-bulk"></i> Contáctanos</a>
                        </li>
                        <li class="nav-item b4 my-1">
                            <a href="./carrito.php"><i class="fas fa-shopping-cart"></i> Carrito(<?php echo (empty($_SESSION['Carrito'])) ? 0 : count($_SESSION['Carrito']); ?>)</a>
                        </li>
                        <li class="nav-item mx-1">
                            <div class="btn-group">
                                <button type="button" data-toggle="dropdown">
                                    <i class="fas fa-user"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="userDropdown">
                                    <div class="botonesmenu">
                                        <img src="./Imagenes/avatar.png" alt="">
                                        <?php if (!empty($_SESSION['user_name'])) : ?>
                                            <p class="text-center my-1"><?= $_SESSION['user_name']; ?></p>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="./CodigoPHP/cerrar_sesion.php"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
                                        <?php else : ?>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="login.php"><i class="fas fa-sign-in-alt"></i> Iniciar sesión</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header -->

        <script>
            function openNav() {
                var Width = document.getElementById("mySidenav").offsetWidth;
                if (Width == 0) {
                    document.getElementById("mySidenav").style.width = "220px";
                } else {
                    document.getElementById("mySidenav").style.width = "0";
                }
            }
        </script>

</body>

</html>