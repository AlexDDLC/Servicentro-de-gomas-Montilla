<?php

$server = "localhost";
$userdbname = "Alex";
$contrasenadb = "123456789";
$database = "montilla_db";

try {
    $conexion = new PDO("mysql:host=$server; dbname=$database;", $userdbname, $contrasenadb);
} catch (PDOException $error) {

    die('Conexion fallida base de datos: ' . $error->getMessage());
}
