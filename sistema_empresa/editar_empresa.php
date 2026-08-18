<?php
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $conexion->query("UPDATE empresa SET nombre='$nombre' WHERE id=$id");
    header("Location: index.php");
} else {
    $id = $_GET['id'];
    $empresa = $conexion->query("SELECT * FROM empresa WHERE id=$id")->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Empresa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
    <h2>Editar Empresa</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $empresa['id'] ?>">
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?= $empresa['nombre'] ?>" required>
        </div>
        <button class="btn btn-success">Guardar</button>
        <a href="index.php" class="btn btn-secondary">Volver</a>
    </form>
</div>
</body>
</html>
