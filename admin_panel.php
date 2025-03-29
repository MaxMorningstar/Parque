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
  <title>Panel de Administración - Parque Acuático</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome para iconos -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- Animate.css para animaciones -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <style>
    body {
      background: #f5f5f5;
    }
    .panel-container {
      background: #fff;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 2px 15px rgba(0,0,0,0.1);
      margin-top: 30px;
    }
    h2 {
      font-weight: 700;
      margin-bottom: 20px;
    }
    table {
      font-size: 0.9rem;
    }
    .logout-btn {
      float: right;
    }
  </style>
</head>
<body>
  <div class="container panel-container animate__animated animate__fadeInUp">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2><i class="fas fa-tachometer-alt"></i> Panel de Administración</h2>
      <a href="logout.php" class="btn btn-danger logout-btn"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
    </div>
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead class="thead-dark">
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
  </div>

  <!-- Scripts de Bootstrap y dependencias -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
