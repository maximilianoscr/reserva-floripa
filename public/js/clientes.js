$(document).ready(function(){
    $('#tablaClientes').load('clientes/tabla_clientes.php');
});

function agregarCliente() {
    $.ajax({
        type:"POST",
        data:$('#frmAgregarCliente').serialize(),
        url:"../servidor/clientes/agregar.php",
        success:function(respuesta) {
            if (respuesta == 1) {
                $('#tablaClientes').load('clientes/tabla_clientes.php');
                $('#frmAgregarCliente')[0].reset();
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

function eliminarCliente(id_cliente) {
    Swal.fire({
        title: 'Estas seguro de eliminar este cliente?',
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
                data:'id_cliente=' + id_cliente,
                url:"../servidor/clientes/eliminar.php",
                success:function(respuesta) {
                    if (respuesta == 1) {
                        $('#tablaClientes').load('clientes/tabla_clientes.php');
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

function editarCliente(id_cliente){
    $.ajax({
        type: "POST",
        url: "../servidor/clientes/editar.php",
        data: "id_cliente=" + id_cliente,
        success : function(respuesta) {
            respuesta = jQuery.parseJSON( respuesta );
            //alert(respuesta[0].tel_alternativo);
            $('#dnie').val(respuesta[0].dni);
            $('#apellidoe').val(respuesta[0].apellido);
            $('#nombree').val(respuesta[0].nombre);
            $('#direccione').val(respuesta[0].direccion);
            $('#telu').val(respuesta[0].tel);
            $('#tel_altu').val(respuesta[0].tel_alternativo);
            $('#correoe').val(respuesta[0].correo);
            $('#fechaNacu').val(respuesta[0].fechaNac);
        }
    });
}


function actualizarCliente() {
    $.ajax({
        type:"POST",
        data:$('#frmEditarCliente').serialize(),
        url:"../servidor/clientes/actualizar.php",
        success:function(respuesta) {
            
            if (respuesta == 1) {
                $('#tablaClientes').load('clientes/tabla_clientes.php');
                
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