<?php
    include "Conexion.php";

    class Reservas extends Interacciones {
        public function mostrarReservas($id_usuario, $fecha) {//revisar fecha
            
            if ($fecha != "") {
                return Interacciones::consultar("t_reservas","id_reserva, id_usuario, titulo, fecha_inicio, fecha_fin , fecha_carga");
                // WHERE id_usuario = '$id_usuario' AND fecha_inicio LIKE '%". $fecha ."%'";
            } else {
                return Interacciones::consultar("t_reservas","id_reserva, id_usuario, titulo, fecha_inicio, fecha_fin , fecha_carga");
                // WHERE id_usuario = '$id_usuario'";
            }
        }

        public function editarReserva($id_reserva) {
            return Interacciones::consultar("t_reservas", "id_reserva, observacion, fecha_inicio, fecha_fin, fecha_carga", "id_reserva = '$id_reserva'");
        }

        public function agregar($data) {
            $conexion = Interacciones::conectar();
            $sql = "INSERT INTO t_reservas (id_usuario,
                                            titulo,
                                            fecha_inicio,
                                            fecha_fin,
                                            fecha_carga) 
                            VALUES (?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('issss', $data['id_usuario'],
                                        $data['titulo'],
                                        $data['fecha_inicio'],
                                        $data['fecha_fin'],
                                        $data['fecha_carga']);
            return $query->execute();
        }

        public function eliminarReserva($id_reserva) {
            $conexion = Interacciones::conectar();
            $sql = "DELETE FROM t_reservas WHERE id_reserva = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('i', $id_reserva);
            return $query->execute();
        }

        public function actualizarReserva($data) {
            $conexion = Interacciones::conectar();
            $sql = "UPDATE t_reservas SET id_usuario = ?,
                                        cliente = ?,
                                        fecha_inicio = ?,
                                        fecha_fin = ?, 
                                        fecha_carga = ? 
                    WHERE id_reserva = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('issssi', $data['id_usuario'], 
                                            $data['reserva'],
                                            $data['fecha_inicio'],
                                            $data['fecha_fin'],
                                            $data['fecha'],
                                            $data['id_reserva']);
            return $query->execute();
        }
/*
        public function mostrarInvitadosEvento($id_evento) {//FUNCION RARA REVISAR
            $conexion = Interacciones::conectar();
            $sql = "SELECT * FROM v_invitados 
                    WHERE idEvento = '$id_evento'";//DEBE SER DE LA VISTA
            $respuesta = mysqli_query($conexion, $sql);
            return mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
        }

        public function hayInvitados($id_evento) {
            $conexion = Interacciones::conectar();
            $sql = "SELECT 
                        COUNT(*) as total
                    FROM
                        t_invitados
                    WHERE
                        id_evento = '$id_evento'";
            $respuesta = mysqli_query($conexion, $sql);
            
            return mysqli_fetch_array($respuesta)['total'];
        }*/

        public function fullCalendar($id_usuario) {
            $conexion = Interacciones::conectar();
            $sql = "SELECT 
                        id_reserva AS id,
                        titulo AS title,
                        fecha_inicio AS start,
                        fecha_fin AS end,
                        color as backgroundColor
                    FROM
                        t_reservas 
                    WHERE id_usuario = '$id_usuario'";

            $respuesta = mysqli_query($conexion, $sql);
            $eventos = mysqli_fetch_all($respuesta, MYSQLI_ASSOC);

            return json_encode($eventos);
        }
    }
