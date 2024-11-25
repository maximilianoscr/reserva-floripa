<?php
class Conexion {
    // public $servidor = 'sql10.freesqldatabase.com';
    // public $usuario = 'sql10746493';
    // public $password = 'XJahj5jn4W';
    // public $database = 'sql10746493';
    public $servidor = 'localhost'; //testing local
    public $usuario = 'root';
    public $password = '';
    public $database = 'floripa';
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