<?php
include 'db.php';

if(!isset($_GET['codigo'])) {
    echo "Código no proporcionado.";
    exit();
}

$codigo = $_GET['codigo'];

$stmt = $conn->prepare("SELECT * FROM ventas WHERE codigo_unico = ?");
$stmt->bind_param("s", $codigo);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows == 0) {
    echo "Venta no encontrada.";
    exit();
}

$venta = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Ticket de Compra</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .ticket {
      max-width: 600px;
      margin: auto;
      border: 1px solid #333;
      padding: 20px;
    }
  </style>
</head>
<body>
  <div class="ticket">
    <h2>Ticket de Compra</h2>
    <p><strong>Nombre:</strong> <?php echo htmlspecialchars($venta['nombre_cliente']); ?></p>
    <p><strong>Código Único:</strong> <?php echo htmlspecialchars($venta['codigo_unico']); ?></p>
    <pre><?php echo htmlspecialchars($venta['detalles']); ?></pre>
    <h4>TOTAL A PAGAR: $<?php echo number_format($venta['total'],2); ?></h4>
  </div>
</body>
</html>
