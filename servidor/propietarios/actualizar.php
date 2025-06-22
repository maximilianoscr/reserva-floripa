<?php session_start();
    include "../../clases/Propietarios.php";
    $Propietarios = new Propietarios();
    //print_r($_POST);
    $data = array(
        "id_propietario" => $_POST['id_propietario'],
        "descripcion" => $_POST['descripcionu'],
        "correo" => $_POST['correou']
    );
    
    echo $Propietarios->actualizarPropietario($data);


?>
