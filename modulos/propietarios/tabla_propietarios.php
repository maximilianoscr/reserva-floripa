<?php session_start(); 
    include "../../clases/Propietarios.php";
    $Propietario = new Propietarios();
    $items = $Propietario->mostrarPropietarios($_SESSION['id_usuario']);
?>

<table class="table table-sm table-hover" id="tabla_propietarios_load">
    <thead>
        <tr>
            <th>Apellido y nombres</th>
            <th>Correo</th>
            <th>Ver</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($items as $key):?>
        <tr>
            <td><?php echo $key['descripcion'] ?></td>
            <td><?php echo $key['correo'] ?></td>
            <td>
            <span class="btn btn-light" data-bs-toggle="modal" 
                data-bs-target="#modal_ver_propietario" 
                onclick="verPropietario('<?php echo $key['id_propietario'] ?>')">
                <i class="fa-solid fa-eye"></i>
            </span>
            </td>
            <td>
                <span class="btn btn-warning" data-bs-toggle="modal" 
                data-bs-target="#modal_editar_propietario" 
                onclick="editarPropietario('<?php echo $key['id_propietario'] ?>')">
                    <i class="fa-solid fa-user-pen"></i>
                </span>
            </td>
            <td>
                <span class="btn btn-danger" 
                onclick="eliminarPropietario('<?php echo $key['id_propietario'] ?>')">
                    <i class="fa-solid fa-user-xmark"></i>
                </span>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function(){
        $('#tabla_propietarios_load').DataTable({
            "language": {
                "url": "../public/librerias/datatables/Spanish.json"
            }
        });
    });
</script>