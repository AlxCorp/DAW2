<?php 
namespace Alx\ContactosCrud\Models;

use mysqli;

class Contact {
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

    public function get() {
        if (is_null($this->query)) {
            return NULL;
        }
        return $this->query->fetch_all(MYSQLI_ASSOC);
    }

    // Reusable Functions

    public function getContact($id) {
        $this->query("SELECT * FROM contactos WHERE id='{$id}'");
        $response = $this->first();
        return ($response);
    }

    public function getContacts() {
        $this->query("SELECT * FROM contactos");
        $response = $this->get();
        return ($response);
    }

    public function addContact($data) {
        $columns = array_keys($data);
        $columns = implode(', ', $columns);

        $values = array_values($data);
        $values = "'".implode("', '", $values)."'";

        $response = $this->query("INSERT INTO contactos ({$columns}) VALUES ({$values})");

        if(is_string($response) && !strpos($response, 'Error MYSQL: ')) {
            return $response;
        }
        return 'OK';
    }

    public function updateContact($data, $userId) {
        foreach ($data as $column => $value) {
            $this->query("UPDATE contactos SET {$column}='{$value}' WHERE id={$userId}");
        }

        return "OK"; 
    }

    public function deleteContact($userId) {
        $this->query("DELETE FROM contactos WHERE id = {$userId}");
        return "OK"; 
    }
}
?>