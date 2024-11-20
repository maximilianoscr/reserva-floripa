<?php session_start();
    $id_usuario = $_SESSION['id_usuario'];
    include "../../clases/Reservas.php";
    $Reservas = new Reservas();
    echo $Reservas->fullCalendar($id_usuario);
?>