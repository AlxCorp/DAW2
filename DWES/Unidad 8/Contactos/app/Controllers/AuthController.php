<?php 
namespace Alx\Contactos\Controllers;

use \Firebase\JWT\JWT;
use \Firebase\JWT\key;
use Alx\Contactos\Users;

class AuthController {
    private $requestMethod;
    private $userId;
    private $users;

    public function __construct($requestMethod) {
        $this->requestMethod = $requestMethod;
        $this->users = Users::getInstancia();
    }

    public function loginFromRequest() {
        $input = (array) json_decode(file_get_contents('php://input', TRUE));

        $usuario = $input['usuario'];
        $password = $input['password'];
        $dataUser = $this->users->login($usuario, $password);
        if ($dataUser) {
            $key = KEY;
            $issuer_claim = "http://contactos.local";
            $audience_claim = "http://contactos.local";
            $issuedat_claim = time();
            $notbefore_claim = time();
            $expire_claim = $issuedat_claim + 3600;
            $token = [
                "iss" => $issuer_claim,
                "aud" => $audience_claim,
                "iat" => $issuedat_claim,
                "nbf" => $notbefore_claim,
                "exp" => $expire_claim,
                "data" => [
                    "usuario" => $usuario
                ],
            ];

            $jwt = JWT::encode($token, KEY, 'HS256');
            $res = json_encode([
                "message" => "Login correcto",
                "jwt" => $jwt,
                "email" => $usuario,
                "expireAt" => $expire_claim,
            ]);

            $response['status_code_header'] = 'HTTP/1.1 201 Created';
            $response['body'] = $res;
        } else {
            $response['status_code_header'] = 'HTTP/1.1 401 Login failed';
            $response['body'] = null;
        }

        header($response['status_code_header']);
        if ($response['body']) {
            echo $response['body'];
        }
    }
}
?>