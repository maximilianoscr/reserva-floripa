<?php session_start();
    include "../../clases/Departamentos.php";
    $Departamentos = new Departamentos();
    //print_r($_POST);
    $data = array(
        "id" => $_POST['id_depto'],
        "titulo" => $_POST['titulou'],
        "direccion" => $_POST['direccionu'],
        "altura" => $_POST['alturau'],
        "tipo_habitacion" => $_POST['tipo_habitacionu'],
        "descripcion" => $_POST['descripcionu'],
        "x_mapa" => $_POST['x_mapau'],
        "y_mapa" => $_POST['y_mapau'],
        "color" => $_POST['coloru'],
        "capacidad" => $_POST['capacidadu']
    );
    
    echo $Departamentos->actualizarDepartamento($data);


?>
