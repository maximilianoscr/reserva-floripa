$(document).ready(function(){
    $('#tablaDepartamentos').load('departamentos/tabla_departamentos.php');
});

function agregarDepartamento() {
    $.ajax({
        type:"POST",
        data:$('#frmAgregarDepartamento').serialize(),
        url:"../servidor/departamentos/agregar.php",
        success:function(respuesta) {
            if (respuesta == 1) {
                $('#tablaDepartamentos').load('departamentos/tabla_departamentos.php');
                $('#frmAgregarDepartamento')[0].reset();
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

function eliminarDepartamento(id_departamento) {
    Swal.fire({
        title: 'Estas seguro de eliminar este departamento?',
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
                data:'id_departamento=' + id_departamento,
                url:"../servidor/departamentos/eliminar.php",
                success:function(respuesta) {
                    if (respuesta == 1) {
                        $('#tablaDepartmanentos').load('departamentos/tabla_departamentos.php');
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

function editarDepartamento(id_invitado){
    $.ajax({
        type: "POST",
        url: "../servidor/departamentos/editar.php",
        data: "id_departamento=" + id_departamento,
        success : function(respuesta) {
            respuesta = jQuery.parseJSON( respuesta );

            $('#emailu').val(respuesta[0].email);
            $('#id_eventoe').val(respuesta[0].id_evento);
            $('#id_departamento').val(respuesta[0].id_departamento);
            $('#nombre_departamentou').val(respuesta[0].nombre_departamento);
            
        }
    });
}


function actualizarDepartamento() {
    $.ajax({
        type:"POST",
        data:$('#frmEditarDepartamento').serialize(),
        url:"../servidor/departamentos/actualizar.php",
        success:function(respuesta) {
            
            if (respuesta == 1) {
                $('#tablaDepartamentos').load('departamentos/tabla_departamentos.php');
                
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