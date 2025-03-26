<?php
include 'db.php';

// Función para generar un código único
function generateUniqueCode($length = 8) {
    return substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}

$nombre = $_POST['nombre'];
$entradas_adulto = intval($_POST['entradas_adulto']);
$entradas_nino = intval($_POST['entradas_nino']);
$sillas = intval($_POST['sillas']);
$mesas = intval($_POST['mesas']);
$sombrillas = intval($_POST['sombrillas']);

// Cálculo del total
$total = ($entradas_adulto * 180) + ($entradas_nino * 120) + ($sillas * 30) + ($mesas * 50) + ($sombrillas * 50);

// Construir la descripción de la compra
$detalles = "";
if($entradas_adulto > 0) {
    $detalles .= "Entradas adulto: $entradas_adulto x $180 = $" . ($entradas_adulto * 180) . "\n";
}
if($entradas_nino > 0) {
    $detalles .= "Entradas niño: $entradas_nino x $120 = $" . ($entradas_nino * 120) . "\n";
}
if($sillas > 0) {
    $detalles .= "Sillas: $sillas x $30 = $" . ($sillas * 30) . "\n";
}
if($mesas > 0) {
    $detalles .= "Mesas: $mesas x $50 = $" . ($mesas * 50) . "\n";
}
if($sombrillas > 0) {
    $detalles .= "Sombrillas: $sombrillas x $50 = $" . ($sombrillas * 50) . "\n";
}

$codigo_unico = generateUniqueCode();

// Insertar la venta en la base de datos
$stmt = $conn->prepare("INSERT INTO ventas (codigo_unico, nombre_cliente, detalles, total) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssd", $codigo_unico, $nombre, $detalles, $total);
$stmt->execute();
$stmt->close();
$conn->close();

// Redirigir al ticket de compra
header("Location: ticket.php?codigo=" . $codigo_unico);
exit();
?>
