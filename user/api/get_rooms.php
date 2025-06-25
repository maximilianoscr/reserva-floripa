<?php
header('Content-Type: application/json');

// Traer habitaciones
$stmt = $pdo->query('SELECT id, nombre, descripcion, precio FROM habitaciones WHERE disponible = 1');
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
