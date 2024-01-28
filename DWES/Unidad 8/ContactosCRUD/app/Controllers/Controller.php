<?php 

namespace Alx\ContactosCrud\Controllers;

class Controller {
    public function loadView($route, $data = []) {

        extract($data);

        $route = str_replace('.', '/', $route);

        if (file_exists("../app/views/{$route}.php")) {
            ob_start();
            include "../app/views/{$route}.php";
            $content = ob_get_clean();
            
            return $content;
        } else {
            return 'El fichero no existe';
        }
    }
}
?>