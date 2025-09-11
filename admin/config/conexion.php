<?php
if (!defined('NOMBRE_SITIO')) {
    define('NOMBRE_SITIO', 'PROYECTO-WEB-1');
    define('URL_BASE', 'http://localhost/proyecto-web-1/');
}

$host = "localhost";
$port = 3307;
$user = "root";
$pass = "admin";
$dabase = "pruebas_web";

$conn = new mysqli($host, $user, $pass, $dabase, $port);

if ($conn->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
}
// echo "Conexion Exitosa de la DB";
?>