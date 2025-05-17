<?php
include '../includes/conexion.php';

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    try {
        $stmt = $pdo->prepare("INSERT INTO platos (nombre, descripcion, precio) VALUES (:nombre, :descripcion, :precio)");
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(':precio', $precio, PDO::PARAM_STR); 

        $stmt->execute();

        header("Location: leer.php");
        exit();

    } catch (PDOException $e) {
        
        die("Error al crear el plato: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title class="text-white">Agregar Plato</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-image: url('https://images.unsplash.com/photo-1600891964599-f61ba0e24092?auto=format&fit=crop&w=1920&q=80'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;"></body>

<div class="container mt-4 p-4" style="background: rgba(255,255,255,0.9); border-radius: 10px;">
<div class="container mt-4">
    <h2>Nuevo Plato</h2>
    <form method="post">
        <input class="form-control mb-2" type="text" name="nombre" placeholder="Nombre" required>
        <textarea class="form-control mb-2" name="descripcion" placeholder="Descripción"></textarea>
        <input class="form-control mb-2" type="number" step="0.01" name="precio" placeholder="Precio" required>
        <button class="btn btn-success">Guardar</button>
    </form>
    <a href="../dashboard.php" class="btn btn-secondary mt-3">Volver al Dashboard</a>
<a href="../logout.php" class="btn btn-danger mt-3">Cerrar Sesión</a>
</div>
</div>


</body>
</html>