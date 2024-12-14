<?php session_start();
    include "clases/Reservas.php";
    $Reservas = new Reservas();
    $id_reserva = $_POST['id_reserva'];
    echo $Reservas->retornarDisponibles('2024/01/01','2024/01/02');
?>