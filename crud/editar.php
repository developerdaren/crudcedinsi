<?php
include '../includes/conexion.php';

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
// Obtener el ID del plato a editar
$id = $_GET['id'];

try {
    $stmt_select = $pdo->prepare("SELECT * FROM platos WHERE id = :id");
    $stmt_select->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt_select->execute();
    $plato = $stmt_select->fetch();

    if (!$plato) {
        die("Plato no encontrado.");
    }

} catch (PDOException $e) {
    die("Error al obtener el plato: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    try {
        $stmt_update = $pdo->prepare("UPDATE platos SET nombre = :nombre, descripcion = :descripcion, precio = :precio WHERE id = :id");
        $stmt_update->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt_update->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt_update->bindParam(':precio', $precio, PDO::PARAM_STR); // O PDO::PARAM_INT
        $stmt_update->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt_update->execute();

        header("Location: leer.php");
        exit();

    } catch (PDOException $e) {
        die("Error al actualizar el plato: " . $e->getMessage());
    }
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
        <input class="form-control mb-2" type="text" name="nombre" value="<?= htmlspecialchars($plato['nombre']) ?>" required>
        <textarea class="form-control mb-2" name="descripcion"><?= htmlspecialchars($plato['descripcion']) ?></textarea>
        <input class="form-control mb-2" type="number" step="0.01" name="precio" value="<?= htmlspecialchars($plato['precio']) ?>" required>
        <button class="btn btn-primary">Actualizar</button>
    </form>
</div>
</body>
</html>