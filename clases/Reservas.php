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
                                id_cliente,
                                id_depto,
                                titulo,
                                fecha_inicio,
                                fecha_fin,
                                fecha_carga,
                                valor_total,
                                pago_parcial,
                                observacion) 
                    VALUES (?, ?, ?, ?, CONCAT(?, ' 14:00:00'), CONCAT(?, ' 10:00:00'), NOW(), ?, ?, ?)";

            $query = $conexion->prepare($sql);
            $query->bind_param('iiisssiis', $data['id_usuario'],
                                        $data['id_cliente'],
                                        $data['id_depto'],
                                        $data['titulo'],
                                        $data['fecha_inicio'],
                                        $data['fecha_fin'],
                                        $data['valor_total'],
                                        $data['pago_parcial'],
                                        $data['obs']);
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
            $conexion = Conexion::conectar();

            $fecha_inicio = $data['fecha_inicio'] . ' 14:00:00';
            $fecha_fin = $data['fecha_fin'] . ' 10:00:00';

            $sql = "UPDATE t_reservas SET id_usuario = ?,
                                    titulo = ?,
                                    fecha_inicio = ?,
                                    fecha_fin = ?,
                                    fecha_carga = NOW(),
                                    valor_total = ?,
                                    pago_parcial = ?,
                                    observacion = ?
                    WHERE id_reserva = ?";

            $query = $conexion->prepare($sql);
            $query->bind_param('isssiisi', $data['id_usuario'], 
                                    $data['titulo'],
                                    $fecha_inicio, // Fecha con hora específica
                                    $fecha_fin,    // Fecha con hora específica
                                    $data['total'],
                                    $data['parcial'],
                                    $data['obs'],
                                    $data['id_reserva']);
            return $query->execute();
        }

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
            $reservas = mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
            //echo "<pre>";            print_r($reservas);
            return json_encode($reservas);
            
        }

        public function retornarDisponibles($ingreso,$egreso){
            $conexion = Conexion::conectar();

            $sql = "SELECT h.*
                FROM t_habitaciones h
                LEFT JOIN t_reservas r 
                    ON h.id = r.id_depto
                    AND r.baja IS NULL
                    AND (
                        (r.fecha_inicio BETWEEN '$ingreso 14:00:00' AND '$egreso 10:00:00') OR
                        (r.fecha_fin BETWEEN '$ingreso 14:00:00' AND '$egreso 10:00:00') OR
                        ('$ingreso 14:00:00' BETWEEN r.fecha_inicio AND r.fecha_fin) OR
                        ('$egreso 10:00:00' BETWEEN r.fecha_inicio AND r.fecha_fin)
                    )
                WHERE h.baja IS NULL
                AND r.id_reserva IS NULL";
            $respuesta = mysqli_query($conexion, $sql);
            $Deptosdisponibles = mysqli_fetch_all($respuesta, MYSQLI_ASSOC);

            return json_encode($Deptosdisponibles);     
        }
    }
