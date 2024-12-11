$(document).ready(function(){
    $('#tablaReservas').load('reservas/tabla_reservas.php');
});

function buscarPorFecha() {
    let fecha = $('#fechaBuscar').val();
    $('#tablaReservas').load('reservas/tabla_reservas.php?fecha=' + fecha);
}

   // Evento para cargar departamentos según fechas
   $('#fecha_inicio, #fecha_fin').on('change', cargarDepartamentos);

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
            $('#nombre_reservau').val(respuesta[0].titulo);
            $('#deptou').val(respuesta[0].depto);
            $('#clienteu').val(respuesta[0].cliente);
            $('#fecha_iniciou').val(respuesta[0].fecha_inicio);
            $('#fecha_finu').val(respuesta[0].fecha_fin);
            $('#totalu').val(respuesta[0].valor_total);
            $('#parcialu').val(respuesta[0].pago_parcial);
            $('#obsu').val(respuesta[0].observacion);
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

function cargarDepartamentos() {
    let fechaIngreso = $('#fecha_inicio').val();
    let fechaEgreso = $('#fecha_fin').val();
    let selector = $('#id_depto');

    // Limpiar el selector antes de agregar nuevas opciones
    selector.empty();

    if (fechaIngreso && fechaEgreso) {
        selector.append('<option value="">Cargando departamentos...</option>');

        $.ajax({
            url: '../servidor/reservas/obtener_departamentos.php',
            method: 'POST',
            data: { fecha_ingreso: fechaIngreso, fecha_egreso: fechaEgreso },
            dataType: 'json',  
            success: function(response) {        
            
                let selector = $('#id_depto');
                selector.empty(); 
            
                if (Array.isArray(response) && response.length > 0) {
                    response.forEach(function(depto) {
                        selector.append(`<option value="${depto.id}">${depto.titulo}</option>`);
                    });
                } else {
                    console.error('La respuesta no es un array válido');
                    selector.append('<option value="">No existe disponibilidad para esas fechas</option>');
                }
            },
            error: function(xhr, status, error) {
                console.log("Error en la solicitud:", error);
            }
            
        });
    } else {
        selector.append('<option value="">Por favor cargar ingreso y egreso</option>');
    }
}