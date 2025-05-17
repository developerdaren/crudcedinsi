<?php

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
include '../includes/conexion.php';


try {
    $stmt = $pdo->prepare("SELECT id, nombre, descripcion, precio FROM platos");
    $stmt->execute();
    $platos = $stmt->fetchAll(); 
} catch (PDOException $e) {
    die("Error al leer los platos: " . $e->getMessage());
}
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
        <?php if (!empty($platos)): ?>
            <?php foreach ($platos as $plato): ?>
            <tr>
                <td><?= htmlspecialchars($plato['nombre']) ?></td>
                <td><?= htmlspecialchars($plato['descripcion']) ?></td>
                <td><?= htmlspecialchars($plato['precio']) ?></td>
                <td>
                    <a href="editar.php?id=<?= $plato['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="eliminar.php?id=<?= $plato['id'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="4">No hay platos registrados.</td></tr>
        <?php endif; ?>
    </table>
    <a href="../dashboard.php" class="btn btn-secondary mt-3">Volver al Dashboard</a>
<a href="../logout.php" class="btn btn-danger mt-3">Cerrar Sesión</a>

</div>
</div>


</body>
</html>
