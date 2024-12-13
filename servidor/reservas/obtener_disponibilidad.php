<?php
include_once '../../clases/Reservas.php';

$reserva = new Reservas();

$fecha_ingreso = $_POST['fecha_inicio'] ?? null;
$fecha_egreso = $_POST['fecha_fin'] ?? null;

// Validar que las fechas no estén vacías
if (empty($fecha_ingreso) || empty($fecha_egreso)) {
    echo json_encode(["error" => "Fechas inválidas."]);
    exit;
}

try {
    // Llamar al método de la clase reserva para obtener los departamentos disponibles
    $departamentos = $reserva->retornarDisponibles($fecha_ingreso, $fecha_egreso);

    // Devolver los resultados como JSON
    header('Content-Type: application/json');
    echo $departamentos;
} catch (Exception $e) {
    // Manejar errores y devolver un mensaje
    echo json_encode(["error" => $e->getMessage()]);
}
