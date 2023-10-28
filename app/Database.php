<?php
namespace App;
use PDO;
use PDOException;

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "music_db";
    public $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function selectDatabase($table, $column, $value) {
        $db = new Database();
        $stmt = $db->conn->prepare("SELECT * FROM {$table} WHERE {$column} = ?");
        $stmt->execute([$value]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public static function selectDatabaseEx($table, $columns, $values, $operation) {
        $db = new Database();
        $placeholders = implode(" $operation ", array_fill(0, count($columns), '?'));
        $query = "SELECT * FROM {$table} WHERE " . implode(" $operation ", $columns);
        $stmt = $db->conn->prepare($query);
        $stmt->execute($values);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
}
?>
