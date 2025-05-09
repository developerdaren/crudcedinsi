<?php
include '../includes/conexion.php';
$id = $_GET['id'];
$conn->query("DELETE FROM platos WHERE id = $id");
header("Location: leer.php");
