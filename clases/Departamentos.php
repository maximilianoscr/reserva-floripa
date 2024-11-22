<?php
    include "Conexion.php";

    class Departamentos extends Conexion {
        public function mostrarDepartamentos() {
            $conexion = Conexion::conectar();
            $sql = "SELECT * FROM t_habitaciones where baja is null";//hacer vista departamentos
               //     WHERE idInvitado = $id_usuario";
            $respuesta = mysqli_query($conexion, $sql);
            return mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
        }

        public function agregarDepartamento($data) {
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO t_habitaciones (titulo,
                                            direccion,
                                            altura,
                                            tipo_habitacion,
                                            descripcion,
                                            x_mapa,
                                            y_mapa,
                                            capacidad,
                                            color, 
                                            imagen) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('sssissssss', $data['titulo'],
                                        $data['direccion'],
                                        $data['altura'],
                                        $data['tipo_habitacion'],
                                        $data['descripcion'],
                                        $data['x_mapa'],
                                        $data['y_mapa'],
                                        $data['capacidad'],
                                        $data['color'],
                                        $data['imagen']);
            return $query->execute();
        }

        public function eliminarDepartamento($id_departamento) {
            $conexion = Conexion::conectar();
            $sql = "UPDATE t_habitaciones SET baja=1 where id=?";
            $query = $conexion->prepare($sql);
            $query->bind_param('i',  $id_departamento);
            return $query->execute();
        }

        public function selectReservas($id_usuario) {
            $conexion = Conexion::conectar();
            $sql = "SELECT * FROM t_reservas 
                    WHERE id_usuario = '$id_usuario'";
            $respuesta = mysqli_query($conexion, $sql);
            $select = '<label for="id_reserva">Selecciona una reserva</label>
                        <select name="id_reserva" id="id_reserva" class="form-select" required>';

            while ($mostrar = mysqli_fetch_array($respuesta)) {
                $select .= '<option 
                            value='. $mostrar['id_reserva'] . '>' . 
                                $mostrar['observacion'] .
                            '</option>'; 
            }

            return $select .= '</select>';
        }
       /* public function selectDepartamentos($id_usuario) {
            $conexion = Conexion::conectar();
            $sql = "SELECT * FROM t_habitaciones 
                    WHERE id_usuario = '$id_usuario'";
            $respuesta = mysqli_query($conexion, $sql);
            $select = '<label for="id_departamento">Seleccion un departamento</label>
                        <select name="id_departamento" id="id_departamento" class="form-select" required>';

            while ($mostrar = mysqli_fetch_array($respuesta)) {
                $select .= '<option 
                            value='. $mostrar['id_departamento'] . '>' . 
                                $mostrar['departamento'] .
                            '</option>'; 
            }

            return $select .= '</select>';
        }*/

        public function selectReservasEditar($id_usuario) {
            $conexion = Conexion::conectar();
            $sql = "SELECT * FROM t_reservas 
                    WHERE id_usuario = '$id_usuario'";
            $respuesta = mysqli_query($conexion, $sql);
            $select = '<label for="id_reservae">Selecciona una reserva</label>
                        <select name="id_reservae" id="id_reservae" class="form-select" required>';

            while ($mostrar = mysqli_fetch_array($respuesta)) {
                $select .= '<option 
                            value='. $mostrar['id_reserva'] . '>' . 
                                $mostrar['observacion'] .
                            '</option>'; 
            }

            return $select .= '</select>';
        }

        public function editarDepartamento($id_departamento) {
            $conexion = Conexion::conectar();
            $sql = "SELECT * FROM t_habitaciones  
                    WHERE id = '$id_departamento'";
            $respuesta = mysqli_query($conexion, $sql);
            return mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
        }

        public function actualizarDepartamento($data){
            $conexion = Conexion::conectar();
            $sql = "UPDATE t_habitaciones SET titulo = ?,
                                            direccion = ?,
                                            altura = ?,
                                            tipo_habitacion = ?,
                                            descripcion = ?,
                                            x_mapa = ?,
                                            y_mapa = ?,
                                            capacidad = ?,
                                            color = ?
                    WHERE id = ?";//revisar falta AGREGAR IMAGEEEN
            $query = $conexion->prepare($sql);
            $query->bind_param('sssssssssi', $data['titulo'],
                                        $data['direccion'],
                                        $data['altura'],
                                        $data['tipo_habitacion'],
                                        $data['descripcion'],
                                        $data['x_mapa'],
                                        $data['y_mapa'],
                                        $data['capacidad'],
                                        $data['color'],
                                        $data['id']);
            return $query->execute();
        }
    }
