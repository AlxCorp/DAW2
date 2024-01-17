<?php 

class Users extends DBAbstractModel {

    private static $instancia;
    
    public static function getInstancia()
    {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }

    public function __clone()
    {
        trigger_error("La clonación no está permitida.", E_USER_ERROR);
    }

    public function login($user, $password) {
        $this->query = "SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password";
        $this->parametros['usuario'] = $user;
        $this->parametros['password'] = $password;

        $this->getResultsFromQuery();
    }
}
?>