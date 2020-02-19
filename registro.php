<?php
require('./CodigoPHP/conexion.php');
//session_start();
if (isset($_SESSION['user_email'])) {
    header("location:index.php");
}
$rol = 'Cliente';
$registrado = 'aun';

if (!empty($_POST['emailregistro']) && !empty($_POST['usernameregistro']) && !empty($_POST['contrasenaregistro'])) {
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT id, nombre_usuario, rol, email, contrasena FROM usuarios WHERE email=:emailregistro";
    $resultado = $conexion->prepare($sql);
    $email = htmlentities(addslashes($_POST["emailregistro"]));
    $resultado->bindValue(":emailregistro", $email);
    $resultado->execute();
    $datos = $resultado->fetch(PDO::FETCH_ASSOC);
    $Numero_registro = $resultado->rowCount();
    if ($Numero_registro != 0) {
        $registrado = 'no';
    } else {
        $sql = "INSERT INTO usuarios (nombre_usuario,rol,email,contrasena) VALUES (:nombreuser, '$rol', :email, :contrasenauser)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombreuser', $_POST['usernameregistro']);
        $stmt->bindParam(':email', $_POST['emailregistro']);
        $contrasenar = password_hash($_POST['contrasenaregistro'], PASSWORD_BCRYPT);
        $stmt->bindParam(':contrasenauser', $contrasenar);

        if ($stmt->execute()) {
            $registrado = 'si';
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
    <title>Regístrate</title>

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

<body class="RegistroBody">

    <!-- Header -->
    <div>
        <?php include("header.php") ?>
    </div>
    <!-- Header -->

    <div class="VistaRegistro">
        <div class="b4 modal-dialog text-center">
            <div class="b4 col-sm-8 main-section">
                <div class="b4 modal-content">
                    <form class="b4 col-12" method="POST">
                        <div>
                            <h1>Regístrate</h1>
                        </div>
                        <div class="b4 form-group" id="user-name">
                            <input class="b4 form-control" type="text" placeholder="Correo electrónico" required name="emailregistro">
                        </div>
                        <div class="b4 form-group" id="user-group">
                            <input class="b4 form-control" type="text" placeholder="Nombre de usuario" required name="usernameregistro">
                        </div>
                        <div class="b4 form-group" id="password-group">
                            <input class="b4 form-control" type="password" placeholder="Contraseña" required name="contrasenaregistro">
                        </div>
                        <div class="b4 form-group" id="password-group">
                            <input class="b4 form-control" type="password" placeholder="Confirmar contraseña" required>
                        </div>
                        <button class="b4 btn btn-primary" type="submit"><i class="b4 fas fa-user-check"></i> Regístrate</button>
                    </form>
                    <div class="b4 registered">
                        <div>
                            <?php if ($registrado == 'si') : ?>
                                <div class="alert alert-success" role="alert">
                                    Usuario registrado satisfactoriamente. Puede iniciar sesión
                                </div>
                            <?php endif; ?>
                            <?php if ($registrado == 'no') : ?>
                                <div class="alert alert-danger" role="alert">
                                    Lo sentimos, este correo electrónico ya está en uso.
                                </div>
                            <?php endif; ?>
                        </div>
                        <hr>
                        <p class="b4 col-12">¿Ya tienes una cuenta?<a href="login.php"><i class="fas fa-sign-in-alt"></i> Iniciar sesión</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div>
        <?php include("footer.php") ?>
    </div>
    <!-- Footer -->

</body>

</html>