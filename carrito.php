<?php
//session_start();
include './CodigoPHP/carrodecompras.php';
$Total = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carrito</title>

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

<body class="CarritoBody">

    <div>
        <?php include("./header.php") ?>
    </div>

    <div class="mx-4">
        <br>
        <h3>Lista del carrito</h3>
        <?php if (!empty($_SESSION['Carrito'])) { ?>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th width="10%" class="text-center">Marca</th>
                        <th width="10%" class="text-center">Modelo</th>
                        <th width="10%" class="text-center">Categoria</th>
                        <th width="30%" class="text-center">Descripción</th>
                        <th width="10%" class="text-center">Cantidad</th>
                        <th width="10%" class="text-center">Precio</th>
                        <th width="10%" class="text-center">Total</th>
                        <th width="10%" class="text-center"><i class="fas fa-trash-alt"></i></th>
                    </tr>
                    <?php foreach ($_SESSION['Carrito'] as $Indice => $producto) { ?>
                        <tr>
                            <td width="10%" class="text-center"><?php echo $producto['Marca']; ?></td>
                            <td width="10%" class="text-center"><?php echo $producto['Modelo']; ?></td>
                            <td width="10%" class="text-center"><?php echo $producto['Categoria']; ?></td>
                            <td width="30%" class="text-justify"><?php echo $producto['Descripcion']; ?></td>
                            <td width="10%" class="text-center"><?php echo $producto['Cantidad']; ?></td>
                            <td width="10%" class="text-center"><?php echo $producto['Precio']; ?></td>
                            <td width="10%" class="text-center"><?php echo number_format($producto['Precio'] * $producto['Cantidad'], 2); ?></td>
                            <td width="10%" class="text-center">
                                <form action="" method="POST">
                                    <input type="hidden" name="id" id="id" value="<?php echo $producto['ID']; ?>">
                                    <input type="hidden" name="marca" id="marca" value="<?php echo $producto['Marca']; ?>">
                                    <input type="hidden" name="modelo" id="modelo" value="<?php echo $producto['Modelo']; ?>">
                                    <input type="hidden" name="categoria" id="categoria" value="<?php echo $producto['Categoria']; ?>">
                                    <input type="hidden" name="descripcion" id="descripcion" value="<?php echo $producto['Descripcion']; ?>">
                                    <input type="hidden" name="cantidad" id="cantidad" value="<?php echo $producto['Cantidad'] ?>">
                                    <input type="hidden" name="precio" id="precio" value="<?php echo $producto['Precio'] ?>">
                                    <button class="btn btn-danger" type="submit" name="btnAccion" value="Eliminar">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        <?php $Total += ($producto['Precio'] * $producto['Cantidad']); ?>
                    <?php } ?>
                    <tr>
                        <div>
                            <td colspan="6">
                                <h3 class="text-right">Total</h3>
                            </td>
                            <td>
                                <h3 class="text-right"><?php echo number_format($Total, 2); ?></h3>
                            </td>
                        </div>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="8">
                            <form method="post" action="./CodigoPHP/pagar.php">
                                <button class="btn btn-primary btn-lg btn-block" value="proceder" name="btnAccion" type="submit"><i class="fas fa-hand-holding-usd"></i> Pagar</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php } else { ?>
            <div class="alert alert-warning" role="alert">
                No hay productos en el carrito
            </div>
        <?php } ?>
    </div>

    <div>
        <?php include("./footer.php") ?>
    </div>
</body>

</html>