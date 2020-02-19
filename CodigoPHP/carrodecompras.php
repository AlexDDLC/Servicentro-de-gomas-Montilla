<?php
session_start();
$ID = '';
$Mensaje = '';
$producto = '';
$MensajeStock = '';
$NumeroDeProducto = '';
if (isset($_POST['btnAccion'])) {
    switch ($_POST['btnAccion']) {
        case 'Agregar':
            $stock = $_POST['stock'];
            $cantidadventa = $_POST['cantidad'];
            if ($stock < $cantidadventa) {
                $MensajeStock = 'La cantidad introducida es mayor que la cantidad disponible en el stock';
            } else {
                if (!isset($_SESSION['Carrito'])) {
                    $producto = array(
                        'ID' => $_POST['id'],
                        'Marca' => $_POST['marca'],
                        'Modelo' => $_POST['modelo'],
                        'Categoria' => $_POST['categoria'],
                        'Precio' => $_POST['precio'],
                        'Descripcion' => $_POST['descripcion'],
                        'Cantidad' => $_POST['cantidad'],
                        'Total' => ($_POST['cantidad'] * $_POST['precio'])
                    );
                    $_SESSION['Carrito'][0] = $producto;
                    $Mensaje = ' Producto agregado al carrito';
                } else {
                    $ID_Producto = array_column($_SESSION['Carrito'], "ID");
                    if (in_array($_POST['id'], $ID_Producto)) {
                        $Mensaje = ' El producto ya está en el carrito';
                    } else {
                        $NumeroDeProducto = count($_SESSION['Carrito']);
                        $producto = array(
                            'ID' => $_POST['id'],
                            'Marca' => $_POST['marca'],
                            'Modelo' => $_POST['modelo'],
                            'Categoria' => $_POST['categoria'],
                            'Precio' => $_POST['precio'],
                            'Descripcion' => $_POST['descripcion'],
                            'Cantidad' => $_POST['cantidad'],
                            'Total' => ($_POST['cantidad'] * $_POST['precio'])
                        );
                        array_push($_SESSION['Carrito'], $producto);
                        $Mensaje = ' Producto agregado al carrito';
                    }
                }
            }
            break;
        case 'Eliminar':
            if (is_numeric($_POST['id'])) {
                foreach ($_SESSION['Carrito'] as $Indicee => $producto) {
                    if ($producto['ID'] == $_POST['id']) {
                        unset($_SESSION['Carrito'][$Indicee]);
                    }
                }
                //print_r($producto);
            } else {
                $Mensaje = 'Error';
            }
            break;
    }
}
