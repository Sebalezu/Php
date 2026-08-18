<?php
    include("conexion.php");
    $id = $_GET['id'];
    $empresa_id = $_GET['empresa_id'];
    $conexion->query("DELETE FROM usuario WHERE id=$id");
    header("Location: usuarios.php?empresa_id=$empresa_id");
?>