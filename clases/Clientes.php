<?php
    include "Conexion.php";

    class Clientes extends Conexion {
        public function mostrarClientes($id_usuario) {
            $conexion = Conexion::conectar();
            $sql = "SELECT * FROM t_clientes ";
               //     WHERE idInvitado = $id_usuario";
            $respuesta = mysqli_query($conexion, $sql);
            return mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
        }

        public function agregarCliente($data) {
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO t_clientes (apellido,  
                                            nombre,  
                                            dni,
                                            direccion,  
                                            tel,  
                                            tel_alternativo,
                                            correo, 
                                            fechaNac) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                            
            $query = $conexion->prepare($sql);
            $query->bind_param('ssssssss',   $data['apellido'],
                                        $data['nombre'],
                                        $data['dni'],
                                        $data['direccion'],
                                        $data['tel'],
                                        $data['tel_alternativo'],
                                        $data['correo'],
                                        $data['fechaNac']);
                                        //echo "$sql";
            return $query->execute();
        }

        public function eliminarCliente($id_cliente) {
            $conexion = Conexion::conectar();
            $sql = "DELETE FROM t_clientes WHERE id_cliente = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('i', $id_cliente);
            return $query->execute();
        }

    /*    public function selectReservas($id_cliente) {
            $conexion = Conexion::conectar();
            $sql = "SELECT * FROM t_reservas 
                    WHERE id_cliente = '$id_cliente'";
            $respuesta = mysqli_query($conexion, $sql);
            $select = '<label for="id_reserva">Selecciona una reserva</label>
                        <select name="id_reserva" id="id_reserva" class="form-select" required>';

            while ($mostrar = mysqli_fetch_array($respuesta)) {
                $select .= '<option 
                            value='. $mostrar['id_reserva'] . '>' . 
                                $mostrar['titulo'] .
                            '</option>'; 
            }

            return $select .= '</select>';
        }

        public function selectReservasEditar($id_cliente) {
            $conexion = Conexion::conectar();
            $sql = "SELECT * FROM t_reservas 
                    WHERE id_cliente = '$id_cliente'";
            $respuesta = mysqli_query($conexion, $sql);
            $select = '<label for="id_reservae">Selecciona un reserva</label>
                        <select name="id_reservae" id="id_reservae" class="form-select" required>';

            while ($mostrar = mysqli_fetch_array($respuesta)) {
                $select .= '<option 
                            value='. $mostrar['id_reserva'] . '>' . 
                                $mostrar['titulo'] .
                            '</option>'; 
            }

            return $select .= '</select>';
        }*/

        public function editarCliente($id_cliente) {
            $conexion = Conexion::conectar();
            $sql = "SELECT * FROM t_clientes  
                    WHERE id_cliente = '$id_cliente'";
            $respuesta = mysqli_query($conexion, $sql);
            return mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
        }

        public function actualizarCliente($data){
            $conexion = Conexion::conectar();
            $sql = "UPDATE t_clientes SET apellido = ?,  
                                            nombre = ?,  
                                            dni = ?,  
                                            direccion = ?,  
                                            tel = ?,  
                                            tel_alternativo = ?,
                                            correo = ?, 
                                            fechaNac = ?
                    WHERE id_cliente = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('ssssssssi', $data['apellido'],
                                    $data['nombre'],
                                    $data['dni'],
                                    $data['direccion'],
                                    $data['tel'],
                                    $data['tel_alternativo'],
                                    $data['correo'],
                                    $data['fechaNac'],
                                    $data['id_cliente']);

                                    //return $query;
            return $query->execute();
        }
    }
