<?php session_start();
    include "../../clases/Reservas.php";
    $Reservas = new Reservas();
    $id_reserva = $_POST['id_reserva'];
    echo $Reservas->eliminarReserva($id_reserva);
?>