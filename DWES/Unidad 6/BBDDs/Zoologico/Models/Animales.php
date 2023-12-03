<?php 
require_once('DBAbstractModel.php');

class Animal extends DBAbstractModel {
    private static $instancia;
    public static function getInstancia() {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }

    public function __clone() {
        trigger_error('La clonación no está permitida!', E_USER_ERROR);
    }

    private $id;
    private $nombre;
    private $imagen;
    private $created_at;
    private $updated_at;

    public function setNombre($nombre) {
        $this -> nombre = $nombre;
    }

    public function setImagen($imagen) {
        $this -> imagen = $imagen;
    }

    public function getMensaje() {
        return $this -> mensaje;
    }

    
}
?>