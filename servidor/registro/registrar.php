<?php 
    include "../../clases/Auth.php";

    $usuario = $_POST['usuario'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $Auth = new Auth();

    if ($Auth->registrar($usuario, $password)) {
        header("location:../../");
    } else {
        echo "El usuario ya existe o no se pudo registrar";
    }

?>