<?php session_start();

    include "../../clases/Departamentos.php";
    $Departamentos = new Departamentos();

    $data = array(
        "id" => $_POST['id'],
        "apellido" => $_POST['apellidoe'],
        "nombre" => $_POST['nombree'],
        "direccion" => $_POST['direccione'],
        "tel" => $_POST['telu'],
        "correo" => $_POST['correoe'],
        "fechaNac" => $_POST['fechaNacu']
    );

    echo $Departamentos->actualizarDepartamento($data);


?>
