<?php
    include_once "Conexion.php";

    class Reservas extends Interacciones {
        public function mostrarReservas($id_usuario, $filtro=null) {
            $solicitado = "a.id_reserva,a.id_usuario, a.titulo,DATE(a.fecha_inicio) as fecha_inicio,DATE(a.fecha_fin) AS fecha_fin,a.fecha_carga,
                        h.titulo AS depto, h.id AS id_departamento,CONCAT(h.direccion,'.Nro° ',h.altura) AS direccion, h.capacidad,h.color,
                        u.id_usuario,
                        c.id_cliente, CONCAT(c.apellido,', ',c.nombre) as cliente, m.sigla,m.descripcion";
            $tabla="t_reservas a 
            INNER JOIN t_habitaciones h ON h.id=a.id_depto
            INNER JOIN t_usuarios u ON u.id_usuario=a.id_usuario
            INNER JOIN t_clientes c ON c.id_cliente=a.id_cliente
            INNER JOIN t_moneda m ON m.id=a.moneda";
            $filtro='1=1 order by a.fecha_inicio desc,a.fecha_fin desc';
            if ($filtro != "") {
                return Interacciones::consultar($tabla,$solicitado,$filtro);
            } else {
                return Interacciones::consultar($tabla,$solicitado);
            }
        }

        public function buscarReserva($id_reserva) {
            $solicitado = "a.id_reserva,a.id_usuario, a.titulo,DATE(a.fecha_inicio) as fecha_inicio,DATE(a.fecha_fin) AS fecha_fin,a.fecha_carga,
               h.titulo AS depto, h.id AS id_departamento,CONCAT(h.direccion,' ',h.altura) AS direccion, h.capacidad,h.color,
               u.id_usuario,a.valor_total, a.pago_parcial, (a.valor_total - a.pago_parcial) AS restante,
               c.id_cliente, CONCAT(c.apellido,', ',c.nombre) as cliente,
               h.descripcion,
               m.sigla,m.descripcion as moneda";
            $tabla="t_reservas a 
            LEFT JOIN t_habitaciones h ON h.id=a.id_depto
            LEFT JOIN t_usuarios u ON u.id_usuario=a.id_usuario
            LEFT JOIN t_clientes c ON c.id_cliente=a.id_cliente
            LEFT JOIN t_propietarios p ON p.id_propietario=h.id_propietario
            LEFT JOIN t_moneda m ON m.id=a.moneda";
            $filtro="a.id_reserva=$id_reserva";
            if ($filtro != "") {
                return Interacciones::consultar($tabla,$solicitado,$filtro);
            } else {
                return Interacciones::consultar($tabla,$solicitado);
            }
        }

        public function editarReserva($id_reserva) {
            $consultado = "a.id_reserva,
                            a.titulo,
                            a.valor_total,
                            a.pago_parcial,
                            a.observacion,
                            DATE(a.fecha_inicio) AS fecha_inicio, 
                            DATE(a.fecha_fin) AS fecha_fin,
                            b.titulo as depto,
                            b.id as id_depto,
                            a.moneda as id_moneda,
                            m.sigla as sigla,
                            m.descripcion as desc_moneda,
                            CONCAT(c.apellido,', ', c.nombre) as cliente ";
            $tabla='t_reservas a 
                        INNER JOIN t_habitaciones b ON a.id_depto=b.id 
                        INNER JOIN t_clientes c ON a.id_cliente=c.id_cliente
                        INNER JOIN t_moneda m ON a.moneda=m.id';
            $filtro="id_reserva =$id_reserva";
            return json_encode(Interacciones::consultar($tabla, $consultado,$filtro));
        }

        public function agregar($data) {

            $data= [  'id_usuario' => $data['id_usuario'],
                      'id_cliente' => $data['id_cliente'],
                        'id_depto' => $data['id_depto'],
                          'titulo' => $data['titulo'],
                    'fecha_inicio' => $data['fecha_inicio'].' 14:00:00',
                       'fecha_fin' => $data['fecha_fin'].' 10:00:00',
                     'fecha_carga' => date('Y-m-d H:i:s'),
                        'moneda' => $data['moneda'],
                     'valor_total' => $data['valor_total'],
                    'pago_parcial' => $data['pago_parcial'],
                     'observacion' => $data['obs']
                                ];
            return Interacciones::insert("t_reservas", $data);

        }

        public function eliminarReserva($id_reserva) {
 
            return Interacciones::delete("t_reservas","id_reserva=".$id_reserva);

        }

        public function actualizarReserva($data) {

            $datos=[ 'id_usuario'   => $data['id_usuario'],
                           'titulo' => $data['titulo'],
                  'fecha_inicio'    => $data['fecha_inicio']. ' 14:00:00',
                        'fecha_fin' => $data['fecha_fin']. ' 10:00:00',
                     'fecha_carga'  => date('Y-m-d H:i:s'),
                      'valor_total' => $data['total'],
                           'moneda' => $data['moneda'],
                    'pago_parcial'  => $data['parcial'],
                     'observacion'  => $data['obs']];

            return Interacciones::update("t_reservas",$datos,"id_reserva=".$data['id_reserva']);

        }

        public function fullCalendar($id_usuario) {

            $solicitado='a.id_reserva as id, a.titulo as title,
                a.fecha_inicio as start,
                a.fecha_fin as end,
                h.color AS backgroundColor';
            $tabla='t_reservas a 
                INNER JOIN t_habitaciones h ON h.id=a.id_depto';
            $filtro="a.id_usuario =$id_usuario";

            return json_encode(Interacciones::consultar($tabla, $solicitado, $filtro));
        }

        public function retornarDisponibles($ingreso,$egreso){

            $solicitado='h.*';
            $tabla=" t_habitaciones h
                LEFT JOIN t_reservas r 
                    ON h.id = r.id_depto
                    AND r.baja IS NULL
                    AND (
                        (r.fecha_inicio BETWEEN '$ingreso 14:00:00' AND '$egreso 10:00:00') OR
                        (r.fecha_fin BETWEEN '$ingreso 14:00:00' AND '$egreso 10:00:00') OR
                        ('$ingreso 14:00:00' BETWEEN r.fecha_inicio AND r.fecha_fin) OR
                        ('$egreso 10:00:00' BETWEEN r.fecha_inicio AND r.fecha_fin)
                    )";
            $filtro=" h.baja IS NULL
            AND r.id_reserva IS NULL";

            return json_encode(Interacciones::consultar($tabla, $solicitado, $filtro));

        }
        
    }
