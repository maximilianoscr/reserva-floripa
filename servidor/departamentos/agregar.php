<?php session_start();

    include "../../clases/Departamentos.php";
    $Departamentos = new Departamentos();
    $data = array(
        "titulo" => $_POST['titulo'],
        "direccion" => $_POST['direccion'],
        "altura" => $_POST['altura'],
        "tipo_habitacion" => $_POST['tipo_habitacion'],
        "descripcion" => $_POST['descripcion'],
        "x_mapa" => $_POST['x_mapa'],
        "y_mapa" => $_POST['y_mapa'],
        "color" => $_POST['color'],
        "capacidad" => $_POST['capacidad']
        //y falta la imagen
    );
    //print_r($data);
    echo $Departamentos->agregarDepartamento($data);


?>