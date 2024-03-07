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

    public function isVisible($userId) {
        $this->query("SELECT visible FROM Users WHERE id='{$userId}'");
        $response = $this->first();
        return $response['visible'];
    }

    public function isActive($userId) {
        $this->query("SELECT active_account FROM Users WHERE id='{$userId}'");
        $response = $this->first();
        return $response['active_account'];
    }

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
        $this->query("SELECT id, name, url, updated_at, visible FROM Social_Networks WHERE user_id='{$userId}'");
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

    public function editJob($jobId, $data) {
        $values = "
            title='{$data['title']}',
            description='{$data['description']}',
            start_date='{$data['start_date']}',
            finish_date='{$data['finish_date']}',
            achievements='{$data['achievements']}',
            visible={$data['visible']},
            updated_at='{$data['updated_at']}'
        ";

        $response = $this->query("UPDATE Jobs SET {$values} WHERE id={$jobId}");

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

    public function editProject($projectId, $data) {
        $values = "
            title='{$data['title']}',
            description='{$data['description']}',
            technologies='{$data['technologies']}',
            visible={$data['visible']},
            updated_at='{$data['updated_at']}'
        ";

        $response = $this->query("UPDATE Projects SET {$values} WHERE id={$projectId}");

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

    public function editSocialNetwork($socialNetworkId, $data) {
        $values = "
            name='{$data['name']}',
            url='{$data['url']}',
            visible={$data['visible']},
            updated_at='{$data['updated_at']}'
        ";

        $response = $this->query("UPDATE Social_Networks SET {$values} WHERE id={$socialNetworkId}");

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

    public function editSkill($skillId, $data) {
        $values = "
            name='{$data['name']}',
            visible={$data['visible']},
            updated_at='{$data['updated_at']}'
        ";

        $response = $this->query("UPDATE Skills SET {$values} WHERE id={$skillId}");

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

    public function searchPortfolios($input) {
        $realResponse = [];
        $totalIds = [];

        $this->query("SELECT id FROM Users WHERE visible = 1 AND (name LIKE '%$input%' OR surname LIKE '%$input%') ORDER BY created_at LIMIT 6");
        $return = $this->get();
        foreach($return as $id) {
            array_push($totalIds, $id['id']);
        }

        $this->query("SELECT user_id FROM Jobs WHERE visible = 1 AND (title LIKE '%$input%') ORDER BY updated_at LIMIT 6");
        $return = $this->get();
        foreach($return as $id) {
            array_push($totalIds, $id['user_id']);
        }

        $this->query("SELECT user_id FROM Projects WHERE visible = 1 AND (title LIKE '%$input%' OR technologies LIKE '%$input%') ORDER BY updated_at LIMIT 6");
        $return = $this->get();
        foreach($return as $id) {
            array_push($totalIds, $id['user_id']);
        }

        $this->query("SELECT user_id FROM Skills WHERE visible = 1 AND (name LIKE '%$input%') ORDER BY updated_at LIMIT 6");
        $return = $this->get();
        foreach($return as $id) {
            array_push($totalIds, $id['user_id']);
        }

        $totalIds = array_unique($totalIds);

        foreach($totalIds as $id) {
            $this->query("SELECT id, name, surname, photo, categoria_profesional FROM Users WHERE id = $id");
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
        }

        return $realResponse;        
    }



    public function getJobVisibility($jobId) {
        $this->query("SELECT visible FROM Jobs WHERE id='{$jobId}'");
        $response = $this->first();
        return $response["visible"];
    }

    public function hideJob($jobId) {
        $this->query("UPDATE Jobs SET visible=0 WHERE id={$jobId}");
        return "OK"; 
    }

    public function showJob($jobId) {
        $this->query("UPDATE Jobs SET visible=1 WHERE id={$jobId}");
        return "OK"; 
    }

    public function eraseJob($jobId) {
        $this->query("DELETE FROM Jobs WHERE id={$jobId}");
        return "OK"; 
    }

    public function getJob($jobId) {
        $this->query("SELECT id, title, description, start_date, finish_date, achievements, visible FROM Jobs WHERE id='{$jobId}'");
        $response = $this->first();
        return $response;
    }
    


    public function getProjectVisibility($projectId) {
        $this->query("SELECT visible FROM Projects WHERE id='{$projectId}'");
        $response = $this->first();
        return $response["visible"];
    }

    public function hideProject($projectId) {
        $this->query("UPDATE Projects SET visible=0 WHERE id={$projectId}");
        return "OK"; 
    }

    public function showProject($projectId) {
        $this->query("UPDATE Projects SET visible=1 WHERE id={$projectId}");
        return "OK"; 
    }

    public function eraseProject($projectId) {
        $this->query("DELETE FROM Projects WHERE id={$projectId}");
        return "OK"; 
    }

    public function getProject($projectId) {
        $this->query("SELECT id, title, description, logo, technologies, visible FROM Projects WHERE id='{$projectId}'");
        $response = $this->first();
        return $response;
    }



    public function getSocialNetworkVisibility($socialNetworkId) {
        $this->query("SELECT visible FROM Social_Networks WHERE id='{$socialNetworkId}'");
        $response = $this->first();
        return $response["visible"];
    }

    public function hideSocialNetwork($socialNetworkId) {
        $this->query("UPDATE Social_Networks SET visible=0 WHERE id={$socialNetworkId}");
        return "OK"; 
    }

    public function showSocialNetwork($socialNetworkId) {
        $this->query("UPDATE Social_Networks SET visible=1 WHERE id={$socialNetworkId}");
        return "OK"; 
    }

    public function eraseSocialNetwork($socialNetworkId) {
        $this->query("DELETE FROM Social_Networks WHERE id={$socialNetworkId}");
        return "OK"; 
    }

    public function getSocialNetwork($socialNetworkId) {
        $this->query("SELECT id, name, url, visible FROM Social_Networks WHERE id='{$socialNetworkId}'");
        $response = $this->first();
        return $response;
    }



    public function getSkillVisibility($skillId) {
        $this->query("SELECT visible FROM Skills WHERE id='{$skillId}'");
        $response = $this->first();
        return $response["visible"];
    }

    public function hideSkill($skillId) {
        $this->query("UPDATE Skills SET visible=0 WHERE id={$skillId}");
        return "OK"; 
    }

    public function showSkill($skillId) {
        $this->query("UPDATE Skills SET visible=1 WHERE id={$skillId}");
        return "OK"; 
    }

    public function eraseSkill($skillId) {
        $this->query("DELETE FROM Skills WHERE id={$skillId}");
        return "OK"; 
    }

    public function getSkill($skillId) {
        $this->query("SELECT id, name, visible FROM Skills WHERE id='{$skillId}'");
        $response = $this->first();
        return $response;
    }
}
?>