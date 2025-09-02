<?php session_start(); 

    include "../../clases/Reservas.php";
    $Reservas = new Reservas();
    $depto_separado=explode('|',$_POST['id_depto']);
    $data = array(
        'id_usuario' => $_SESSION['id_usuario'],
        'id_cliente' => $_POST['id_cliente'],
        'id_depto' => $depto_separado[0],
        'titulo' => $_POST['nombre_reserva'], 
        'fecha_inicio' => $_POST['fecha_inicio'], 
        'fecha_fin' => $_POST['fecha_fin'],
        'moneda' => $_POST['moneda'], 
        'valor_total' => $_POST['total'],
        'pago_parcial' => $_POST['parcial'],
        'obs' => $_POST['obs']
    );

    echo $Reservas->agregar($data);
    
?>