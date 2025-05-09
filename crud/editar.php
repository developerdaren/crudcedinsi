<?php
include '../includes/conexion.php';
$id = $_GET['id'];
$plato = $conn->query("SELECT * FROM platos WHERE id = $id")->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $conn->query("UPDATE platos SET nombre='$nombre', descripcion='$descripcion', precio=$precio WHERE id = $id");
    header("Location: leer.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Plato</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Editar Plato</h2>
    <form method="post">
        <input class="form-control mb-2" type="text" name="nombre" value="<?= $plato['nombre'] ?>" required>
        <textarea class="form-control mb-2" name="descripcion"><?= $plato['descripcion'] ?></textarea>
        <input class="form-control mb-2" type="number" step="0.01" name="precio" value="<?= $plato['precio'] ?>" required>
        <button class="btn btn-primary">Actualizar</button>
    </form>
</div>
</body>
</html>
