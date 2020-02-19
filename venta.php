<?php
require('./CodigoPHP/conexion.php');
//include("./CodigoPHP/Session_segura.php");
require('./CodigoPHP/carrodecompras.php');
$rol = 'Empleado';
$mensaje = '';

if (!empty($_POST['email_empleado'])) {
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT id, email FROM usuarios WHERE email=:email_empleado";
    $resultado = $conexion->prepare($sql);
    $email = htmlentities(addslashes($_POST["email_empleado"]));
    $resultado->bindValue(":email_empleado", $email);
    $resultado->execute();
    $datos = $resultado->fetch(PDO::FETCH_ASSOC);
    $Numero_registro = $resultado->rowCount();
    if ($Numero_registro != 0) {
        $mensaje = 'El usuario existe';
    } else {
        $sql = "INSERT INTO usuarios (cedula,nombre_usuario,foto,telefono1,telefono2,direccion,rol,cargo,sueldo,email,contrasena) VALUES (:cedula,:nombreuser,:fotouser,:telefono1,:telefono2,:direccion,'$rol',:cargouser,:sueldo,:email,:contrasenauser)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombreuser', $_POST['nombre_empleado']);
        $stmt->bindParam(':cedula', $_POST['cedula_empleado']);
        $stmt->bindParam(':sueldo', $_POST['sueldo_empleado']);
        $foto_nombre = $_FILES['foto_empleado']['name'];
        $foto = $_FILES['foto_empleado']['tmp_name'];
        $destino = "Imagenes/" . $foto_nombre . $_POST['nombre_empleado'] . $_POST['email_empleado'];
        move_uploaded_file($foto, $destino);
        $stmt->bindParam(':fotouser', $destino);
        $stmt->bindParam(':cargouser', $_POST['cargo_empleado']);
        $stmt->bindParam(':telefono1', $_POST['telefono_2']);
        $stmt->bindParam(':telefono2', $_POST['telefono_2']);
        $stmt->bindParam(':direccion', $_POST['direccion_empleado']);
        $stmt->bindParam(':email', $_POST['email_empleado']);
        $contrasenaempleado = password_hash($_POST['contrasena_empleado'], PASSWORD_BCRYPT);
        $stmt->bindParam(':contrasenauser', $contrasenaempleado);

        if ($stmt->execute()) {
            $mensaje = 'Usuario creado';
        } else {
            $mensaje = 'Error';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Empleados</title>

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

<body class="">

    <div>
        <?php include("./header.php") ?>
    </div>

    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" href="#vender" role="tab" data-toggle="tab">Vender</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#listar" role="tab" data-toggle="tab">Listar</a>
        </li>
    </ul>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade show active" id="vender">
            <div class="mx-3">
                <div class="container-fluid">
                    <h1 class="text-center my-3"><i class="fas fa-cash-register"></i>Ventas</h1>
                </div>

                <?php if ($Mensaje != '') { ?>
                    <div class="alert alert-success" role="alert">
                        <p><i class="fas fa-cart-arrow-down"></i> <?php echo $Mensaje; ?></p>
                        <a href="./carrito.php" class="badge badge-success">Ver Carrito</a>
                    </div>
                <?php } ?>

                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th width="10%" class="text-center">Foto</th>
                            <th width="10%" class="text-center">Marca</th>
                            <th width="10%" class="text-center">Modelo</th>
                            <th width="10%" class="text-center">Categoria</th>
                            <th width="20%" class="text-center">Descripción</th>
                            <th width="10%" class="text-center">Stock</th>
                            <th width="10%" class="text-center">Precio</th>
                            <th width="10%" class="text-center">Cantidad</th>
                            <th width="10%" class="text-center"><i class="fas fa-cart-arrow-down"></i></th>
                        </tr>
                        <?php require('./CodigoPHP/conexion.php');
                        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql = "SELECT * FROM productos";
                        $resultado = $conexion->prepare($sql);
                        $resultado->execute();
                        while ($datos = $resultado->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr>
                                <td width="10%" class="text-center"><img height="100px" src="<?php echo $datos['foto']; ?>" alt=""></td>
                                <td width="10%" class="text-center"><?php echo $datos['marca']; ?></td>
                                <td width="10%" class="text-center"><?php echo $datos['modelo']; ?></td>
                                <td width="10%" class="text-center"><?php echo $datos['categoria']; ?></td>
                                <td width="20%" class="text-justify"><?php echo $datos['descripcion_corta']; ?></td>
                                <td width="10%" class="text-center"><?php echo $datos['stock']; ?></td>
                                <td width="10%" class="text-center"><?php echo $datos['precio_venta']; ?></td>
                                <form action="" method="POST">
                                    <td width="10%" class="text-center">
                                        <input type="text" class="text-center" style="width: 50px" name="cantidad" id="cantidad" value="1">
                                    </td>
                                    <td width="10%" class="text-center">
                                        <input type="hidden" name="id" id="id" value="<?php echo $datos['id']; ?>">
                                        <input type="hidden" name="marca" id="marca" value="<?php echo $datos['marca']; ?>">
                                        <input type="hidden" name="modelo" id="modelo" value="<?php echo $datos['modelo']; ?>">
                                        <input type="hidden" name="categoria" id="categoria" value="<?php echo $datos['categoria']; ?>">
                                        <input type="hidden" name="descripcion" id="descripcion" value="<?php echo $datos['descripcion_corta']; ?>">
                                        <input type="hidden" name="stock" id="stock" value="<?php echo $datos['stock']; ?>">
                                        <input type="hidden" name="precio" id="precio" value="<?php echo $datos['precio_venta']; ?>">
                                        <button class="btn btn-primary" type="submit" name="btnAccion" value="Agregar">Agregar</button>
                                    </td>
                                </form>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td class="text-center" colspan="9">
                                <form method="post" action="./CodigoPHP/pagar.php">
                                    <button class="btn btn-primary btn-lg btn-block" value="proceder" name="btnAccion" type="submit"><i class="fas fa-hand-holding-usd"></i> Pagar</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

        <!-- Agregar empleado -->
        <div role="tabpanel" class="tab-pane fade" id="listar">
            <div class="Empleados_Agregar">
                <div class="mx-3">
                    <?php require('./CodigoPHP/conexion.php');
                    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT VEN.id, PRO.foto, DVN.idventa, VEN.correocomprador, VEN.vendedor, VEN.fecha, VEN.total, VEN.clavetransaccion, 
                    VEN.estado, PRO.marca, PRO.modelo, PRO.categoria, PRO.descripcion_corta, PRO.precio_venta, DVN.cantidad, 
                    DVN.total as TotalDetalle, VEN.total AS TotalVenta
                    FROM ventas VEN 
                    INNER JOIN detalleventa DVN ON VEN.id = DVN.idventa 
                    INNER JOIN productos PRO ON DVN.id = PRO.id
                    WHERE VEN.id = DVN.idventa";
                    $resultado = $conexion->prepare($sql);
                    $resultado->execute();
                    while ($datos = $resultado->fetch(PDO::FETCH_ASSOC)) { ?>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th colspan="1" class="text-center">ID venta: <?php echo $datos['id']; ?></th>
                                    <th colspan="2" class="text-center">Fecha: <?php echo $datos['fecha']; ?></th>
                                    <th colspan="2" class="text-center">Vendedor: <?php echo $datos['vendedor']; ?></th>
                                    <th colspan="2" class="text-center">Comprador: <?php echo $datos['correocomprador']; ?></th>
                                    <th colspan="1" class="text-center">Clave transacción: <?php echo $datos['clavetransaccion']; ?></th>
                                </tr>
                                <tr>
                                    <th width="10%" class="text-center">Foto</th>
                                    <th width="10%" class="text-center">Marca</th>
                                    <th width="10%" class="text-center">Modelo</th>
                                    <th width="10%" class="text-center">Categoria</th>
                                    <th width="30%" class="text-center">Descripción</th>
                                    <th width="10%" class="text-center">Precio</th>
                                    <th width="10%" class="text-center">Cantidad</th>
                                    <th width="10%" class="text-center">Total</th>
                                </tr>
                                <tr>
                                    <td width="10%" class="text-center"><img height="100px" src="<?php echo $datos['foto']; ?>" alt=""></td>
                                    <td width="10%" class="text-center"><?php echo $datos['marca']; ?></td>
                                    <td width="10%" class="text-center"><?php echo $datos['modelo']; ?></td>
                                    <td width="10%" class="text-center"><?php echo $datos['categoria']; ?></td>
                                    <td width="30%" class="text-justify"><?php echo $datos['descripcion_corta']; ?></td>
                                    <td width="10%" class="text-center"><?php echo $datos['precio_venta']; ?></td>
                                    <td width="10%" class="text-center"><?php echo $datos['cantidad']; ?></td>
                                    <td width="10%" class="text-center"><?php echo $datos['TotalDetalle']; ?></td>
                                </tr>
                                <tr>
                                    <div>
                                        <td colspan="7">
                                            <h3 class="text-right">Total</h3>
                                        </td>
                                        <td>
                                            <h3 class="text-right"><?php echo $datos['TotalVenta']; ?></h3>
                                        </td>
                                    </div>
                                </tr>
                                <hr>
                            <?php } ?>
                        </tbody>
                    </table>

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