<?php
    include_once "Conexion.php";

    class Departamentos extends Interacciones {

        public function mostrarDepartamentos() {

            return Interacciones::consultar("t_habitaciones","*","1=1");

        }

        public function agregarDepartamento($data) {

            $data = [   "titulo"    => $data['titulo'],
                        "direccion" => $data['direccion'],
                        "altura"    => $data['altura'],
            "cantidad_habitacion"   => $data['cantidad_habitacion'],
                    "descripcion"   => $data['descripcion'],
                        "ubi"       => $data['ubi'],
                        "capacidad" => $data['capacidad'],
                         "precio"   => $data['precio'],
                   'id_propietario' => $data['id_propietario'],
                        "color"     => $data['color']];
                                            
            return Interacciones::insert("t_habitaciones", $data);
        }

        public function eliminarDepartamento($id_departamento) {

            return Interacciones::delete("t_habitaciones","id=".$id_departamento);

        }

        public function editarDepartamento($id_departamento) {

            return Interacciones::consultar("t_habitaciones h 
            INNER JOIN t_propietarios p ON p.id_propietario=h.id_propietario
            ","h.*,p.descripcion","h.id =".$id_departamento);

        }

        public function actualizarDepartamento($data){
            
            $datos=[      'titulo'   => $data['titulo'],
                         'direccion' => $data['direccion'],
                         'altura'    => $data['altura'],
               'cantidad_habitacion' => $data['habitaciones'],
                      'descripcion'  => $data['descripcion'],
                          'ubi'      => $data['ubi'],
                        'capacidad'  => $data['capacidad'],
                            'color'  => $data['color'],
                    'id_propietario' => $data['id_propietario'],
                          'precio'   => $data['precio']];

            return Interacciones::update("t_habitaciones",$datos,"id =".$data['id']);
        }
    }
