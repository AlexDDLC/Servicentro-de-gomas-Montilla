<?php //require("./CodigoPHP/Session_segura.php")?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Servicentro de Gomas Montilla</title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Los iconos tipo Solid de Font awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Custom styles for this template-->
    <link href="./CSS/Estilos.css" rel="stylesheet">

</head>

<body id="page-top">

    <div>
        <?php include('./header.php') ?>
    </div>

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
        </button>
    </nav>

    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="sidebar navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="./productos.php">
                    <i class="fas fa-boxes"></i>
                    <span>Productos</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-cash-register"></i>
                    <span>Ventas</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-truck-loading"></i>
                    <span>Compras</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-users"></i>
                    <span>Clientes</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-user-tie"></i>
                    <span>Empleados </span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-project-diagram"></i>
                    <span>Marcas y categorías</span></a>
            </li>
        </ul>

        <div id="content-wrapper">

            <div class="container-fluid">

            <h1>Hola</h1>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Custom scripts for all pages-->
    <script src="./JS/sb-admin.min.js"></script>

    <div>
        <?php include('./footer.php') ?>
    </div>

</body>

</html>