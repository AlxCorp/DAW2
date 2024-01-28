<?php 
namespace Alx\ContactosCrud\Models;

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
        } catch (\mysqli_sql_exception $e) {
            return 'Error MYSQL: '.$e;
        }

        return $this;
    }

    public function first() {
        return $this->query->fetch_assoc();
    }


    // Reusable Functions

    public function userIsValid($user, $password) {
        $this->query("SELECT * FROM usuarios WHERE usuario='{$user}'");
        
        
        $response = $this->first();
        
        if (is_null($response)) {
            return('ERROR: Usuario no válido');
        }

        if ($response['password'] != $password) {
            return('ERROR: Contraseña no válida');
        }

        return ($response['id']);
    }
}
?>