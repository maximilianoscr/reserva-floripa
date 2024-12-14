<?php 
    include "Conexion.php";

    class Auth extends Interacciones {
        public function registrar($usuario, $password) {
            $data = ["usuario" => $usuario, "password" => $password];
            parent::logStdout($data);
            //return Interacciones::insert('t_usuarios', $data);
        }

        public function logear(string $usuario,string $password): bool {
            $password_usuario = "";
            $respuesta = Interacciones::consultar("t_usuarios","*","usuario = '$usuario'");
            print_r($respuesta);
            if (count($respuesta) > 0) {
                foreach($respuesta as $resp){
                    $password_usuario = $resp['password'];
                    
                    if (password_verify($password, $password_usuario)) {
                        $_SESSION['usuario'] = $usuario;
                        $_SESSION['id_usuario'] = $resp['id_usuario'];
                        return true;
                    } else {
                        return false;
                    }
                }
            } else {
                return false;
            }
        }   
    }

?>