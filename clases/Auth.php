<?php 
    include_once "Conexion.php";

    class Auth extends Interacciones {
        public function registrar($usuario, $password):bool {
            if ($this->usuarioExiste($usuario)) {
                return false;
            }
            return false;//NO QUIERO QUE SE REGISTRE MAS NADIE
            $data = [
                'usuario' => $usuario,
                'password' => $password
            ];
            
            return $this->insert('t_usuarios', $data);
        }

        public function logear(string $usuario,string $password): bool {
            $password_usuario = "";
            $respuesta = Interacciones::consultar("t_usuarios","*","usuario = '$usuario'");
            
            if (count($respuesta) > 0) {
                foreach($respuesta as $resp){
                    $password_usuario = $resp['password'];
                    
                    if (password_verify($password, $password_usuario)) {
                        $_SESSION['usuario'] = $usuario;
                        $_SESSION['id_usuario'] = $resp['id_usuario'];
                        return true;
                    }
                }
            }
            return false;
            
        }
        
        public function usuarioExiste(string $usuario): bool {
            $sql = "SELECT COUNT(*) FROM t_usuarios WHERE usuario = :usuario";
            $stmt = $this->getConexion()->prepare($sql);
            $stmt->bindValue(':usuario', $usuario);
            $stmt->execute();
            $count = $stmt->fetchColumn();
            return $count > 0;
        }
    }

?>