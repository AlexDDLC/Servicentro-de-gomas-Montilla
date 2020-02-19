<?php
require('./CodigoPHP/conexion.php');
require('./CodigoPHP/carrodecompras.php');
//session_start();

$ID = '';
$Marca = '';
$Modelo = '';
$Categoria = '';
$Descripcion = '';
$Cantidad = 1;
$Precio = '';
$datos = '';
$StockP = '';
if (isset($_GET['id'])) {
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT id,foto,marca,modelo,categoria,precio_venta,descripcion_larga, descripcion_corta,stock FROM productos WHERE id=:id_producto";
    $resultado = $conexion->prepare($sql);
    $id = htmlentities(addslashes($_GET['id']));
    $resultado->bindValue(":id_producto", $id);
    $resultado->execute();
    $datos = $resultado->fetch(PDO::FETCH_ASSOC);
    $Numero_registro = $resultado->rowCount();
    if ($Numero_registro != 0) {
        $ID = $datos['id'];
        $Marca = $datos['marca'];
        $Modelo = $datos['modelo'];
        $Categoria = $datos['categoria'];
        $Descripcion = $datos['descripcion_corta'];
        $Precio = $datos['precio_venta'];
        $Categoria = $datos['categoria'];
        $StockP = $datos['stock'];
    }
}
// if (isset($_POST['btnAccion'])) {
//     switch ($_POST['btnAccion']) {
//         case 'Agregar':
//             if (is_numeric($ID)) {
//                 $Mensaje = 'OK ID correcto ' . $ID;
//             } else {
//                 $Mensaje = 'ID incorrecto';
//             }
//             if (!isset($_SESSION['Carrito'])) {
//                 $producto = array(
//                     'ID' => $ID,
//                     'Marca' => $datos['marca'],
//                     'Modelo' => $datos['modelo'],
//                     'Categoria' => $datos['categoria'],
//                     'Precio' => $datos['precio_venta'],
//                     'Descripcion' => $datos['descripcion_corta'],
//                     'Cantidad' => $Cantidad
//                 );
//                 $_SESSION['Carrito'][0] = $producto;
//             } else {
//                 $NumeroDeProducto = count($_SESSION['Carrito']);
//                 $producto = array(
//                     'ID' => $ID,
//                     'Marca' => $datos['marca'],
//                     'Modelo' => $datos['modelo'],
//                     'Categoria' => $datos['categoria'],
//                     'Precio' => $datos['precio_venta'],
//                     'Descripcion' => $datos['descripcion_corta'],
//                     'Cantidad' => $Cantidad
//                 );
//                 $_SESSION['Carrito'][$NumeroDeProducto] = $producto;
//             }
//             $Mensaje = print_r($_SESSION, true);

//             break;
//     }
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Detalles</title>

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

    <div>
        <?php include("./header.php") ?>
    </div>

    <!-- Page Content -->
    <div class="container">

        <?php if ($Mensaje != '') { ?>
            <div class="alert alert-success" role="alert">
                <p><i class="fas fa-cart-arrow-down"></i> <?php echo $Mensaje; ?></p>
                <a href="./carrito.php" class="badge badge-success">Ver Carrito</a>
            </div>
        <?php } ?>

        <?php if ($MensajeStock != '') { ?>
            <div class="alert alert-warning" role="alert">
                <p><i class="fas fa-exclamation-triangle"></i> <?php echo $MensajeStock; ?></p>
                <a href="./carrito.php" class="badge badge-success">Ver Carrito</a>
            </div>
        <?php } ?>
        <div class="row">

            <div class="col-lg-12">

                <div class="card mt-4">
                    <div class="DetalleImagen">
                        <img class="card-img-top img-fluid" src="<?php echo $datos['foto']; ?>" alt="">
                    </div>
                    <div class="card-body">
                        <div class="MarcaModelo">
                            <h4 class="card-title"><?php echo $datos['marca'] . " " . $datos['modelo'] ?></h4>
                        </div>
                        <div class="ProductoPrecio">
                            <h5><span><i class="fas fa-dollar-sign"></i>RD </span><?php echo $datos['precio_venta']; ?></h5>
                            <p><span><i class="fas fa-cubes"></i> Dispobibles: </span><?php echo $datos['stock']; ?></p>
                        </div>
                        <p class="card-text"><?php echo $datos['descripcion_larga']; ?></p>
                        <form action="" method="POST">
                            <input type="hidden" name="id" id="id" value="<?php echo $ID; ?>">
                            <input type="hidden" name="marca" id="marca" value="<?php echo $Marca; ?>">
                            <input type="hidden" name="modelo" id="modelo" value="<?php echo $Modelo; ?>">
                            <input type="hidden" name="categoria" id="categoria" value="<?php echo $Categoria; ?>">
                            <input type="hidden" name="descripcion" id="descripcion" value="<?php echo $Descripcion; ?>">
                            <input type="hidden" name="stock" id="stock" value="<?php echo $StockP; ?>">
                            <input type="text" class="text-center" style="width: 50px" name="cantidad" id="cantidad" value="1">
                            <input type="hidden" name="precio" id="precio" value="<?php echo $Precio; ?>">
                            <button name="btnAccion" value="Agregar" type="submit" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Añador al carrito</button>
                        </form>
                    </div>
                    <div class="card-footer b4 text-center">
                        <small><span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span></small>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>

        <!-- Container -->
        <div class="my-3 b4 container-fluid">
            <h1 class="b4 text-center">Similares</h1>
        </div>
        <!-- Container -->

        <div class="row">

            <?php require('./CodigoPHP/conexion.php');
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM productos WHERE categoria = '$Categoria' AND id != '$ID'";
            $resultado = $conexion->prepare($sql);
            $resultado->execute();
            while ($datos = $resultado->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="container-fluid text-center">
                            <div class="single-awesome-project">
                                <div class="awesome-img-tienda">
                                    <a href="#"><img class="card-img-top" src="<?php echo $datos['foto']; ?>" alt=""></a>
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
                                <h4 class="card-title"><?php echo $datos['marca'] . " " . $datos['modelo']; ?></h4>
                            </div>
                            <div class="ProductoPrecio">
                                <h5><span><i class="fas fa-dollar-sign"></i>RD: </span><?php echo $datos['precio_venta']; ?></h5>
                                <p><span><i class="fas fa-cubes"></i> Dispobibles: </span><?php echo $datos['stock']; ?></p>
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
    </div>
    <!-- /.container -->

    <div>
        <?php include("./footer.php") ?>
    </div>

</body>

</html>