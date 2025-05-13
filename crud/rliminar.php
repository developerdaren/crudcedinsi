<?php
include '../includes/conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $stmt = $pdo->prepare("DELETE FROM platos WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: leer.php");
        exit();

    } catch (PDOException $e) {
        // Aquí puedes mostrar un mensaje de error o loguearlo
        die("Error al eliminar el plato: " . $e->getMessage());
    }
} else {
    die("ID de plato no especificado para eliminar.");
}
?>