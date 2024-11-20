$(document).ready(function(){
    $('#tablaReservas').load('reservas/tabla_reservas.php');
});

function buscarPorFecha() {
    let fecha = $('#fechaBuscar').val();
    $('#tablaReservas').load('reservas/tabla_reservas.php?fecha=' + fecha);
}

function agregarReserva(){

    $.ajax({
        type:"POST",
        data:$('#frmAgregarReserva').serialize(),
        url:"../servidor/reservas/agregar.php",
        success:function(respuesta) {
            if (respuesta == 1) {
                $('#tablaReservas').load('reservas/tabla_reservas.php');
                $('#frmAgregarReserva')[0].reset();
                Swal.fire({
                    title: 'Exito!',
                    text: 'Agregado',
                    icon: 'success'
                })
            } else {
                Swal.fire({
                    title: 'Error!',
                    text: 'Fallo con ' + respuesta,
                    icon: 'error'
                })
            }
        }
    });

    return false;
}

function eliminarEvento(id_evento) {
    Swal.fire({
        title: 'Estas seguro de eliminar esta reserva?',
        text: "Una vez eliminado, no podra ser recuperado",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '!Eliminar!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type:"POST",
                data:'id_reserva=' + id_evento,
                url:"../servidor/reservas/eliminar.php",
                success:function(respuesta) {
                    if (respuesta == 1) {
                        $('#tablaReservas').load('reservas/tabla_reservas.php');
                        Swal.fire({
                            title: 'Exito!',
                            text: 'Eliminado',
                            icon: 'success'
                        })
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Fallo con ' + respuesta,
                            icon: 'error'
                        })
                    }
                }
            });
        }
      })
}

function editarReserva(id_reserva){
    $.ajax({
        type: "POST",
        url: "../servidor/reservas/editar.php",
        data: "id_reserva=" + id_reserva,
        success : function(respuesta) {
            respuesta = jQuery.parseJSON( respuesta );
            
            $('#nombre_reservau').val(respuesta[0].reserva);
            $('#cliente').val(respuesta[0].cliente);
            $('#fecha_iniciou').val(respuesta[0].fecha_inicio);
            $('#fecha_finu').val(respuesta[0].fecha_fin);
            $('#obs').val(respuesta[0].obs);
            $('#id_reserva').val(respuesta[0].id_reserva);
        }
    });
}

function actualizarReserva() {
    $.ajax({
        type: "POST",
        data: $('#frmEditarReserva').serialize(),
        url: "../servidor/reservas/actualizar.php",
        success : function(respuesta) {
            if (respuesta == 1) {
                $('#tablaReservas').load('reservas/tabla_reservas.php');
                Swal.fire({
                    title: 'Exito!',
                    text: 'Actualizado',
                    icon: 'success'
                })
            } else {
                Swal.fire({
                    title: 'Error!',
                    text: 'Fallo con ' + respuesta,
                    icon: 'error'
                })
            }
        }
    });

    return false;

}