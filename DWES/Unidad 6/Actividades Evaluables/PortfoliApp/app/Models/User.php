<?php 
namespace Alx\Portfoliapp\Models;

use mysqli;

class User {
    protected $db_host;
    protected $db_name;
    protected $db_user;
    protected $db_password;

    protected $connection;
    protected $query;

    function __construct() {
        $this->db_host = $_ENV['DB_HOST'];
        $this->db_name = $_ENV['DB_NAME'];
        $this->db_user = $_ENV['DB_USER'];
        $this->db_password = $_ENV['DB_PASSWORD'];

        $this->connection();
    }

    public function connection() {
        $this->connection = new mysqli($this->db_host, $this->db_user, $this->db_password, $this->db_name);

        if($this->connection->connect_error) {
            die('Error de conexión: '.$this->connection->connect_error);
        }
    }

    public function query($query) {
        try {
            $this->query = $this->connection->query($query);
        } catch(Exception $e) {
            echo $e->getMessage();
         }  
        return $this;
    }

    public function first() {
        return $this->query->fetch_assoc();
    }

    public function get() {
        return $this->query->fetch_all(MYSQLI_ASSOC);
    }

    public function register($data) {
        $columns = array_keys($data);
        $columns = implode(', ', $columns);

        $values = array_values($data);
        $values = "'".implode("', '", $values)."'";
        
        $this->query("INSERT INTO Users ({$columns}) VALUES ({$values})");

        return "OK"; 
    }
    
}
?>