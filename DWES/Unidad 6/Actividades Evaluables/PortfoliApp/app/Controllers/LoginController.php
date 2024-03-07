<?php 
namespace Alx\Portfoliapp\Controllers;

use Alx\Portfoliapp\Models\User;

class LoginController extends Controller{
    public function view() {
        session_start();

        if (isset($_SESSION['userId'])) {
            $userModel = new User();
            $firstTime = $userModel->firstTime($_SESSION['userId']);

            if ($firstTime) {
                return $this->loadView('firstTimeView', ['name' => $userModel->getName($_SESSION['userId'])]);
            } else {
                return header('Location: http://portfoliapp.com/dashboard');
            }
        }
        return $this->loadView('loginView');
    }

    public function login() {
        if (!isset($_POST['email']) || !isset($_POST['password'])) {
            session_start();
            if (isset($_FILES['image']) && isset($_POST['categoria_prof']) && isset($_POST['summary']) && isset($_SESSION['userId'])) {
                $userId = $_SESSION['userId'];
                $image = $_FILES['image'];
                $categoriaProf = $_POST['categoria_prof'];
                $summary = $_POST['summary'];
                echo $this->firstTimeFormProcess($userId, $image, $categoriaProf, $summary);
            }
            return header('Location: http://portfoliapp.com/login');
        } 

        $userModel = new User();

        $email = $_POST['email'];
        $password = $_POST['password'];

        $isValid = $this->validateUser($userModel, $email);
        
        if ($isValid) {
            $userId = $isValid;
            if ($userModel->isActive($userId) == 1) {
                $passwordIsValid = $this->validatePassword($userModel, $userId, $password);

                if ($passwordIsValid) {
                    session_start();
                    $_SESSION['userId'] = $userId;
                } else {
                    return $this->loadView('loginView', ["error" => "Contraseña incorrecta", "errorColor"=>"red"]);
                 }
            } else {
                return $this->loadView('loginView', ["error" => "Debes activar tu cuenta, por favor, revisa tu correo.", "errorColor"=>"yellow"]);
              }
        } else {
            return $this->loadView('loginView', ["error" => "Usuario incorrecto", "errorColor"=>"red"]);
          }

        return header('Location: http://portfoliapp.com/login');
    }

    // Login Functions

    private function validateUser($userModel, $email) {
        return $userModel->userExistFromEmail($email);
    }

    private function validatePassword($userModel, $userId, $password) {
        $encryptedPassword = $userModel->validatePassword($userId, $password);
        
        return password_verify($password, $encryptedPassword);
    }

    // Logout Functions

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        return header('Location: http://portfoliapp.com');
    }

    // First-Time Functions

    private function firstTimeFormProcess($userId, $image, $categoriaProf, $summary) {
        $userModel = new User();

        // IMG Process
        $email = $userModel->getMailFromId($userId);
        $imgName = $this->validateUploadImg($image, $email);
        $userModel->insertProfileImg($userId, $imgName);

        // Text Process
        $userModel->insertCategoriaProf($userId, $categoriaProf);
        $userModel->insertSummary($userId, $summary);

        // Make Visible
        $userModel->makeProfileVisible($userId);

        // Update Edit Date
        $editDate = date('Y-m-d H:i:s');
        $userModel->modifyEditDate($userId, $editDate);

    }

    private function validateUploadImg($image, $email) {
        //$imgName = $image['name'];
        $imgName = urlencode($email); // URLENCODE nombre archivo
        $imgName = preg_replace('/[^\w\s.-]/', '', $imgName); // Quitamos caracteres no compatibles con sistema de archivos
        $imgType = $image['type'];
        $imgSize = $image['size'];
        $imgTmpName = $image['tmp_name'];
        $destinationFolder = 'uploads/img/';
        
        $allowedTypes = ['image/jpg', 'image/png', 'image/jpeg', 'image/gif'];
        if (!in_array($imgType, $allowedTypes)) {
            return 'FORMATOINVALIDO';
        }
        
        if ($imgSize > 5242880) {
            return 'TAMANOINVALIDO';
        }
        
        $imgName = $imgName.str_replace("image/", ".", $imgType); // Agregamos Extensión
        //$imgName = str_replace(" ", "", $imgName);

        move_uploaded_file($imgTmpName, $destinationFolder.$imgName);


        // Hacerla cuadrada

        ////list($anchoOriginal, $altoOriginal) = getimagesize($imagenOriginal);
        ////$tamanoCuadrado = min($anchoOriginal, $altoOriginal);
        // if ($imgType == 'image/jpg') {
        //     $imagenOriginal = imagecreatefromjpg($imgTmpName);
        // } else if ($imgType == 'image/jpeg') {
        //     $imagenOriginal = imagecreatefromjpeg($imgTmpName);
        // } else if ($imgType == 'image/png') {
        //     $imagenOriginal = imagecreatefrompng($imgTmpName);
        // } else if ($imgType == 'image/gif') {
        //     $imagenOriginal = imagecreatefromgif($imgTmpName);
        // }
        // $imagenCuadrada = imagecropauto($imagenOriginal, IMG_CROP_WHITE);
        // imagejpeg($imagenCuadrada, $destinationFolder.$imgName);

        // // Liberar memoria
        // imagedestroy($imagenOriginal);
        // imagedestroy($imagenCuadrada);
        
        return $imgName;
    }
}
