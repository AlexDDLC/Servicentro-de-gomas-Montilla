<?php
session_start();
require('./CodigoPHP/conexion.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tienda</title>

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

<body class="TiendaBody">

    <!-- Header -->
    <div>
        <?php include('header.php') ?>
    </div>
    <!-- Header -->

    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" href="#listartodo" role="tab" data-toggle="tab"><i class="fas fa-boxes"></i> Todo</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#listarbicicleta" role="tab" data-toggle="tab"><i class="fas fa-bicycle"></i> Bicicletas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#listarmotocicleta" role="tab" data-toggle="tab"><i class="fas fa-motorcycle"></i> Motocicletas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#listarsedanes" role="tab" data-toggle="tab"><i class="fas fa-car"></i> Sedanes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#listarsuvypick-up" role="tab" data-toggle="tab"><i class="fas fa-truck-pickup"></i> SUV y Pick-Up</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#listarautobuses" role="tab" data-toggle="tab"><i class="fas fa-bus-alt"></i> Autobuses</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#listarcamiones" role="tab" data-toggle="tab"><i class="fas fa-truck-moving"></i> Camiones</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#listartractores" role="tab" data-toggle="tab"><i class="fas fa-tractor"></i> Tractores</a>
        </li>
    </ul>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade show active" id="listartodo">
            <!-- Container -->
            <div class="b4 container">

                <!-- row -->
                <div class="row my-2">

                    <?php require('./CodigoPHP/conexion.php');
                    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT * FROM productos";
                    $resultado = $conexion->prepare($sql);
                    $resultado->execute();
                    while ($datos = $resultado->fetch(PDO::FETCH_ASSOC)) { ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="container-fluid text-center">
                                    <div class="single-awesome-project">
                                        <div class="awesome-img-tienda">
                                            <img class="card-img-top" src="<?php echo $datos['foto']; ?>" height="250px" alt="">
                                            <div class="add-actions text-center">
                                                <div class="project-dec">
                                                    <a href="./detalles_producto.php?id=<?php echo $datos['id']; ?>">
                                                        <h1>Checar</h1>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="MarcaModelo">
                                        <h4 class="card-title"><?php echo $datos['marca'] . " " . $datos['modelo'] ?></h4>
                                    </div>
                                    <div class="ProductoPrecio">
                                        <h5><span><i class="fas fa-dollar-sign"></i>RD </span><?php echo $datos['precio_venta'] ?></h5>
                                        <p><span><i class="fas fa-cubes"></i> Dispobibles: </span><?php echo $datos['stock'] ?></p>
                                    </div>
                                    <p class="card-text text-justify"><?php echo $datos['descripcion_corta'] ?></p>
                                </div>
                                <div class="card-footer b4 text-center">
                                    <small><span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span></small>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- row -->
            </div>
            <!-- Container -->
        </div>
        <!-- Tabpanel -->

        <div role="tabpanel" class="tab-pane fade" id="listarbicicleta">
            <!-- Container -->
            <div class="b4 container">

                <!-- row -->
                <div class="row my-2">

                    <?php require('./CodigoPHP/conexion.php');
                    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT * FROM productos WHERE categoria = 'Bicicletas'";
                    $resultado = $conexion->prepare($sql);
                    $resultado->execute();
                    while ($datos = $resultado->fetch(PDO::FETCH_ASSOC)) { ?>
                        <div class="col-md-4">
                            <div class="card h-100">
                                <div class="container-fluid text-center">
                                    <div class="single-awesome-project">
                                        <div class="awesome-img-tienda">
                                            <a href="#"><img class="card-img-top" src="<?php echo $datos['foto']; ?>" height="250px" alt=""></a>
                                            <div class="add-actions text-center">
                                                <div class="project-dec">
                                                    <a href="./detalles_producto.php?id=<?php echo $datos['id']; ?>">
                                                        <h1>Checar</h1>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="MarcaModelo">
                                        <h4 class="card-title"><?php echo $datos['marca'] . " " . $datos['modelo'] ?></h4>
                                    </div>
                                    <div class="ProductoPrecio">
                                        <h5><span><i class="fas fa-dollar-sign"></i>RD</span><?php echo " " . $datos['precio_venta'] ?></h5>
                                        <p><span><i class="fas fa-cubes"></i> Dispobibles: </span><?php echo $datos['stock'] ?></p>
                                    </div>
                                    <p class="card-text text-justify"><?php echo $datos['descripcion_corta'] ?></p>
                                </div>
                                <div class="card-footer b4 text-center">
                                    <small><span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span></small>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- row -->
            </div>
            <!-- Container -->
        </div>
        <!-- Tabpanel -->

        <div role="tabpanel" class="tab-pane fade" id="listarmotocicleta">
            <!-- Container -->
            <div class="b4 container">

                <!-- row -->
                <div class="row my-2">

                    <?php require('./CodigoPHP/conexion.php');
                    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT * FROM productos  WHERE categoria = 'Motocicletas'";
                    $resultado = $conexion->prepare($sql);
                    $resultado->execute();
                    while ($datos = $resultado->fetch(PDO::FETCH_ASSOC)) { ?>
                        <div class="col-md-4">
                            <div class="card h-100">
                                <div class="container-fluid text-center">
                                    <div class="single-awesome-project">
                                        <div class="awesome-img-tienda">
                                            <a href="#"><img class="card-img-top" src="<?php echo $datos['foto']; ?>" height="250px" alt=""></a>
                                            <div class="add-actions text-center">
                                                <div class="project-dec">
                                                    <a href="./detalles_producto.php?id=<?php echo $datos['id']; ?>">
                                                        <h1>Checar</h1>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="MarcaModelo">
                                        <h4 class="card-title"><?php echo $datos['marca'] . " " . $datos['modelo'] ?></h4>
                                    </div>
                                    <div class="ProductoPrecio">
                                        <h5><span><i class="fas fa-dollar-sign"></i>RD</span><?php echo " " . $datos['precio_venta'] ?></h5>
                                        <p><span><i class="fas fa-cubes"></i> Dispobibles: </span><?php echo $datos['stock'] ?></p>
                                    </div>
                                    <p class="card-text text-justify"><?php echo $datos['descripcion_corta'] ?></p>
                                </div>
                                <div class="card-footer b4 text-center">
                                    <small><span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span></small>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- row -->
            </div>
            <!-- Container -->
        </div>
        <!-- Tabpanel -->

        <div role="tabpanel" class="tab-pane fade" id="listarsedanes">
            <!-- Container -->
            <div class="b4 container">

                <!-- row -->
                <div class="row my-2">

                    <?php require('./CodigoPHP/conexion.php');
                    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT * FROM productos  WHERE categoria = 'Sedanes'";
                    $resultado = $conexion->prepare($sql);
                    $resultado->execute();
                    while ($datos = $resultado->fetch(PDO::FETCH_ASSOC)) { ?>
                        <div class="col-md-4">
                            <div class="card h-100">
                                <div class="container-fluid text-center">
                                    <div class="single-awesome-project">
                                        <div class="awesome-img-tienda">
                                            <a href="#"><img class="card-img-top" src="<?php echo $datos['foto']; ?>" height="250px" alt=""></a>
                                            <div class="add-actions text-center">
                                                <div class="project-dec">
                                                    <a href="./detalles_producto.php?id=<?php echo $datos['id']; ?>">
                                                        <h1>Checar</h1>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="MarcaModelo">
                                        <h4 class="card-title"><?php echo $datos['marca'] . " " . $datos['modelo'] ?></h4>
                                    </div>
                                    <div class="ProductoPrecio">
                                        <h5><span><i class="fas fa-dollar-sign"></i>RD</span><?php echo " " . $datos['precio_venta'] ?></h5>
                                        <p><span><i class="fas fa-cubes"></i> Dispobibles: </span><?php echo $datos['stock'] ?></p>
                                    </div>
                                    <p class="card-text text-justify"><?php echo $datos['descripcion_corta'] ?></p>
                                </div>
                                <div class="card-footer b4 text-center">
                                    <small><span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span></small>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- row -->
            </div>
            <!-- Container -->
        </div>
        <!-- Tabpanel -->

        <div role="tabpanel" class="tab-pane fade" id="listarsuvypick-up">
            <!-- Container -->
            <div class="b4 container">

                <!-- row -->
                <div class="row my-2">

                    <?php require('./CodigoPHP/conexion.php');
                    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT * FROM productos  WHERE categoria = 'SUV y Pick-Up'";
                    $resultado = $conexion->prepare($sql);
                    $resultado->execute();
                    while ($datos = $resultado->fetch(PDO::FETCH_ASSOC)) { ?>
                        <div class="col-md-4">
                            <div class="card h-100">
                                <div class="container-fluid text-center">
                                    <div class="single-awesome-project">
                                        <div class="awesome-img-tienda">
                                            <a href="#"><img class="card-img-top" src="<?php echo $datos['foto']; ?>" height="250px" alt=""></a>
                                            <div class="add-actions text-center">
                                                <div class="project-dec">
                                                    <a href="./detalles_producto.php?id=<?php echo $datos['id']; ?>">
                                                        <h1>Checar</h1>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="MarcaModelo">
                                        <h4 class="card-title"><?php echo $datos['marca'] . " " . $datos['modelo'] ?></h4>
                                    </div>
                                    <div class="ProductoPrecio">
                                        <h5><span><i class="fas fa-dollar-sign"></i>RD</span><?php echo " " . $datos['precio_venta'] ?></h5>
                                        <p><span><i class="fas fa-cubes"></i> Dispobibles: </span><?php echo $datos['stock'] ?></p>
                                    </div>
                                    <p class="card-text text-justify"><?php echo $datos['descripcion_corta'] ?></p>
                                </div>
                                <div class="card-footer b4 text-center">
                                    <small><span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span></small>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- row -->
            </div>
            <!-- Container -->
        </div>
        <!-- Tabpanel -->

        <div role="tabpanel" class="tab-pane fade" id="listarautobuses">
            <!-- Container -->
            <div class="b4 container">

                <!-- row -->
                <div class="row my-2">

                    <?php require('./CodigoPHP/conexion.php');
                    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT * FROM productos  WHERE categoria = 'Autobuses'";
                    $resultado = $conexion->prepare($sql);
                    $resultado->execute();
                    while ($datos = $resultado->fetch(PDO::FETCH_ASSOC)) { ?>
                        <div class="col-md-4">
                            <div class="card h-100">
                                <div class="single-awesome-project">
                                    <div class="awesome-img-tienda">
                                        <a href="#"><img class="card-img-top" src="<?php echo $datos['foto']; ?>" height="250px" alt=""></a>
                                        <div class="add-actions text-center">
                                            <div class="project-dec">
                                                <a href="./detalles_producto.php?id=<?php echo $datos['id']; ?>">
                                                    <h1>Checar</h1>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="MarcaModelo">
                                        <h4 class="card-title"><?php echo $datos['marca'] . " " . $datos['modelo'] ?></h4>
                                    </div>
                                    <div class="ProductoPrecio">
                                        <h5><span><i class="fas fa-dollar-sign"></i>RD</span><?php echo " " . $datos['precio_venta'] ?></h5>
                                        <p><span><i class="fas fa-cubes"></i> Dispobibles: </span><?php echo $datos['stock'] ?></p>
                                    </div>
                                    <p class="card-text text-justify"><?php echo $datos['descripcion_corta'] ?></p>
                                </div>
                                <div class="card-footer b4 text-center">
                                    <small><span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span></small>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- row -->
            </div>
            <!-- Container -->
        </div>
        <!-- Tabpanel -->

        <div role="tabpanel" class="tab-pane fade" id="listarcamiones">
            <!-- Container -->
            <div class="b4 container">

                <!-- row -->
                <div class="row my-2">

                    <?php require('./CodigoPHP/conexion.php');
                    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT * FROM productos  WHERE categoria = 'Camiones'";
                    $resultado = $conexion->prepare($sql);
                    $resultado->execute();
                    while ($datos = $resultado->fetch(PDO::FETCH_ASSOC)) { ?>
                        <div class="col-md-4">
                            <div class="card h-100">
                                <div class="single-awesome-project">
                                    <div class="awesome-img-tienda">
                                        <a href="#"><img class="card-img-top" src="<?php echo $datos['foto']; ?>" height="250px" alt=""></a>
                                        <div class="add-actions text-center">
                                            <div class="project-dec">
                                                <a href="./detalles_producto.php?id=<?php echo $datos['id']; ?>">
                                                    <h1>Checar</h1>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="MarcaModelo">
                                        <h4 class="card-title"><?php echo $datos['marca'] . " " . $datos['modelo'] ?></h4>
                                    </div>
                                    <div class="ProductoPrecio">
                                        <h5><span><i class="fas fa-dollar-sign"></i>RD</span><?php echo " " . $datos['precio_venta'] ?></h5>
                                        <p><span><i class="fas fa-cubes"></i> Dispobibles: </span><?php echo $datos['stock'] ?></p>
                                    </div>
                                    <p class="card-text text-justify"><?php echo $datos['descripcion_corta'] ?></p>
                                </div>
                                <div class="card-footer b4 text-center">
                                    <small><span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span></small>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- row -->
            </div>
            <!-- Container -->
        </div>
        <!-- Tabpanel -->

        <div role="tabpanel" class="tab-pane fade" id="listartractores">
            <!-- Container -->
            <div class="b4 container">

                <!-- row -->
                <div class="row my-2">

                    <?php require('./CodigoPHP/conexion.php');
                    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT * FROM productos  WHERE categoria = 'Tractores'";
                    $resultado = $conexion->prepare($sql);
                    $resultado->execute();
                    while ($datos = $resultado->fetch(PDO::FETCH_ASSOC)) { ?>
                        <div class="col-md-4">
                            <div class="card h-100">
                                <div class="single-awesome-project">
                                    <div class="awesome-img-tienda">
                                        <a href="#"><img class="card-img-top" src="<?php echo $datos['foto']; ?>" height="260px" alt=""></a>
                                        <div class="add-actions text-center">
                                            <div class="project-dec">
                                                <a href="./detalles_producto.php?id=<?php echo $datos['id']; ?>">
                                                    <h1>Checar</h1>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="MarcaModelo">
                                        <h4 class="card-title"><?php echo $datos['marca'] . " " . $datos['modelo'] ?></h4>
                                    </div>
                                    <div class="ProductoPrecio">
                                        <h5><span><i class="fas fa-dollar-sign"></i>RD</span><?php echo " " . $datos['precio_venta'] ?></h5>
                                        <p><span><i class="fas fa-cubes"></i> Dispobibles: </span><?php echo $datos['stock'] ?></p>
                                    </div>
                                    <p class="card-text text-justify"><?php echo $datos['descripcion_corta'] ?></p>
                                </div>
                                <div class="card-footer b4 text-center">
                                    <small><span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span></small>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- row -->
            </div>
            <!-- Container -->
        </div>
        <!-- Tabpanel -->



    </div>
    <!-- tab-content -->

    <!-- Footer -->
    <div>
        <?php include('footer.php') ?>
    </div>
    <!-- Footer -->

</body>

</html>