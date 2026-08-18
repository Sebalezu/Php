<?php
    include("conexion.php");

    $nombre = $_POST['nombre'];
    $conexion->query("INSERT INTO empresa (nombre) VALUES ('$nombre')");
    header("Location: index.php");
?>