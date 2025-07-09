<?php
    include_once "Conexion.php";

    class Propietarios extends Interacciones {

        public function mostrarPropietarios() {

            return Interacciones::consultar("t_propietarios","*","1=1");

        }

        public function agregarPropietario($data) {

            $data = [   "descripcion"    => $data['descripcion'],
                        "correo"     => $data['correo']];
                                            
            return Interacciones::insert("t_propietarios", $data);
        }

        public function eliminarPropietario($id_propietario) {

            return Interacciones::delete("t_propietarios","id_propietario=".$id_propietario);

        }

        public function editarPropietario($id_propietario) {

            return Interacciones::consultar("t_propietarios","*","id_propietario=".$id_propietario);

        }

        public function actualizarPropietario($data){
            
            $datos=[      'descripcion'   => $data['descripcion'],
                          'correo'  => $data['correo']];

            return Interacciones::update("t_propietarios",$datos,"id_propietario=".$data['id_propietario']);
        }
    }
