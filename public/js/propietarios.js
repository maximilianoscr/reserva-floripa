$(document).ready(function(){
    $('#tablaPropietarios').load('propietarios/tabla_propietarios.php');
});

function agregarPropietario() {
    $.ajax({
        type:"POST",
        data:$('#frmAgregarPropietario').serialize(),
        url:"../servidor/propietarios/agregar.php",
        success:function(respuesta) {
            if (respuesta == 1) {
                $('#tablaPropietarios').load('propietarios/tabla_propietarios.php');
                $('#frmAgregarPropietario')[0].reset();
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

function eliminarPropietario(id_propietario) {
    Swal.fire({
        title: 'Estas seguro de eliminar este propietario?',
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
                data:'id_propietario=' + id_propietario,
                url:"../servidor/propietarios/eliminar.php",
                success:function(respuesta) {
                    if (respuesta == 1) {
                        $('#tablaPropietarios').load('propietarios/tabla_propietarios.php');
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

function editarPropietario(id_propietario){
    $.ajax({
        type: "POST",
        url: "../servidor/propietarios/editar.php",
        data: "id_propietario=" + id_propietario,
        success : function(respuesta) {
            respuesta = jQuery.parseJSON( respuesta );
          // alert(respuesta[0].id);
            $('#id_propietario').val(respuesta[0].id_propietario);
            $('#descripcionu').val(respuesta[0].descripcion);
            $('#correou').val(respuesta[0].correo);
        }
    });
}


function actualizarPropietario() {
    $.ajax({
        type:"POST",
        data:$('#frmEditarPropietario').serialize(),
        url:"../servidor/propietario/actualizar.php",
        success:function(respuesta) {
            
            if (respuesta == 1) {
                $('#tablaPropietarios').load('propietarios/tabla_propietarios.php');
                
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