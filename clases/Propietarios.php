<?php
    include "Conexion.php";

    class Propietarios extends Interacciones {

        public function mostrarPropietarios() {

            return Interacciones::consultar("t_propietarios","*","1=1");

        }

        public function agregarDepartamento($data) {

            $data = [   "descripcion"    => $data['descripcion'],
                        "correo"     => $data['correo']];
                                            
            return Interacciones::insert("t_propietarios", $data);
        }

        public function eliminarDepartamento($id_departamento) {

            return Interacciones::delete("t_propietarios","id=".$id_departamento);

        }

        public function editarDepartamento($id_departamento) {

            return Interacciones::consultar("t_propietarios","*","id =".$id_departamento);

        }

        public function actualizarDepartamento($data){
            
            $datos=[      'descripcion'   => $data['descripcion'],
                          'correo'  => $data['correo']];

            return Interacciones::update("t_propietarios",$datos,"id =".$data['id']);
        }
    }
