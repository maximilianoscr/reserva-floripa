<?php
class Conexion {

    private $servidor, $usuario, $password, $database, $port;
    private $conn;

    public function __construct()
    {
        $this->servidor = 'localhost'; //local
        $this->usuario = 'root';
        $this->password = '';
        //$this->database = 'c2731026_floripa';
        $this->database = 'floripa';
        $this->port = 3306;

        try {
            $dsn = "mysql:host={$this->servidor};dbname={$this->database};port={$this->port}";
            $this->conn = new PDO($dsn, $this->usuario, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Conexión fallida: " . $e->getMessage());
        }
    }

    protected function getConexion() { return $this->conn; }

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

    public function consultar($tabla, $consulto, $condicion = false)
    {
        $sql = "SELECT $consulto FROM $tabla";
        if($condicion !== false) $sql .= " WHERE $condicion";
        $stmt = $this->getConexion()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert(string $table, array $data): bool {
        $fields = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        
        $sql = "INSERT INTO $table ($fields) VALUES ($placeholders)";
        
        $stmt = $this->getConexion()->prepare($sql);
        
        foreach ($data as $key => $val) {
            $stmt->bindValue(":$key", $val);
        }
        
        if ($stmt->execute()) {
            return true;
        } else {
            parent::logStdout("Error en la ejecución de la declaración: " . implode(", ", $stmt->errorInfo()));
            return false;
        }
    }

    public function update($table, $data, $where): bool {
        $fields = "";
        foreach ($data as $key => $val) {
            $fields .= "$key = :$key, ";
        }
        $fields = rtrim($fields, ", ");
        
        $sql = "UPDATE $table SET $fields WHERE $where";

        $stmt = $this->getConexion()->prepare($sql);
        
        foreach ($data as $key => $val) {
            $stmt->bindValue(":$key", $val);
        }
        
        if ($stmt->execute()) {
            return true;
        } else {
            parent::logStdout("Error en la ejecución de la declaración: " . implode(", ", $stmt->errorInfo()));
            return false;
        }
    }

    public function delete($table, $where): bool {
        $sql = "DELETE FROM $table WHERE $where";
        
        $stmt = $this->getConexion()->prepare($sql);
        
        if ($stmt->execute()) {
            return true;
        } else {
            parent::logStdout("Error en la ejecución de la declaración: " . implode(", ", $stmt->errorInfo()));
            return false;
        }
    }
}
?>
