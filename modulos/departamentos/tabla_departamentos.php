<?php session_start(); 
    include "../../clases/Departamentos.php";
    $Departamentos = new Departamentos();
    $items = $Departamentos->mostrarDepartamentos($_SESSION['id_usuario']);
?>

<table class="table table-sm table-hover" id="tabla_departamentos_load">
    <thead>
        <tr>
            <th>Departamento</th>
            <th>Email</th>
            <th>Nombres</th>
            <th>Fecha</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($items as $key):?>
        <tr>
            <td><?php echo $key['id_invitado'] ?></td>
            <td><?php echo $key['id_evento'] ?></td>
            <td><?php echo $key['nombre_invitado'] ?></td>
            <td><?php echo $key['email'] ?></td>
            <td>
                <span class="btn btn-warning" data-bs-toggle="modal" 
                data-bs-target="#modal_editar_departamento" 
                onclick="editarDepartamento('<?php echo $key['id_invitado'] ?>')">
                    <i class="fa-solid fa-user-pen"></i>
                </span>
            </td>
            <td>
                <span class="btn btn-danger" 
                onclick="eliminarDepartamento('<?php echo $key['id_invitado'] ?>')">
                    <i class="fa-solid fa-user-xmark"></i>
                </span>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function(){
        $('#tabla_departamentos_load').DataTable({
            "language": {
                "url": "../public/librerias/datatables/Spanish.json"
            }
        });
    });
</script>