<?php
    include("conexion.php");
    $empresa_id = $_GET['empresa_id'];
    $empresa = $conexion->query("SELECT * FROM empresa WHERE id=$empresa_id")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Usuarios de <?= $empresa['nombre'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
    <h2>Usuarios de <?= $empresa['nombre'] ?></h2>

    <div class="card p-3 mb-3">
        <form action="agregar_usuario.php" method="POST" class="row g-2">
            <input type="hidden" name="empresa_id" value="<?= $empresa_id ?>">
            <div class="col-md-4">
                <input type="text" name="nombre" class="form-control" placeholder="Nombre del usuario" required>
            </div>
            <div class="col-md-4">
                <input type="email" name="email" class="form-control" placeholder="Correo electrónico" required>
            </div>
            <div class="col-md-4">
                <button class="btn btn-primary w-100">Agregar Usuario</button>
            </div>
        </form>
    </div>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr><th>ID</th><th>Nombre</th><th>Email</th><th>Acciones</th></tr>
        </thead>
        <tbody>
        <?php
        $resultado = $conexion->query("SELECT * FROM usuario WHERE empresa_id=$empresa_id");
        while ($fila = $resultado->fetch_assoc()):
        ?>
            <tr>
                <td><?= $fila['id'] ?></td>
                <td><?= $fila['nombre'] ?></td>
                <td><?= $fila['email'] ?></td>
                <td>
                    <a href="editar_usuario.php?id=<?= $fila['id'] ?>&empresa_id=<?= $empresa_id ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="eliminar_usuario.php?id=<?= $fila['id'] ?>&empresa_id=<?= $empresa_id ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro?')">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

    <a href="index.php" class="btn btn-secondary mt-3">Volver a empresas</a>
</div>
</body>
</html>
