<?php
include './CodigoPHP/conexion.php';

session_start();
if (isset($_SESSION['user_email'])) {
    header("location:index.php");
}

$Logueado = true;

try {
    if (!empty($_POST['emaillogin']) && !empty($_POST['contrasenalogin'])) {
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT id, nombre_usuario, rol, email, contrasena FROM usuarios WHERE email=:emaillogin";
        $resultado = $conexion->prepare($sql);
        $email = htmlentities(addslashes($_POST["emaillogin"]));
        $contrasena = htmlentities(addslashes($_POST["contrasenalogin"]));
        $resultado->bindValue(":emaillogin", $email);
        $resultado->execute();
        $datos = $resultado->fetch(PDO::FETCH_ASSOC);
        $Numero_registro = $resultado->rowCount();
        if ($Numero_registro != 0) {
            if (password_verify($contrasena, $datos['contrasena'])) {
                session_start();
                header("location:index.php");
                $_SESSION['user_email'] = $datos['email'];
                $_SESSION['user_name'] = $datos['nombre_usuario'];
                $_SESSION['user_rol'] = $datos['rol'];
            }
        } else {
            $Logueado = false;
        }
    }
} catch (Exception $error) {
    die('Conexion fallida login: ' . $error->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

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

<body class="LoginBody">

    <div>
        <?php include("header.php") ?>
    </div>

    <div class="VistaLogin">
        <div class="b4 modal-dialog text-center">
            <div class="b4 col-sm-8 main-section">
                <div class="b4 modal-content">
                    <div class="b4 col-12 user-img">
                        <img src="Imagenes/avatar.png" alt="Usuario">
                    </div>
                    <form class="b4 col-12" method="POST">
                        <div class="b4 form-group" id="user-group">
                            <input class="b4 form-control" type="text" placeholder="Correo" name="emaillogin">
                        </div>
                        <div class="b4 form-group" id="password-group">
                            <input class="b4 form-control" type="password" placeholder="Contraseña" name="contrasenalogin">
                        </div>
                        <button class="b4 btn btn-primary" type="submit"><i class="b4 fas fa-sign-in-alt"></i> Ingresar</button>
                    </form>
                    <div class="b4 col-12 not_registered">
                        <div>
                            <?php if ($Logueado == false) : ?>
                                <div class="alert alert-danger" role="alert">
                                    Usuario o contraseña inconcreto.
                                </div>
                            <?php endif; ?>
                        </div>
                        <hr>
                        <p>¿No tienes una cuenta?<a href="registro.php"><i class="b4 fas fa-user-check"></i> Regístrate</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <?php include("footer.php") ?>
    </div>

</body>

</html>