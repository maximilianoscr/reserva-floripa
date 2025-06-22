<?php session_start();
    include "../../clases/Propietarios.php";
    $Propietarios = new Propietarios();
    $id_propietario = $_POST['id_propietario'];
    echo $Propietarios->eliminarPropietario($id_propietario);
?>