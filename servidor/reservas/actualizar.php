<?php session_start();
    include "../../clases/Reservas.php";
    $Reservas = new Reservas();
    $data = array(
        "id_reserva" => $_POST['id_reserva'],
        "titulo" => $_POST['nombre_reservau'],
        "fecha_inicio" => $_POST['fecha_iniciou'],
        "fecha_fin" => $_POST['fecha_finu'],
        "total" => $_POST['totalu'],
        "parcial" => $_POST['parcialu'],
        "id_usuario" => $_SESSION['id_usuario'],
        "obs" => $_POST['obsu']
    );

    echo $Reservas->actualizarReserva($data);

?>
