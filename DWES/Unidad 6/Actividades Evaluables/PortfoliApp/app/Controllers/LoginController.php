<?php 
namespace Alx\Portfoliapp\Controllers;

class LoginController extends Controller{
    public function view() {
        return $this->loadView('loginView');
    }
}
