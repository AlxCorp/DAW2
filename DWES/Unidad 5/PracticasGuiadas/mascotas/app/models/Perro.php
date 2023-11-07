<?php 
namespace App\Models;
class Perro {

    private $_color;
    private $_nombre;
    private $_habilidad;
    private $_sociabilidad;

    public function __construct($nombre, $color) {
        $this->_color = $color;
        $this->_nombre = $nombre;
        $this->_habilidad = 0;
        $this->_sociabilidad = 0;
    }

    public function entrenar() {
        echo("Entrenar");
        if ($this->_habilidad <= 100) {
            $this->_habilidad++;
        }
    }

    public function darPata() {
        $return = "No da";
        if ($this->_habilidad > 5) {
            $return = "Da la pata";
        }
        return $return;
    }


}
?>