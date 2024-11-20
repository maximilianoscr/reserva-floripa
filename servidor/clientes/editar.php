<?php session_start();
    include "../../clases/Clientes.php";
    $Clientes = new Clientes();
    $id_cliente = $_POST['id_cliente'];
    echo json_encode($Clientes->editarCliente($id_cliente));
?>