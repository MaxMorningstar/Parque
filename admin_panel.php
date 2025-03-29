<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: admin_login.php");
    exit();
}
include 'db.php';

$sql = "SELECT * FROM ventas ORDER BY fecha DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel de Administración</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-4">
    <h2>Panel de Administración</h2>
    <a href="logout.php" class="btn btn-danger mb-2">Cerrar Sesión</a>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Código Único</th>
          <th>Nombre del Cliente</th>
          <th>Detalles</th>
          <th>Total</th>
          <th>Fecha</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result->fetch_assoc()){ ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['codigo_unico']; ?></td>
          <td><?php echo $row['nombre_cliente']; ?></td>
          <td><pre><?php echo $row['detalles']; ?></pre></td>
          <td>$<?php echo number_format($row['total'],2); ?></td>
          <td><?php echo $row['fecha']; ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>
</html>
