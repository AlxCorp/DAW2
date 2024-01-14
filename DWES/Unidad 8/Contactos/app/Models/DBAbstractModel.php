<?php

namespace Alx\Contactos\Models;
use PDO;
use PDOException;

abstract class DBAbstractModel {
    private static $db_host = 'localhost';
    private static $db_user = 'root';
    private static $db_pass = 'root';
    private static $db_name = 'Contactos';
    private static $db_port = '3306';

    protected $message = "";
    protected $conn; // Manejador de la BD

    // Manejo Basicos para consultas
    protected $query; // Consulta
    protected $parametros = array(); // Parametros de la entrada de la consulta
    protected $rows = array(); //array con los datos de salida de la consulta

    // Metodos abstractos para implementer en los diferentes modulos
    //abstract protected function get();
    abstract protected function set();
    //abstract protected function edit();
    //abstract protected function delete();

    // Metodos privados para manejo de la conexion
    private function open_connection()
    {
        try {
            $dsn = "mysql:host=" . self::$db_host . ";dbname=" . self::$db_name . ";port=" . self::$db_port;
            $this->conn = new PDO($dsn, self::$db_user, self::$db_pass);
            $this->conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, TRUE);
            $this->conn->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'");
            return $this->conn;
        } catch (PDOException $e) {
            $this->message = $e->getMessage();
            exit();
        }
    }
    // Metodo que devuelve el ultimo id insertado
    protected function lastInsert()
    {
        return $this->conn->lastInsertId();
    }
    // Metodo que cierra la conexion
    private function close_connection()
    {
        $this->conn = null;
    }
    protected function getResultsFromQuery()
    {
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
                if (!$_stmt->execute()) {
                    printf("Error de consulta: %s\n", $_stmt->errorInfo()[2]);
                }

                $this->rows = $_stmt->fetchAll(PDO::FETCH_ASSOC);
                $_stmt->closeCursor();
            } catch (PDOException $e) {
                printf("Error en consulta: %s\n", $e->getMessage());
            }
        }
    }
}
?>