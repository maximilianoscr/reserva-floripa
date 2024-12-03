<?php
    include "Conexion.php";

    class Reservas extends Conexion {
        public function mostrarReservas($id_usuario) {
            $conexion = Conexion::conectar();

            $sql = "SELECT a.id_reserva,a.id_usuario, a.titulo,DATE(a.fecha_inicio) as fecha_inicio,DATE(a.fecha_fin) AS fecha_fin,a.fecha_carga,
                        h.titulo AS depto, h.id AS id_departamento,CONCAT(h.direccion,'.Nro° ',h.altura) AS direccion, h.capacidad,h.color,
                        u.id_usuario,
                        c.id_cliente, CONCAT(c.apellido,', ',c.nombre) as cliente
                    FROM t_reservas a 
                    INNER JOIN t_habitaciones h ON h.id=a.id_depto
                    INNER JOIN t_usuarios u ON u.id_usuario=a.id_usuario
                    INNER JOIN t_clientes c ON c.id_cliente=a.id_cliente ";
                // WHERE id_usuario = '$id_usuario' AND fecha_inicio LIKE '%". $fecha ."%'";
            $respuesta = mysqli_query($conexion, $sql);
            return mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
        }

        public function editarReserva($id_reserva) {
            $conexion = Conexion::conectar();
            $sql = "SELECT id_reserva,
                            observacion,
                            fecha_inicio AS fecha_inicio, 
                            fecha_fin AS fecha_fin,
                            fecha_carga
                    FROM 
                        t_reservas 
                    WHERE id_reserva = '$id_evento'";
            $respuesta = mysqli_query($conexion, $sql);
            return mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
        }

        public function agregar($data) {
            $conexion = Conexion::conectar();
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
            $conexion = Conexion::conectar();
            $sql = "DELETE FROM t_reservas WHERE id_reserva = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('i', $id_reserva);
            return $query->execute();
        }

        public function actualizarReserva($data) {
            $conexion = Conexion::conectar();
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
            $conexion = Conexion::conectar();
            $sql = "SELECT * FROM v_invitados 
                    WHERE idEvento = '$id_evento'";//DEBE SER DE LA VISTA
            $respuesta = mysqli_query($conexion, $sql);
            return mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
        }

        public function hayInvitados($id_evento) {
            $conexion = Conexion::conectar();
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
            $conexion = Conexion::conectar();


            $sql="SELECT a.id_reserva as id, a.titulo as title,
                a.fecha_inicio as start,
                a.fecha_fin as end,
                h.color AS backgroundColor
                FROM t_reservas a 
                INNER JOIN t_habitaciones h ON h.id=a.id_depto
                WHERE a.id_usuario = '$id_usuario'";

            $respuesta = mysqli_query($conexion, $sql);
            $eventos = mysqli_fetch_all($respuesta, MYSQLI_ASSOC);

            return json_encode($eventos);
        }
    }
