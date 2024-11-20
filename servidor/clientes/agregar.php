<?php session_start();

    include "../../clases/Clientes.php";
    $Clientes = new Clientes();
    $data = array(
        "apellido" => $_POST['apellido'],
        "nombre" => $_POST['nombre'],
        "dni" => $_POST['dni'],
        "direccion" => $_POST['direccion'],
        "tel" => $_POST['tel'],
        "tel_alternativo" => $_POST['tel_alt'],
        "correo" => $_POST['correo'],
        "fechaNac" => $_POST['fechaNac']
    );
    //print_r($data);
    echo $Clientes->agregarCliente($data);


?>