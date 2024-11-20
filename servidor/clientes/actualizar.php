<?php session_start();

    include "../../clases/Clientes.php";
    $Clientes = new Clientes();

    $data = array(
        "id_cliente" => $_POST['id_cliente'],
        "apellido" => $_POST['apellidoe'],
        "nombre" => $_POST['nombree'],
        "dni" => $_POST['dnie'],
        "direccion" => $_POST['direccione'],
        "tel" => $_POST['telu'],
        "tel_alternativo" => $_POST['tel_altu'],
        "correo" => $_POST['correoe'],
        "fechaNac" => $_POST['fechaNacu']
    );

    echo $Clientes->actualizarCliente($data);


?>
