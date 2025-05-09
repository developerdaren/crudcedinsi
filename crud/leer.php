<?php
include '../includes/conexion.php';
$resultado = $conn->query("SELECT * FROM platos");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Platos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-image: url('https://images.unsplash.com/photo-1600891964599-f61ba0e24092?auto=format&fit=crop&w=1920&q=80'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;">
<div class="container mt-4 p-4" style="background: rgba(255,255,255,0.9); border-radius: 10px;">
<div class="container mt-4">
    <h2>Platos del Menú</h2>
    <table class="table table-bordered">
        <tr>
            <th>Nombre</th><th>Descripción</th><th>Precio</th><th>Acciones</th>
        </tr>
        <?php while ($fila = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?= $fila['nombre'] ?></td>
            <td><?= $fila['descripcion'] ?></td>
            <td><?= $fila['precio'] ?></td>
            <td>
                <a href="editar.php?id=<?= $fila['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                <a href="eliminar.php?id=<?= $fila['id'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="../dashboard.php" class="btn btn-secondary mt-3">Volver al Dashboard</a>
<a href="../logout.php" class="btn btn-danger mt-3">Cerrar Sesión</a>

</div>
</div>


</body>
</html>
