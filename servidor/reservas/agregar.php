<?php session_start(); 

    include "../../clases/Reservas.php";
    $Reservas = new Reservas();
    $data = array(
        'id_usuario' => $_SESSION['id_usuario'],
        'titulo' => $_POST['nombre_reserva'], 
        'fecha_inicio' => $_POST['fecha'] . " " . $_POST['fecha_inicio'], 
        'fecha_fin' => $_POST['fecha'] . " " . $_POST['fecha_fin'],
        'fecha' => $_POST['fecha']
    );

    echo $Reservas->agregar($data);
    
?>