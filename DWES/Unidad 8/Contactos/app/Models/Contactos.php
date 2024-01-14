<?php 
namespace Alx\Contactos\Models;

// No se usa "use" por que comparten espacio de nombres

class Contactos extends DBAbstractModel {
    private static $instance;

    public static function getInstancia() {
        if (!isset(self::$instance)) {
            $myClass = __CLASS__;
            self::$instance = new $myClass;
        }
        return self::$instance;
    }

    public function __clone() {
        trigger_error('La clonación no está permitida!', E_USER_ERROR);
    }

    public function set($data=[]) {

        foreach($data as $campo=>$valor) {
            $$campo = $valor;
        }
        $this->query = "INSERT INTO contactos(nombre, telefono, email) VALUES (:nombre, :telefono, :email)";
        $this->parametros['nombre'] = $nombre;
        $this->parametros['telefono'] = $telefono;
        $this->parametros['email'] = $email;
        $this->getResultsFromQuery();
        //$this->execute_single_query();
        $this->mensaje = 'Contacto agregado exitosamente';
    }

    public function get($id) {

        $this->parametros['id'] = $id;
        $this->getResultsFromQuery();

        if (count())


        $this->query = "INSERT INTO contactos(nombre, telefono, email) VALUES (:nombre, :telefono, :email)";
        $this->parametros['nombre'] = $nombre;
        $this->parametros['telefono'] = $telefono;
        $this->parametros['email'] = $email;
        //$this->execute_single_query();
        $this->mensaje = 'Contacto agregado exitosamente';
    }
}

?>