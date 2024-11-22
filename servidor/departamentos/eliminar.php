<?php session_start();
    include "../../clases/Departamentos.php";
    $Departamentos = new Departamentos();
    $id_departamento = $_POST['id_departamento'];
    echo $Departamentos->eliminarDepartamento($id_departamento);
?>