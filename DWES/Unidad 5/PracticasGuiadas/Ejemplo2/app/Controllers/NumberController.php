<?php 
namespace App\Controllers;

class NumberController extends BaseController {
    public function NumberAction($request) {
        $urlDecode = explode("/", $request);
        $numeros = [];

        for ($n = 2; $n < ($urlDecode[2]*2)+1; $n+=2) {
            array_push($numeros, $n);
        }

        $data = [
            "message" => "Listado Números",
            "numeros" => $numeros
        ];
                
        $this->renderHTML("../app/Views/number_view.php", $data);
    }
}
?>