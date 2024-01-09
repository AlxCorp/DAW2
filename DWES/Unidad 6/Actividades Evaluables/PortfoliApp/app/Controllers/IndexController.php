<?php 
namespace Alx\Portfoliapp\Controllers;

class IndexController extends Controller{
    public function view() {
        session_start();
        return $this->loadView('indexView');
    }
}
?>

