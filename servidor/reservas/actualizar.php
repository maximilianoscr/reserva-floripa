<?php session_start();
    include "../../clases/Reservas.php";
    $Reservas = new Reservas();
    $data = array(
        "id_reserva" => $_POST['id_reserva'],
        "titulo" => $_POST['nombre_titulou'],
        "fecha_inicio" => $_POST['fechau']. " " .$_POST['fecha_iniciou'],
        "fecha_fin" => $_POST['fechau']. " " .$_POST['fecha_finu'],
     //   "fecha_carga" => $_POST['fechau'],
        "id_usuario" => $_SESSION['id_usuario']
    );

    echo $Reservas->actualizarReserva($data);

?>
