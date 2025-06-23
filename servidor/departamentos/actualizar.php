<?php session_start();
    include "../../clases/Departamentos.php";
    $Departamentos = new Departamentos();
    //print_r($_POST);
    $data = array(
        "id" => $_POST['id_depto'],
        "titulo" => $_POST['titulou'],
        "direccion" => $_POST['direccionu'],
        "altura" => $_POST['alturau'],
        "habitaciones" => $_POST['habitacionesu'],
        "descripcion" => $_POST['descripcionu'],
        "ubi" => $_POST['x_mapau'],
        "color" => $_POST['coloru'],
        "precio" => $_POST['preciou'],
        "capacidad" => $_POST['capacidadu']
    );
    
    echo $Departamentos->actualizarDepartamento($data);


?>
