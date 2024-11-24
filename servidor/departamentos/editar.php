<?php session_start();
    include "../../clases/Departamentos.php";
    $Departamentos = new Departamentos();
    $id_departamento = $_POST['id_departamento'];
    echo json_encode($Departamentos->editarDepartamento($id_departamento));
?>