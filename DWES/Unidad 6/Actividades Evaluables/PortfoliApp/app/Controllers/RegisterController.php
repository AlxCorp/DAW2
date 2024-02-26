<?php 
namespace Alx\Portfoliapp\Controllers;

use Alx\Portfoliapp\Models\User;
use Alx\Portfoliapp\Entities\EmailSender;

class RegisterController extends Controller{
    public function view() {
        return $this->loadView('registerView');
    }

    public function validateView($token) {
        $userModel = new User();
        extract($this->validateToken($userModel, $token));
        if ($isValid === true) {
            $userModel->activateAccount($userId);
            session_start();
            $_SESSION['userId'] = $userId;
            return $this->loadView('validateView');
        } else {
            return $this->loadView('validateViewError', ['error' => $isValid]);
        }
    }

    public function form() {
        try {
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
        } catch (\Exception $e) {
            echo 'Error: '.$e->getMessage();
            exit(1);
        }

        $data = [
            'name' => $name, 
            'surname' => $surname, 
            'email' => $email, 
            'password' => $this->encryptPassword($password)
        ];

        $this->testData($data);

        $data['token'] = $this->createToken();
        $data['token_creation_date'] = date('Y-m-d H:i:s');


        $userModel = new User();

        $userModel->register($data);
        if ($userModel->error) {
            return $this->loadView('registerView', ["error" => "Este email ya está registrado, por favor, vuelve a intentarlo."]);
        }

        $emailSender = new EmailSender();

        try {
            $emailSender->sendConfirmationMail($data['name'], $data['surname'], $data['email'], $data['token']);
        } catch (\Symfony\Component\Mailer\Exception\TransportException $e) {
            return $this->loadView('registerView', ["error" => "Ha ocurrido un error con el mail, por favor, vuelve a intentarlo."]);
        } 
        
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

    private function validateToken($userModel, $token) {
        $response = $userModel->getTokenCreationDate($token);

        // TOKEN EXISTE
        if ($response != NULL) {
            $userId = $response['id'];
            $tokenDate = $response['token_creation_date'];
            $date = time();
            $expireDate = strtotime($tokenDate."+ 1 days");

            // TOKEN VÁLIDO O EXPIRADO
            $isValid = $date < $expireDate ? true : 'EXPIRADO';

            // CUENTA YA ACTIVADA
            if ($userModel->isActivated($userId)) {
                $isValid = 'ACTIVADA';
            }
        } else {
            $isValid = 'NOEXISTE';
        }

        return [
            'isValid' => $isValid,
            'userId' => isset($userId) ? $userId : "",
        ];
    }
}
?>

