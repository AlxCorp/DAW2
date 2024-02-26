<?php 
namespace Alx\Portfoliapp\Models;

use mysqli;

class User {
    protected $db_host;
    protected $db_name;
    protected $db_user;
    protected $db_password;
    public $error;

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
            $this->error = 'Error MYSQL: '.$e;
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
        $this->query("SELECT id, title, visible, updated_at FROM Jobs WHERE user_id='{$userId}'");
        $response = $this->get();
        return $response;
    }

    public function getProjects($userId) {
        $this->query("SELECT id, title, logo, visible, updated_at FROM Projects WHERE user_id='{$userId}'");
        $response = $this->get();
        return $response;
    }

    public function getSocialNetworks($userId) {
        $this->query("SELECT id, name, url, updated_at FROM Social_Networks WHERE user_id='{$userId}'");
        $response = $this->get();
        return $response;
    }

    public function getSkills($userId) {
        $this->query("SELECT id, name, visible, skill_category, updated_at FROM Skills WHERE user_id='{$userId}'");
        $response = $this->get();
        return $response;
    }

    public function getSkillCategories($userId) {
        $this->query("SELECT id, category, user_id FROM Skill_Categories WHERE user_id='{$userId}'");
        $response = $this->get();
        return $response;
    }

    // Profile Functions

    public function addJob($data) {
        $columns = array_keys($data);
        $columns = implode(', ', $columns);

        $values = array_values($data);
        $values = "'".implode("', '", $values)."'";

        $response = $this->query("INSERT INTO Jobs ({$columns}) VALUES ({$values})");

        if(is_string($response) && !strpos($response, 'Error MYSQL: ')) {
            return "BAD";
        }
        return 'OK';
    }

    public function addProject($data) {
        $columns = array_keys($data);
        $columns = implode(', ', $columns);

        $values = array_values($data);
        $values = "'".implode("', '", $values)."'";

        $response = $this->query("INSERT INTO Projects ({$columns}) VALUES ({$values})");

        if(is_string($response) && !strpos($response, 'Error MYSQL: ')) {
            return "BAD";
        }
        return 'OK';
    }

    public function addSocialNetwork($data) {
        $columns = array_keys($data);
        $columns = implode(', ', $columns);

        $values = array_values($data);
        $values = "'".implode("', '", $values)."'";

        $response = $this->query("INSERT INTO Social_Networks ({$columns}) VALUES ({$values})");

        if(is_string($response) && !strpos($response, 'Error MYSQL: ')) {
            return "BAD";
        }
        return 'OK';
    }

    public function addSkill($data) {
        $columns = array_keys($data);
        $columns = implode(', ', $columns);

        $values = array_values($data);
        $values = "'".implode("', '", $values)."'";

        $response = $this->query("INSERT INTO Skills ({$columns}) VALUES ({$values})");

        if(is_string($response) && !strpos($response, 'Error MYSQL: ')) {
            return "BAD";
        }
        return 'OK';
    }

    public function addSkillCategory($data) {
        $columns = array_keys($data);
        $columns = implode(', ', $columns);

        $values = array_values($data);
        $values = "'".implode("', '", $values)."'";

        $response = $this->query("INSERT INTO Skill_Categories ({$columns}) VALUES ({$values})");

        if(is_string($response) && !strpos($response, 'Error MYSQL: ')) {
            return "BAD";
        }
        return 'OK';
    }

    



    public function getLastPortfolios() {
        $realResponse = [];

        $this->query("SELECT id, name, surname, photo, categoria_profesional FROM Users WHERE visible = 1 ORDER BY created_at LIMIT 6");
        $response = $this->get();

        foreach($response as $id) {
            $tmpId = $id["id"];

            $realResponse[$tmpId]["info"] = [
                "name" => $id["name"], 
                "surname" => $id["surname"], 
                "photo" => $id["photo"], 
                "categoria_profesional" => $id["categoria_profesional"]
            ];

            $this->query("SELECT title, start_date, finish_date FROM Jobs WHERE user_id = $tmpId AND visible = 1 ORDER BY start_date LIMIT 3");
            $realResponse[$tmpId]["jobs"] = $this->get();

            $this->query("SELECT logo, title, technologies FROM Projects WHERE user_id = $tmpId AND visible = 1 AND logo IS NOT NULL ORDER BY updated_at LIMIT 3");
            $realResponse[$tmpId]["projects"] = $this->get();

            $this->query("SELECT name FROM Skills WHERE user_id = $tmpId AND visible = 1 ORDER BY updated_at LIMIT 4");
            $realResponse[$tmpId]["skills"] = $this->get();

            $this->query("SELECT name, url FROM Social_Networks WHERE user_id = $tmpId AND visible = 1 ORDER BY updated_at LIMIT 3");
            $realResponse[$tmpId]["social_networks"] = $this->get();
        }

        return $realResponse;
    }
    
}
?>