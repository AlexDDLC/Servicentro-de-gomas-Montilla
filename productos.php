<?php
require('./CodigoPHP/conexion.php');
include("./CodigoPHP/Session_segura.php");
$rol = 'Empleado';
$Mensaje = '';
$datos = '';
if (!empty($_POST['modelo_producto'])) {
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT id, modelo FROM productos WHERE modelo=:modelo_producto";
    $resultado = $conexion->prepare($sql);
    $email = htmlentities(addslashes($_POST["modelo_producto"]));
    $resultado->bindValue(":modelo_producto", $email);
    $resultado->execute();
    $datos = $resultado->fetch(PDO::FETCH_ASSOC);
    $Numero_registro = $resultado->rowCount();
    if ($Numero_registro != 0) {
        $mensaje = 'El usuario existe';
    } else {
        $sql = "INSERT INTO productos (foto,marca,modelo,categoria,precio_compra,precio_venta,descripcion_corta,descripcion_larga,stock,estado) 
        VALUES (:fotoproducto,:marca,:modelo,:categoria,:preciocompra,:precioventa,:descripcioncorta,:descripcionlarga,:stock,:estado)";
        $stmt = $conexion->prepare($sql);
        $foto_nombre = $_FILES['foto_producto']['name'];
        $foto = $_FILES['foto_producto']['tmp_name'];
        $destino = "Imagenes/" . $foto_nombre . $_POST['marca_producto'] . $_POST['categoria_producto'] . $_POST['modelo_producto'];
        move_uploaded_file($foto, $destino);
        $stmt->bindParam(':fotoproducto', $destino);
        $stmt->bindParam(':marca', $_POST['marca_producto']);
        $stmt->bindParam(':modelo', $_POST['modelo_producto']);
        $stmt->bindParam(':categoria', $_POST['categoria_producto']);
        $stmt->bindParam(':preciocompra', $_POST['PrecioCompra']);
        $stmt->bindParam(':precioventa', $_POST['PrecioVenta']);
        $stmt->bindParam(':descripcioncorta', $_POST['descripcion_corta']);
        $stmt->bindParam(':descripcionlarga', $_POST['descripcion_larga']);
        $stmt->bindParam(':estado', $_POST['estado_producto']);
        $stmt->bindParam(':stock', $_POST['Stock']);

        if ($stmt->execute()) {
            $mensaje = 'Usuario creado';
        } else {
            $mensaje = 'Error';
        }
    }
}

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'agregar':
            $NS = $_POST['txt_stock'];
            $IDP = $_POST['idprodsto'];
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE productos SET stock = stock + '$NS' WHERE id = '$IDP'";
            $resultado = $conexion->prepare($sql);
            $resultado->execute();
            header('Location:./productos.php');
            break;
        case 'archivar':
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $estado = 'Archivado';
            $IDP = $_POST['idprodarc'];
            $sql = "UPDATE productos SET estado = '$estado' WHERE id = '$IDP'";
            $resultado = $conexion->prepare($sql);
            $resultado->execute();
            header('Location:./productos.php');
            break;
        case 'desarchivar':
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $estado = 'Disponible';
            $IDP = $_POST['idproddisp'];
            $sql = "UPDATE productos SET estado = '$estado' WHERE id = '$IDP'";
            $resultado = $conexion->prepare($sql);
            $resultado->execute();
            header('Location:./productos.php');
            break;
        case 'editar':
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $marc = $_POST['edmarca_producto'];
            $model = $_POST['edmodelo_producto'];
            $categ = $_POST['edcategoria_producto'];
            $prescon = $_POST['edPrecioCompra'];
            $presven = $_POST['edPrecioVenta'];
            $descor = $_POST['eddescripcion_corta'];
            $deslar = $_POST['eddescripcion_larga'];
            $stock = $_POST['edStock'];
            $estado = $_POST['edestado'];
            $IDP = $_POST['idproded'];
            $sql = "UPDATE productos SET marca = '$marc', 
                                         modelo = '$model', 
                                         categoria = '$categ', 
                                         precio_compra = '$prescon', 
                                         precio_venta = '$presven', 
                                         descripcion_corta = '$descor', 
                                         descripcion_larga = '$deslar', 
                                         stock = '$stock', 
                                         estado = '$estado' 
                                         WHERE id = '$IDP'";
            $resultado = $conexion->prepare($sql);
            $resultado->execute();
            header('Location:./productos.php');
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos</title>

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

    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" href="#listar" role="tab" data-toggle="tab">Productos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#compras" role="tab" data-toggle="tab">Agregar</a>
        </li>
    </ul>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade show active" id="listar">
            <div class="b4 container">
                <div class="row my-2">

                    <?php require('./CodigoPHP/conexion.php');
                    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT * FROM productos";
                    $resultado = $conexion->prepare($sql);
                    $resultado->execute();
                    while ($datos = $resultado->fetch(PDO::FETCH_ASSOC)) { ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="single-awesome-project">
                                    <div class="awesome-img-tienda">
                                        <div class="container-fluid text-center">
                                            <img class="card-img-top" src="<?php echo $datos['foto']; ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="MarcaModelo">
                                        <h4 class="card-title"><?php echo $datos['marca'] . " " . $datos['modelo'] ?></h4>
                                    </div>
                                    <div class="ProductoDato">
                                        <h5><span><i class="fas fa-dollar-sign"></i> Precio compra:</span> <?php echo  $datos['precio_compra']; ?></h5>
                                        <h5><span><i class="fas fa-dollar-sign"></i> Precio venta: </span> <?php echo  $datos['precio_venta']; ?></h5>
                                        <h5><span><i class="fas fa-list"></i> Categoria: </span> <?php echo  $datos['categoria']; ?></h5>
                                        <h5><span><i class="fas fa-cubes"></i> Dispobibles: </span><?php echo $datos['stock'] ?></h5>
                                        <h5><span><i class="far fa-star"></i> Estado: </span><?php echo $datos['estado']; ?></h5>
                                        <h5><span><i class="far fa-file-alt"></i> Descripcion corta: </span>
                                            <h6 class="text-justify"><?php echo $datos['descripcion_corta']; ?></h6>
                                        </h5>
                                        <h5><span><i class="fas fa-file-alt"></i> Descripcion larga: </span>
                                            <h6 class="text-justify"><?php echo $datos['descripcion_larga']; ?></h6>
                                        </h5>
                                    </div>
                                    <form action="" method="post">
                                        <div class="row justify-content-center">
                                            <div class="d-block my-3">
                                                <a href="#editar<?php echo $datos['id'] ?>" data-toggle="modal">
                                                    <button class="btn btn-warning" class="btn btn-warning">
                                                        <span><i class="fas fa-pencil-alt"></i> Editar</span>
                                                    </button>
                                                </a>
                                                <a href="#archivar<?php echo $datos['id'] ?>" data-toggle="modal">
                                                    <button type="button" class="btn btn-danger">
                                                        <span><i class="far fa-folder"></i> Archivar</span>
                                                    </button>
                                                </a>
                                                <a href="#desarchivar<?php echo $datos['id'] ?>" data-toggle="modal">
                                                    <button type="button" class="btn btn-info">
                                                        <span> <i class="far fa-folder-open"></i> Disponible</span>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="d-block my-1">
                                                <a href="#stock<?php echo $datos['id'] ?>" data-toggle="modal">
                                                    <button type="button" class="btn btn-success">
                                                        <span><i class="fas fa-plus"></i> Stock</span>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Modal content stock-->
                                        <div class="modal fade" id="stock<?php echo $datos['id']; ?>" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Modificar el inventario</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <form action="" method="post">
                                                        <div class="modal-body">
                                                            <div class="container-fluid text-center">
                                                                <p>Introduzca la cantidad...</p>
                                                                <input type="hidden" name="idprodsto" value="<?php echo $datos['id']; ?>">
                                                                <input type="text" name="txt_stock" required id="txt_stock">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">

                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                                <span> Cancelar</span>
                                                            </button>

                                                            <button type="submit" name="accion" value="agregar" class="btn btn-primary">
                                                                <span>Aceptar</span>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal content archivar-->
                                        <div class="modal fade" id="archivar<?php echo $datos['id']; ?>" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Estado del producto</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <form action="" method="post">
                                                        <div class="modal-body">
                                                            <div class="container-fluid text-center">
                                                                <input type="hidden" name="idprodarc" value="<?php echo $datos['id']; ?>">
                                                                <p>¿Desea archivar el producto?</p>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">

                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                                <span> Cancelar</span>
                                                            </button>

                                                            <button type="submit" name="accion" value="archivar" class="btn btn-primary">
                                                                <span>Aceptar</span>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal content desarchivar-->
                                        <div class="modal fade" id="desarchivar<?php echo $datos['id']; ?>" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Estado del producto</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <form action="" method="post">
                                                        <div class="modal-body">
                                                            <div class="container-fluid text-center">
                                                                <input type="hidden" name="idproddisp" value="<?php echo $datos['id']; ?>">
                                                                <p>Ahora el producto esta disponible para los clintes</p>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">

                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                                <span> Cancelar</span>
                                                            </button>

                                                            <button type="submit" name="accion" value="desarchivar" class="btn btn-primary">
                                                                <span>Aceptar</span>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal content editar-->
                                        <div class="modal fade" id="editar<?php echo $datos['id']; ?>" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Editar datos del producto</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <form action="" method="post">
                                                        <div class="modal-body">
                                                            <div class="container-fluid text-center">
                                                                <input type="hidden" name="idproded" value="<?php echo $datos['id']; ?>">
                                                                <!-- <form method="POST"> -->
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputMarca">Marca</label>
                                                                            <select id="inputMarca" class="form-control" name="edmarca_producto">
                                                                                <option value="<?php echo $datos['marca']; ?>"><?php echo $datos['marca']; ?></option>
                                                                                <option value="Bridgestone">Bridgestone</option>
                                                                                <option value="Continental">Continental</option>
                                                                                <option value="Dunlop">Dunlop</option>
                                                                                <option value="Firestone">Firestone</option>
                                                                                <option value="Goodyear">Goodyear</option>
                                                                                <option value="Hankook">Hankook</option>
                                                                                <option value="Michelin">Michelin</option>
                                                                                <option value="Pirelli">Pirelli</option>
                                                                                <option value="Yokohama">Yokohama</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputCategoria">Categoría</label>
                                                                            <select id="inputCategoria" class="form-control" name="edcategoria_producto">
                                                                                <option value="<?php echo $datos['categoria']; ?>"><?php echo $datos['categoria']; ?></option>
                                                                                <option value="Autobuses">Autobuses</option>
                                                                                <option value="Bicicletas">Bicicletas</option>
                                                                                <option value="Camiones">Camiones</option>
                                                                                <option value="Motocicletas">Motocicletas</option>
                                                                                <option value="Sedanes">Sedanes</option>
                                                                                <option value="SUV y Pick-Up">SUV y Pick-Up</option>
                                                                                <option value="Tractores">Tractores</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputModelo">Modelo</label>
                                                                            <input type="text" class="form-control" id="inputModelo" name="edmodelo_producto" placeholder="Modelo" value="<?php echo $datos['modelo']; ?>" required>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputPrecioCompra">Precio compra</label>
                                                                            <input type="text" class="form-control" id="inputPrecioCompra" name="edPrecioCompra" placeholder="Precio compra" value="<?php echo $datos['precio_compra']; ?>" required>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputPrecioVenta">Precio venta</label>
                                                                            <input type="text" class="form-control" id="inputPrecioVenta" name="edPrecioVenta" placeholder="Precio venta" value="<?php echo $datos['precio_venta']; ?>" required>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputStock">Stock</label>
                                                                            <input type="text" class="form-control" id="inputStock" name="edStock" placeholder="Stock" value="<?php echo $datos['stock'] ?>" required>
                                                                        </div>
                                                                        <div class="form-group col-md-12">
                                                                            <label for="inputEstado">Estado</label>
                                                                            <select id="inputEstado" class="form-control" name="edestado">
                                                                                <option value="<?php echo $datos['estado']; ?>"><?php echo $datos['estado']; ?></option>
                                                                                <option value="Archivado">Archivado</option>
                                                                                <option value="Disponible">Disponible</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12">
                                                                            <label for="inputDescripciónCorta">Descripción corta</label>
                                                                            <input type="text" class="form-control" id="inputDescripcionCorta" name="eddescripcion_corta" value="<?php echo $datos['descripcion_corta']; ?>" placeholder="Descripción corta" required>
                                                                        </div>
                                                                        <div class="form-group col-md-12">
                                                                            <label for="inputDescripciónLarga">Descripción larga</label>
                                                                            <input type="text" class="form-control" id="inputDescripcionLarga" name="eddescripcion_larga" value="<?php echo $datos['descripcion_larga']; ?>" placeholder="Descripción larga" required>
                                                                        </div>
                                                                    </div>
                                                                <!-- </form> -->
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">

                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                                <span>Cancelar</span>
                                                            </button>

                                                            <button type="submit" name="accion" value="editar" class="btn btn-primary">
                                                                <span>Aceptar</span>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
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

        <!-- Agregar producto -->
        <div role="tabpanel" class="tab-pane fade" id="compras">
            <div class="Empleados_Agregar">
                <div class="b4 container">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-4 text-center">
                                <label for="inputFoto">Foto del producto</label>
                                <input type="file" class="form-control" name="foto_producto" id="inputFoto" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputMarca">Marca</label>
                                <select id="inputMarca" class="form-control" name="marca_producto">
                                    <option>Elegir...</option>
                                    <option value="Bridgestone">Bridgestone</option>
                                    <option value="Continental">Continental</option>
                                    <option value="Dunlop">Dunlop</option>
                                    <option value="Firestone">Firestone</option>
                                    <option value="Goodyear">Goodyear</option>
                                    <option value="Hankook">Hankook</option>
                                    <option value="Michelin">Michelin</option>
                                    <option value="Pirelli">Pirelli</option>
                                    <option value="Yokohama">Yokohama</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputCategoria">Categoría</label>
                                <select id="inputCategoria" class="form-control" name="categoria_producto">
                                    <option>Elegir...</option>
                                    <option value="Autobuses">Autobuses</option>
                                    <option value="Bicicletas">Bicicletas</option>
                                    <option value="Camiones">Camiones</option>
                                    <option value="Motocicletas">Motocicletas</option>
                                    <option value="Sedanes">Sedanes</option>
                                    <option value="SUV y Pick-Up">SUV y Pick-Up</option>
                                    <option value="Tractores">Tractores</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputModelo">Modelo</label>
                                <input type="text" class="form-control" id="inputModelo" name="modelo_producto" placeholder="Modelo" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputPrecioCompra">Precio compra</label>
                                <input type="text" class="form-control" id="inputPrecioCompra" name="PrecioCompra" placeholder="Precio compra" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputPrecioVenta">Precio venta</label>
                                <input type="text" class="form-control" id="inputPrecioVenta" name="PrecioVenta" placeholder="Precio venta" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputStock">Stock</label>
                                <input type="text" class="form-control" id="inputStock" name="Stock" placeholder="Stock" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputEstado">Estado</label>
                                <select id="inputEstado" class="form-control" name="estado_producto">
                                    <option>Elegir...</option>
                                    <option value="Archivado">Archivado</option>
                                    <option value="Disponible">Disponible</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputDescripciónCorta">Descripción corta</label>
                                <input type="text" class="form-control" id="inputDescripcionCorta" name="descripcion_corta" placeholder="Descripción corta" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputDescripciónLarga">Descripción larga</label>
                                <input type="text" class="form-control" id="inputDescripcionLarga" name="descripcion_larga" placeholder="Descripción larga" required>
                            </div>
                        </div>
                        <div class="row">
                            <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Guardar</button>

                            <a class="nav-link" href="#listar" role="tab" data-toggle="tab">
                                <button type="button" class="btn btn-danger">
                                    <span><i class="far fa-window-close"></i> Cancelar</span>
                                </button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Agregar empleado -->

        <!-- Despedir empleado -->
        <div role="tabpanel" class="tab-pane fade" id="buzz">

        </div>
        <!-- /Despedir empleado -->

        <!-- Modificar empleado -->
        <div role="tabpanel" class="tab-pane fade" id="references">

        </div>
        <!-- /Modificar empleado -->
    </div>

    <div>
        <?php include("./footer.php") ?>
    </div>

</body>

</html>