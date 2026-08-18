<?php
    include("conexion.php");

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $empresa_id = $_POST['empresa_id'];

    $conexion->query("INSERT INTO usuario (nombre, email, empresa_id) VALUES ('$nombre', '$email', $empresa_id)");
    header("Location: usuarios.php?empresa_id=$empresa_id");
?>