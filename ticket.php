<?php
require('fpdf186/fpdf.php'); // Asegúrate de tener la librería FPDF en tu proyecto
include 'db.php';

if (!isset($_GET['codigo'])) {
    echo "Código no proporcionado.";
    exit();
}

$codigo = $_GET['codigo'];

$stmt = $conn->prepare("SELECT * FROM ventas WHERE codigo_unico = ?");
$stmt->bind_param("s", $codigo);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "Venta no encontrada.";
    exit();
}

$venta = $result->fetch_assoc();
$stmt->close();
$conn->close();

// Crear el PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(190, 10, 'Ticket de Compra', 0, 1, 'C');
$pdf->Ln(5);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 10, 'Nombre:', 0, 0);
$pdf->Cell(100, 10, utf8_decode($venta['nombre_cliente']), 0, 1);

$pdf->Cell(50, 10, 'Código Único:', 0, 0);
$pdf->Cell(100, 10, $venta['codigo_unico'], 0, 1);

$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 10, 'Detalle de la compra:', 0, 1, 'C');
$pdf->Ln(3);

$pdf->SetFont('Arial', '', 12);
$detalles = explode("\n", $venta['detalles']);
foreach ($detalles as $linea) {
    $pdf->Cell(190, 8, utf8_decode($linea), 0, 1);
}

$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(50, 10, 'TOTAL A PAGAR: ', 0, 0);
$pdf->Cell(50, 10, '$' . number_format($venta['total'], 2), 0, 1);

$pdf->Output('D', 'Ticket_' . $venta['codigo_unico'] . '.pdf'); // Descarga el PDF
?>
