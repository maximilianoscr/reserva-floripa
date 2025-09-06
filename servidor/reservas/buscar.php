<?php
session_start();
header('Content-Type: application/json');

include "../../clases/Reservas.php";
$Reservas = new Reservas();
if (!isset($_GET['id_reserva']) || !is_numeric($_GET['id_reserva'])) {
    http_response_code(400);
    echo json_encode(['error' => 'ID de reserva no válido']);
    exit;
}

$id_reserva = $_GET['id_reserva'];
$datos = $Reservas->buscarReserva($id_reserva);

if (!$datos || count($datos) === 0) {
    http_response_code(404);
    echo json_encode(['error' => 'Reserva no encontrada']);
    exit;
}

// Tomar la primera fila
$reserva = $datos[0];

// Armar el JSON de respuesta
echo json_encode([
    "cliente"     => $reserva['cliente'],
    "entrada"     => $reserva['fecha_inicio'],
    "salida"      => $reserva['fecha_fin'],
    "depto"       => $reserva['depto'],
    "direccion"   => $reserva['direccion'],
    "moneda"      => $reserva['valor_total']." ".$reserva['sigla']." (".$reserva['moneda'].")",
    "restante"    => $reserva['restante']." ".$reserva['sigla']." (".$reserva['moneda'].")",
    "capacidad"   => $reserva['capacidad'],
    "codigo"      => $reserva['id_reserva'],
    "descripcion" => $reserva['descripcion'],
    "titulo"      => $reserva['titulo']
]);
