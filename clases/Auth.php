<?php 
    include "Conexion.php";

    class Auth extends Interacciones {
        public function registrar($usuario, $password) {
            $conexion = parent::conectar();
            $sql = "INSERT INTO t_usuarios (usuario, password) 
                    VALUES (?,?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('ss', $usuario, $password);
            return $query->execute();
        }

        public function logear(string $usuario,string $password): bool {
            $data_usuario = $password_usuario = "";
            $respuesta = Interacciones::consultar("t_usuarios","*","usuario = '$usuario'");
            print_r($respuesta);
            if (count($respuesta) > 0) {
                foreach($respuesta as $resp){
                    $password_usuario = $resp['password'];
                    
                    if (password_verify($password, $password_usuario)) {
                    //if ($password == $password_usuario) {
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