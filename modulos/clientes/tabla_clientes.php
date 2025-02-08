<?php session_start(); 
    include "../../clases/Clientes.php";
    $Clientes = new Clientes();
    $items = $Clientes->mostrarClientes($_SESSION['id_usuario']);
?>

<table class="table table-sm table-hover" id="tabla_clientes_load">
    <thead>
        <tr>
            <th>Apellido, nombres</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Fecha de Nacimiento</th>
            <th>Ver</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($items as $key):?>
        <tr>
            <td><?php echo $key['apellido'].", ".$key['nombre'] ?></td>
            <td><?php echo $key['direccion'] ?></td>
            <td><?php echo $key['tel'] ?></td>
            <td><?php echo $key['correo'] ?></td>
            <td><?php echo $key['fechaNac'] ?></td>
            <td>
            <span class="btn btn-light" data-bs-toggle="modal" 
                data-bs-target="#modal_ver_cliente" 
                onclick="verCliente('<?php echo $key['id_cliente'] ?>')">
                <i class="fa-solid fa-eye"></i>
            </span>
            </td>
            <td>
                <span class="btn btn-warning" data-bs-toggle="modal" 
                data-bs-target="#modal_editar_cliente" 
                onclick="editarCliente('<?php echo $key['id_cliente'] ?>')">
                    <i class="fa-solid fa-user-pen"></i>
                </span>
            </td>
            <td>
                <span class="btn btn-danger" 
                onclick="eliminarCliente('<?php echo $key['id_cliente'] ?>')">
                    <i class="fa-solid fa-user-xmark"></i>
                </span>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function(){
        $('#tabla_clientes_load').DataTable({
            "language": {
                "url": "../public/librerias/datatables/Spanish.json"
            }
        });
    });
</script>