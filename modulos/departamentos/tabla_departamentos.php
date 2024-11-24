<?php session_start(); 
    include "../../clases/Departamentos.php";
    $Departamentos = new Departamentos();
    $items = $Departamentos->mostrarDepartamentos();
?>

<table class="table table-sm table-hover" id="tabla_departamentos_load">
    <thead>
        <tr>
            <th>Titulo</th>
            <th>Descripcion</th>
            <th>Tipo de habitacion</th>
            <th>Capacidad</th>
            <th>Latitud y Longitud</th>
            <th>Color</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($items as $key):?>
        <tr>
            <td><?php echo $key['titulo'] ?></td>
            <td><?php echo $key['descripcion'] ?></td>
            <td><?php echo $key['tipo_habitacion'] ?></td>
            <td><?php echo $key['capacidad'] ?></td>
            <td><?php echo $key['x_mapa']." ".$key['y_mapa'] ?></td>
            <td><input type="color" class="form-control form-control-color" id="color" name="color" value="<?php echo $key['color'] ?>" disabled></td>
            <td>
                <span class="btn btn-warning" data-bs-toggle="modal" 
                data-bs-target="#modal_editar_departamento" 
                onclick="editarDepartamento('<?php echo $key['id'] ?>')">
                    <i class="fa-solid fa-user-pen"></i>
                </span>
            </td>
            <td>
                <span class="btn btn-danger" 
                onclick="eliminarDepartamento('<?php echo $key['id'] ?>')">
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