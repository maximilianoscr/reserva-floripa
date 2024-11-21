<?php
    class Conexion {
        public $servidor = 'sql103.infinityfree.com';
        public $usuario = 'if0_37759234';
        public $password = 'thr8TxXIiqky2zt';
        public $database = 'if0_37759234_floripa';
        //public $database = 'floripa';
        public $port = 3306;

        public function conectar() {
            return mysqli_connect(
                $this->servidor,
                $this->usuario,
                $this->password,
                $this->database,
                $this->port
            );
        }
    }

?>