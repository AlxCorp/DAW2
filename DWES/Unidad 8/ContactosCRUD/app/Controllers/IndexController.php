<?php 
namespace Alx\ContactosCrud\Controllers;

class IndexController extends Controller{
    public function view() {
        return $this->loadView('indexView');
    }
}
?>

