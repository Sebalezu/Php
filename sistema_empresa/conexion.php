<?php
    $conexion = new mysqli("localhost", "root", "", "mi_empresa");
    if ($conexion->connect_error) {
        die("Conexion pailas: " . $conexion->connect_error);
    }
?>