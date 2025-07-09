<?php
// create_request.php
header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
$nombre = $input['nombre'] ?? '';
$habitacion_id = $input['habitacion_id'] ?? 0;

if (!$nombre || !$habitacion_id) {
    http_response_code(400);
    echo json_encode(['error' => 'Faltan campos']);
    exit;
}
// Conectar a la base de datos
require_once '../../config.php';
echo json_encode(['ok' => true]);
