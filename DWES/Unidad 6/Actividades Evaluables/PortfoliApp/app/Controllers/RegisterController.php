<?php 
namespace Alx\Portfoliapp\Controllers;

use Alx\Portfoliapp\Models\User;
use Alx\Portfoliapp\Entities\EmailSender;

class RegisterController extends Controller{
    public function view() {
        return $this->loadView('registerView');
    }

    public function validateView($token) {
        // TODO: Validar Token

        return $this->loadView('validateView');
    }

    public function form() {
        try {
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
        } catch (Exception $e) {
            echo 'Error: '.  $e->getMessage();
            exit(1);
        }

        $data = [
            'name' => $name, 
            'surname' => $surname, 
            'email' => $email, 
            'password' => $this->encryptPassword($password)
        ];

        $this->testData($data);

        $data['created_at'] = date('Y-m-d H:i:s');
        $data['token'] = $this->createToken();
        $data['token_creation_date'] = date('Y-m-d H:i:s');


        $userModel = new User();

        try {
            $userModel->register($data);
        } catch (Exception $e) {
            echo 'Error: '.  $e->getMessage();
            exit(1);
        }

        $emailSender = new EmailSender();
        $emailSender->sendConfirmationMail($data['name'], $data['surname'], $data['email'], $data['token']);
        
        return $this->loadView('registeredView', [
            'name' => $name, 
            'surname' => $surname, 
            'email' => $email,
        ]);
    }

    private function encryptPassword($password) {
        $cryptPassword = password_hash($password, PASSWORD_BCRYPT);
        return $cryptPassword;
    }

    private function testData($data) {
        return;
    }

    private function createToken() {
        $rb = random_bytes(32);
        $token = base64_encode($rb);
        $secureToken = uniqid('', true).$token;
        return $secureToken;
    }
}
?>

