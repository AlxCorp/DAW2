<?php 
abstract class DBAbstractModel {
    private static $db_host = DBHOST;
    private static $db_user = DBUSER;
    private static $db_pass = DBPASS;
    private static $db_name = DBNAME;
    private static $db_port = DBPORT;

    protected $mensaje = "";
    protected $conn; // Manejador BBDD

    // Manejo básico consultas
    protected $query;
    protected $parametros = [];
    protected $rows = [];

    // Métodos abstractos para implementar en diferentes módulos
    abstract protected function create();  // Post
    abstract protected function read();  // Get
    abstract protected function update(); // Edit
    abstract protected function delete();   // Delete

    // Conexión a BBDD
    protected function open_connection() {
        $dsn='mysql:host='.self::$db_host.';'
            .'db_name='.self::$db_name.';'
            .'port='.self::$db_port;

        try {
            $this -> conn = new PDO($dsn, self::$db_user, self::$db_pass, [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
            return $this -> conn;
        } catch (PDOExceptiokn $e) {
            printf("Conexión fallida: %s\n", $e -> getMessage());
            exit();
        }
    }

    // Método para devolver último ID introducido
    public function lastInsert() {
        return $this -> conn -> lastInsertId();
    } 

    // Traer resultados consulta en un Array
    // Devuelve tuplas de la tabla
    protected function get_results_from_query() {
        $this->open_connection();
        if (($_stmt = $this->conn->prepare($this->query))) {
            #PREG_PATTERN_ORDER flag para especificar como se cargan los resultados en $named.
            if (preg_match_all('/(:\w+)/', $this->query, $_named, PREG_PATTERN_ORDER)) {
                $_named = array_pop($_named);
                foreach ($_named as $_param) {
                    $_stmt->bindValue($_param, $this->parametros[substr($_param, 1)]);
                }
            }
        
        try {
            if (! $_stmt->execute()) {
                printf("Error de consulta: %s\n", $_stmt->errorInfo()[2]);
            }
            $this->rows = $_stmt->fetchAll(PDO::FETCH_ASSOC);
            $_stmt->closeCursor();
        } catch(PDOException $e){
            printf("Error en consulta: %s\n" , $e->getMessage());
            }
        }
    }
}
?>