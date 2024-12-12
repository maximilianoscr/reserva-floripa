<?php
class Conexion {

    private $servidor, $usuario, $password, $database, $port;
    private $conn;

    public function __construct()
    {
        // $servidor = 'sql10.freesqldatabase.com';
        // $usuario = 'sql10746493';
        // $password = 'XJahj5jn4W';
        // $database = 'sql10746493';
        $this->servidor = 'localhost'; //testing local
        $this->usuario = 'root';
        $this->password = '';
        $this->database = 'floripa';
        //$this->database = 'floripa';
        $this->port = 3306;

        $this->conn = mysqli_connect( $this->servidor, $this->usuario, $this->password, $this->database, $this->port );
    }

    protected function getConexion() 
    {
        return $this->conn;
    }

    protected function logStdout(mixed $aImprimir, int $file=0, int $ver=1) :bool
    {
        if ($ver == 1) {
            if (is_array($aImprimir)) {
                print_r($aImprimir);
            } elseif ($file == 1) {
                echo $aImprimir . "\n";
            } else {
                echo $aImprimir . "\n\n";
            }
        }
        return true;
    }
}

class Interacciones extends Conexion {

    public function consultar($tabla, $consulto, $condicion)
    {
        $sql = "SELECT $consulto FROM $tabla WHERE $condicion";
        $respuesta = mysqli_query($this->getConexion(), $sql);
        return mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
    }
    
    public function insert(string $table,array $data):bool {
        $fields = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        
        $sql = "INSERT INTO $table ($fields) VALUES ($placeholders)";
        parent::logStdout($sql);
        $stmt = $this->getConexion()->prepare($sql);
        
        foreach ($data as $key => $val) {
            $stmt->bind_param(":$key", $val);
        }
        
        if($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($table, $data, $where) {
        $fields = "";
        foreach ($data as $key => $val) {
            $fields .= "$key = :$key, ";
        }
        $fields = rtrim($fields, ", ");
        
        $sql = "UPDATE $table SET $fields WHERE $where";
        $stmt = $this->getConexion()->prepare($sql);
        
        foreach ($data as $key => $val) {
            $stmt->bind_param(":$key", $val);
        }
        
        if($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($table, $where) {
        $sql = "DELETE FROM $table WHERE $where";
        $stmt = $this->getConexion()->prepare($sql);
        
        if($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>