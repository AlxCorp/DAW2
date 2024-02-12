<?php 
namespace Alx\ContactosCrud\Controllers;
use Alx\ContactosCrud\Models\User;

class LoginController extends Controller{
    private $userModel;

    public function login() {
        return $this->loadView('loginView');
    }

    public function loginProcess() {
        $error = "";
        $this->userModel = new User();

        $userId = $this->userModel->userIsValid($_POST['usuario'], $_POST['password']);

        if (is_numeric($userId)) {
            $_SESSION['loginId'] = $userId;
        } else {
            $error = $userId;
            return $this->loadView('loginView', ['error' => $error]);
        }
        return header('Location: http://contactoscrud.local/');
    }

    public function logout() {
        session_unset();
        session_destroy();
        return header('Location: http://contactoscrud.local/');
    }

}
?>

