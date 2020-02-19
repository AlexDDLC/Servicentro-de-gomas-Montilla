<?php
require('./CodigoPHP/conexion.php');
include("./CodigoPHP/Session_segura.php");
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
    <link href="./CSS/Estilos.css" rel="stylesheet">

</head>

<body class="TiendaBody">

    <div>
        <?php include("./header.php") ?>
    </div>

    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" href="#listar" role="tab" data-toggle="tab">Empleados</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#agregar" role="tab" data-toggle="tab">Agregar</a>
        </li>
    </ul>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade show active" id="listar">
            <div class="mx-4">
                <div class="row my-2">
                    <?php
                    require('./CodigoPHP/conexion.php');
                    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT * FROM usuarios";
                    $resultado = $conexion->prepare($sql);
                    $resultado->execute();
                    while ($datos = $resultado->fetch(PDO::FETCH_ASSOC)) { ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="container-fluid text-center">
                                    <div class="single-awesome-project-empleado">
                                        <div class="awesome-img-empleado">
                                            <img class="card-img-top" src="<?php echo $datos['foto']; ?>" height="250px" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="MarcaModelo">
                                        <h4 class="card-title"><?php echo $datos['nombre_usuario'] ?></h4>
                                    </div>
                                    <div class="EmpleadoDato">
                                        <h6><span><i class="far fa-id-card"></i> Cedula: </span><?php echo $datos['cedula']; ?></h6>
                                        <h6><span><i class="fas fa-user-tag"></i> Cargo: </span><?php echo $datos['cargo'] ?></h6>
                                        <h6><span><i class="far fa-envelope"></i> Email: </span><?php echo $datos['email'] ?></h6>
                                        <h6><span><i class="fas fa-phone"></i> Telefono 1: </span><?php echo $datos['telefono1'] ?></h6>
                                        <h6><span><i class="fas fa-phone"></i> Telefono 2: </span><?php echo $datos['telefono2'] ?></h6>
                                        <h6><span><i class="fas fa-dollar-sign"></i> Sueldo: </span><?php echo $datos['sueldo'] ?></h6>
                                        <h6><span><i class="fas fa-map-marked-alt"></i> Dirección: </span><?php echo $datos['direccion'] ?></h6>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="d-block my-3">
                                            <a href="#" class="btn btn-warning"><i class="fas fa-pencil-alt"></i> Editar</a>
                                            <a href="#" class="btn btn-danger"><i class="fas fa-user-times"></i> Despedir</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- Agregar empleado -->
        <div role="tabpanel" class="tab-pane fade" id="agregar">
            <div class="Empleados_Agregar">
                <div class="b4 container">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6 text-center">
                                <label for="inputFoto">Foto del empleado</label>
                                <input type="file" class="form-control" name="foto_empleado" id="inputFoto" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputNombre">Nombre del empleado</label>
                                <input type="text" class="form-control" id="inputNombre" name="nombre_empleado" placeholder="Nombre del empleado" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCedula">Cedula</label>
                                <input type="text" class="form-control" id="inputCedula" name="cedula_empleado" placeholder="Cedula" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputSueldo">Sueldo</label>
                                <input type="text" class="form-control" id="inputSueldo" name="sueldo_empleado" placeholder="Sueldo" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail">Email del empleado</label>
                                <input type="email" class="form-control" id="inputEmail" name="email_empleado" placeholder="Email del empleado" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputContrasena">Contraseña del empleado</label>
                                <input type="password" class="form-control" id="inputContrasena" name="contrasena_empleado" placeholder="Contraseña del empleado" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputContrasena2">Confirmar contraseña</label>
                                <input type="password" class="form-control" id="inputContrasena2" name="confirmar_contrasena" placeholder="Contraseña del empleado" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Dirección del empleado</label>
                            <input type="text" class="form-control" id="inputAddress" name="direccion_empleado" placeholder="Dirección del empleado" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputTelefono1">Teléfono 1</label>
                                <input type="tel" class="form-control" id="inputTelefono1" name="telefono_1" placeholder="Teléfono 1" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputTelefono1">Teléfono 2</label>
                                <input type="tel" class="form-control" id="inputTelefono2" name="telefono_2" placeholder="Teléfono 2" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputRol">Cargo</label>
                                <select id="inputRol" class="form-control" name="cargo_empleado">
                                    <option>Elegir...</option>
                                    <option value="Admin">Adminitrador</option>
                                    <option value="Bodeguero">Bodeguero</option>
                                    <option value="Cajero">Cajero</option>
                                    <option value="Contable">Contable</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                        <button type="submit" class="btn btn-danger"><i class="far fa-window-close"></i> Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Agregar empleado -->
    </div>

    <div>
        <?php include("./footer.php") ?>
    </div>

</body>

</html>