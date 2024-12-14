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

function eliminarReserva(id_reserva) {
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
                data:'id_reserva=' + id_reserva,
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
            $('#id_deptou').append(`<option value="${respuesta[0].id_depto}">${respuesta[0].depto}</option>`);
            $('#clienteu').val(respuesta[0].cliente);
            $('#fecha_iniciou').val(respuesta[0].fecha_inicio);
            $('#fecha_finu').val(respuesta[0].fecha_fin);
            $('#totalu').val(respuesta[0].valor_total);
            $('#parcialu').val(respuesta[0].pago_parcial);
            $('#obsu').val(respuesta[0].observacion);
            $('#id_reserva').val(respuesta[0].id_reserva);
            // Almacenar el ID del departamento original
            $('#id_deptou').data('original-depto', respuesta[0].id_depto);
            configurarEventosDeFecha();
        }
    });
}
function configurarEventosDeFecha() {
    $('#fecha_iniciou, #fecha_finu').off('change').on('change', function () {
        actualizarDepartamentosDisponibles();
    });
}
function actualizarDepartamentosDisponibles() {
    const fechaInicio = $('#fecha_iniciou').val();
    const fechaFin = $('#fecha_finu').val();
    const deptoOriginal = $('#id_deptou').data('original-depto');

    if (fechaInicio && fechaFin) {
        $.ajax({
            url: "../servidor/reservas/obtener_departamentos.php",
            type: "POST",
            dataType: "json", // Asegura que la respuesta se interprete como JSON
            data: {
                fecha_ingreso: fechaInicio,
                fecha_egreso: fechaFin
            },
            success: function (respuesta) {
                if (Array.isArray(respuesta)) {
                    $('#id_deptou').empty();

                    if (respuesta.length === 0) {
                        // No hay departamentos disponibles
                        $('#id_deptou').append(
                            `<option value="">No existe disponibilidad</option>`
                        );
                        $('#id_deptou').prop('disabled', true);
                    } else {
                        // Hay departamentos disponibles
                        $('#id_deptou').prop('disabled', false);
                        let deptoDisponible = false;

                        respuesta.forEach(depto => {
                            const seleccionado = depto.id == deptoOriginal ? 'selected' : '';
                            if (seleccionado) deptoDisponible = true;
                            $('#id_deptou').append(
                                `<option value="${depto.id}|${depto.precio1}" ${seleccionado}>${depto.titulo}</option>`
                            );
                        });

                        // Si el departamento original no está disponible, seleccionar el primero de la lista
                        if (!deptoDisponible && respuesta.length > 0) {
                            $('#id_deptou').val(respuesta[0].id);
                        }
                    }
                } else {
                    console.error("La respuesta no es un arreglo:", respuesta);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error("Error en la solicitud AJAX:", textStatus, errorThrown);
            }
        });
    }
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
        selector.empty(); 
        
        $.ajax({
            url: '../servidor/reservas/obtener_departamentos.php',
            method: 'POST',
            data: { fecha_ingreso: fechaIngreso, fecha_egreso: fechaEgreso },
            dataType: 'json',  
            success: function(response) {        
            
                let selector = $('#id_depto');
                //selector.empty(); 
                selector.append('<option value="">Selecciona un departamento...</option>');
                if (Array.isArray(response) && response.length > 0) {
                    response.forEach(function(depto) {
                        selector.append(`<option value="${depto.id}|${depto.precio1}">${depto.titulo}</option>`);
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
function calcularPrecio() {
    $('#id_depto').on('change', function () {
        const seleccion = $(this).val(); // Obtén el valor del selector
        const fechaInicio = $('#fecha_inicio').val(); // Fecha de inicio
        const fechaFin = $('#fecha_fin').val(); // Fecha de fin

        if (seleccion && fechaInicio && fechaFin) { 
            // Solo si hay un valor válido en el selector y ambas fechas están completas
            const [idDepto, precioPorDia] = seleccion.split('|');
            const dias = calcularDias(fechaInicio, fechaFin);

            if (dias > 0) {
                const total = dias * parseFloat(precioPorDia);
                $('#total').val(total.toFixed(2)); // Actualiza el input total
            } else {
                alert('Las fechas deben formar un rango válido.');
            }
        }
    });
}

// Función para calcular los días entre dos fechas
function calcularDias(fechaInicio, fechaFin) {
    const inicio = new Date(fechaInicio);
    const fin = new Date(fechaFin);

    if (inicio > fin) {
        return 0; // Si la fecha de inicio es posterior a la de fin, devuelve 0
    }

    const diff = Math.abs(fin - inicio); // Diferencia en milisegundos
    return Math.ceil(diff / (1000 * 60 * 60 * 24)); // Convertir a días
}

// Ejecuta el código al cargar el DOM
$(document).ready(function () {
    calcularPrecio();
});
