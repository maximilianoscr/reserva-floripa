<?php session_start();

    $fecha = "";
    if (isset($_GET['fecha'])) {
        $fecha = $_GET['fecha'];
    }

    include "../../clases/Reservas.php";
    $Reservas = new Reservas();
    $items = $Reservas->mostrarReservas($_SESSION['id_usuario'], $fecha);
?>

<table class="table table-sm table-hover" id="tabla_reservas_load">
    <thead>
        <tr>
            <th>Departamento</th>
            <th>Cliente</th>
            <th>Fecha inicio</th>
            <th>Fecha fin</th>
            <th>Imprimir</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($items as $key ) : ?>
        <tr>
            <td><?php echo $key['id_reserva'] ?></td>
            <td><?php echo $key['id_usuario'] ?></td>
            <td><?php echo $key['fecha_inicio'] ?></td>
            <td><?php echo $key['fecha_fin'] ?></td>

            
            <td>
            <?php /*
                $invitados = $Eventos->hayInvitados($key['id_evento']);
                if ($invitados > 0) {*/
            ?>
                <a href="imprimir_reserva.php?id_reserva=<?php echo $key['id_reserva'] ?>" 
                    class="btn btn-info" 
                    target="_blank">
                     <i class="fa-solid fa-print"></i> 
                     <span class="badge bg-secondary"><?php echo "HOLA MUNDO"; ?></span>
                </a>
            <?php
                //}
            ?>
            </td>
            
            <td>
                <span class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal_editar_reserva" 
                    onclick="editarReserva('<?php echo $key['id_reserva'] ?>')">
                    <i class="fa-solid fa-pen-to-square"></i>
                </span>
            </td>
            <td>
                <span class="btn btn-danger" onclick="eliminarReserva('<?php echo $key['id_reserva'] ?>')">
                    <i class="fa-solid fa-calendar-xmark"></i>
                </span>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function(){
        $('#tabla_reservas_load').DataTable({
            "language": {
                "url": "../public/librerias/datatables/Spanish.json"
            }
        });
    });
</script>