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
            <th>Cantidad de habitaciones</th>
            <th>M&aacute;ximo personas</th>
            <th>Precio x dia</th>
            <th>Ubicacion</th>
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
            <td><?php echo $key['cantidad_habitacion'] ?></td>
            <td><?php echo $key['capacidad'] ?></td>
            <td><?php echo number_format($key['precio1'], 2, '.', ''); ?></td>
            <?php if($key['ubi'] != '' ){ ?>
                <td><a href="<?php echo "https://www.google.com/maps?q=".$key['ubi']; ?>" target="_blank">Haga click para ver la ubicaci&oacute;n</a></td>
            <?php }else{ ?>
                <td>Ubicaci&oacute;n no cargada</a></td>
            <?php } ?>
            <td><input type="color" class="form-control form-control-color" id="color" name="color" value="<?php echo $key['color'] ?>" disabled></td>
            <td>
                <span class="btn btn-warning" data-bs-toggle="modal" 
                data-bs-target="#modal_editar_departamento" 
                onclick="editarDepartamento('<?php echo $key['id'] ?>')">
                    <i class="fa-solid fa-house-circle-exclamation"></i>
                </span>
            </td>
            <td>
                <span class="btn btn-danger" 
                onclick="eliminarDepartamento('<?php echo $key['id'] ?>')">
                    <i class="fa-solid fa-house-circle-xmark"></i>
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