<?php 
namespace Alx\Portfoliapp\Controllers;

class IndexController extends Controller{
    public function view() {
        return $this->loadView('indexView');
    }
}
?>

