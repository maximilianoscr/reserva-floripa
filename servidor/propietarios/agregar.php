<?php session_start();

    include "../../clases/Propietarios.php";
    $Propietarios = new Propietarios();
    $data = array(
        "descripcion" => $_POST['descripcion'],
        "correo" => $_POST['correo']
    );
    //print_r($data);
    echo $Propietarios->agregarPropietario($data);


?>