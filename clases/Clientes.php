<?php
    include_once "Conexion.php";

    class Clientes extends Interacciones {

        public function mostrarClientes($id_usuario) {

            return Interacciones::consultar("t_clientes","*","1=1");

        }

        public function agregarCliente($data) {
            
            $data = ["apellido" =>$data['apellido'],
                     "nombre"   =>$data['nombre'],
                     "dni"      =>$data['dni'],
                     "direccion"=>$data['direccion'],
                     "tel"      =>$data['tel'],
                     "tel_alternativo"=>$data['tel_alternativo'], 
                     "correo"   =>$data['correo'], 
                     "fechaNac" =>$data['fechaNac']];
                                            
            return Interacciones::insert("t_clientes", $data);
        }

        
        public function eliminarCliente($id_cliente) {

            return Interacciones::delete("t_clientes","id_cliente =".$id_cliente);

        }

        public function editarCliente($id_cliente) {
            return Interacciones::consultar("t_clientes","*","id_cliente =".$id_cliente);
        }

        public function actualizarCliente($data){

            $datos = ["apellido" =>$data['apellido'],
                     "nombre"   =>$data['nombre'],
                     "dni"      =>$data['dni'],
                     "direccion"=>$data['direccion'],
                     "tel"      =>$data['tel'],
                     "tel_alternativo"=>$data['tel_alternativo'], 
                     "correo"   =>$data['correo'], 
                     "fechaNac" =>$data['fechaNac']];

            return Interacciones::update("t_clientes",$datos,"id_cliente =".$data['id_cliente']);

        }
    }
