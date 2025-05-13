
<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-image: url('https://images.unsplash.com/photo-1600891964599-f61ba0e24092?auto=format&fit=crop&w=1920&q=80'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;">
<div class="container mt-4 p-4" style="background: rgba(255,255,255,0.9); border-radius: 10px;">
<div class="container mt-4">
    <h1>Bienvenido, <?php echo $_SESSION['usuario']; ?></h1>
    <a href="crud/crear.php" class="btn btn-success">Agregar Plato</a>
    <a href="crud/leer.php" class="btn btn-info">Ver Platos</a>
    <a href="logout.php" class="btn btn-danger">Cerrar Sesión</a>
</div>
</div>

<div class="container my-4" style="max-width: 800px;">

<div id="carruselComida" class="carousel slide my-4" data-bs-ride="carousel">
  <div class="carousel-inner rounded shadow">
    <div class="carousel-item active">
      <img src="https://cdn.pixabay.com/photo/2014/10/19/20/59/hamburger-494706_960_720.jpg" class="d-block w-100" alt="Plato 1">
    </div>
    <div class="carousel-item">
      <img src="https://cdn.pixabay.com/photo/2015/04/10/00/41/food-715542_1280.jpg" class="d-block w-100" alt="Plato 2">
    </div>
    <div class="carousel-item">
      <img src="https://cdn.pixabay.com/photo/2015/04/08/13/13/food-712665_960_720.jpg" class="d-block w-100" alt="Plato 3">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carruselComida" data-bs-slide="prev">
    <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
    <span class="visually-hidden">Anterior</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carruselComida" data-bs-slide="next">
    <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
    <span class="visually-hidden">Siguiente</span>
  </button>
</div>
</div>

</body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</html>