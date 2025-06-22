<?php session_start();

    include "../../clases/Clientes.php";
    $id_cliente = $_POST['id_cliente'];
    $Clientes = new Clientes();
    echo json_encode($Clientes->editarCliente($id_cliente));


?>
