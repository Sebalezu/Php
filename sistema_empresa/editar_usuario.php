<?php
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $empresa_id = $_POST['empresa_id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    $conexion->query("UPDATE usuario SET nombre='$nombre', email='$email' WHERE id=$id");
    header("Location: usuarios.php?empresa_id=$empresa_id");
} else {
    $id = $_GET['id'];
    $empresa_id = $_GET['empresa_id'];
    $usuario = $conexion->query("SELECT * FROM usuario WHERE id=$id")->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
    <h2>Editar Usuario</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
        <input type="hidden" name="empresa_id" value="<?= $empresa_id ?>">
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?= $usuario['nombre'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?= $usuario['email'] ?>" required>
        </div>
        <button class="btn btn-success">Guardar</button>
        <a href="usuarios.php?empresa_id=<?= $empresa_id ?>" class="btn btn-secondary">Volver</a>
    </form>
</div>
</body>
</html>
