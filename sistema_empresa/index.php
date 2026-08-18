<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Empresas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
    <h1 class="text-center mb-4">Empresas</h1>

    <div class="card p-3 mb-4">
        <form action="agregar_empresa.php" method="POST" class="row g-2">
            <div class="col-md-8">
                <input type="text" name="nombre" class="form-control" placeholder="Nombre de la empresa" required>
            </div>
            <div class="col-md-4">
                <button class="btn btn-primary w-100">Agregar Empresa</button>
            </div>
        </form>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Usuarios</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $resultado = $conexion->query("SELECT * FROM empresa");
        while ($fila = $resultado->fetch_assoc()):
        ?>
            <tr>
                <td><?= $fila['id'] ?></td>
                <td><?= $fila['nombre'] ?></td>
                <td><a href="usuarios.php?empresa_id=<?= $fila['id'] ?>" class="btn btn-sm btn-info">Ver usuarios</a></td>
                <td>
                    <a href="editar_empresa.php?id=<?= $fila['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="eliminar_empresa.php?id=<?= $fila['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro?')">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
