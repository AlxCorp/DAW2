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
        } catch(\mysqli_sql_exception $e) {
            echo $query;
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

    // Reusable Functions

    public function getName($id) {
        $this->query("SELECT name FROM Users WHERE id='{$id}'");
        $response = $this->first();
        return ($response['name']);
    }

    public function getProfileImg($userId) {
        $this->query("SELECT photo FROM Users WHERE id='{$userId}'");
        $response = $this->first()['photo'];
        return $response;
    }

    // Register Functions

    public function register($data) {
        $columns = array_keys($data);
        $columns = implode(', ', $columns);

        $values = array_values($data);
        $values = "'".implode("', '", $values)."'";
        
        $this->query("INSERT INTO Users ({$columns}) VALUES ({$values})");

        return "OK"; 
    }

    // Validate Account Functions
    
    public function getTokenCreationDate($token) {
        $this->query("SELECT id, token_creation_date FROM Users WHERE token='{$token}'");
        return $this->first();
    }

    public function activateAccount($id) {
        $this->query("UPDATE Users SET active_account=1 WHERE id={$id}");
    }

    public function isActivated($id) {
        $this->query("SELECT active_account FROM Users WHERE id='{$id}'");
        $response = $this->first()['active_account'];
        return $response === "1" ? true : false;
    }

    // Login Account Functions

    public function firstTime($id) {
        $this->query("SELECT created_at, updated_at FROM Users WHERE id='{$id}'");
        $response = $this->first();
        return ($response['created_at'] == $response['updated_at']);
    }

    public function userExistFromEmail($email) {
        $this->query("SELECT id FROM Users WHERE email='{$email}'");
        $response = $this->first();
        return is_null($response['id']) ? false : $response['id'];
    }

    public function validatePassword($userId, $password) {
        $this->query("SELECT password FROM Users WHERE id='{$userId}'");
        $response = $this->first();
        return $response['password'];
    }

    // First Time Form Functions

    public function getMailFromId($userId) {
        $this->query("SELECT email FROM Users WHERE id='{$userId}'");
        $response = $this->first();
        return $response['email'];
    }

    public function insertProfileImg($userId, $imgName) {
        $this->query("UPDATE Users SET photo='{$imgName}' WHERE id={$userId}");
        return "OK"; 
    }

    public function insertCategoriaProf($userId, $categoriaProf) {
        $this->query("UPDATE Users SET categoria_profesional='{$categoriaProf}' WHERE id={$userId}");
        return "OK"; 
    }

    public function insertSummary($userId, $summary) {
        $this->query("UPDATE Users SET profile_summary='{$summary}' WHERE id={$userId}");
        return "OK"; 
    }

    public function makeProfileVisible($userId) {
        $this->query("UPDATE Users SET visible=1 WHERE id={$userId}");
    }

    public function modifyEditDate($userId, $editDate) {
        $this->query("UPDATE Users SET updated_at='{$editDate}' WHERE id={$userId}");
    }

    // Dashboard Functions

    public function getJobs($userId) {
        $this->query("SELECT title, visible, updated_at FROM Jobs WHERE user_id='{$userId}'");
        $response = $this->get();
        return $response;
    }

    public function getProjects($userId) {
        $this->query("SELECT title, logo, visible, updated_at FROM Projects WHERE user_id='{$userId}'");
        $response = $this->get();
        return $response;
    }

    public function getSocialNetworks($userId) {
        $this->query("SELECT name, url, updated_at FROM Social_Networks WHERE user_id='{$userId}'");
        $response = $this->get();
        return $response;
    }

    public function getSkills($userId) {
        $this->query("SELECT skills, visible, skill_category, updated_at FROM Skills WHERE user_id='{$userId}'");
        $response = $this->get();
        return $response;
    }

}
?>