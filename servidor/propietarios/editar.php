<?php session_start();
    include "../../clases/Propietarios.php";
    $Propietarios = new Propietarios();
    $id_propietario = $_POST['id_propietario'];
    echo json_encode($Propietarios->editarPropietario($id_propietario));
?>