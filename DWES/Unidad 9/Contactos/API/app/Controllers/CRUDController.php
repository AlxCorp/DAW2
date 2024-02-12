<?php 
namespace Alx\ContactosCrud\Controllers;
use Alx\ContactosCrud\Models\Contact;

class CRUDController extends Controller {
    private $contactModel;
    function __construct() {
        $this->contactModel = new Contact();
    }

    public function getAll() {
        $contacts = $this->contactModel->getContacts();
        return $contacts;
    }

    public function get($id) {
        $contact = $this->contactModel->getContact($id);
        return $contact;
    }

    public function add() {
        if ($_SESSION['loginId'] == 'guest') {
            http_response_code(403);
        }

        if (($_POST['name'] != "") && ($_POST['tel'] != "") && ($_POST['email'] != "")) {
            $data = [];
            $data['nombre'] = $_POST['name'];
            $data['telefono'] = $_POST['tel'];
            $data['email'] = $_POST['email'];

            $this->contactModel->addContact($data);
            http_response_code(201);
        }
        return;
    }

    public function update() {
        if ($_SESSION['loginId'] == 'guest') {
            http_response_code(403);
            return;
        }

        if (($_POST['id'] != "") && ($_POST['name'] != "") && ($_POST['tel'] != "") && ($_POST['email'] != "")) {
            $data = [];
            $data['nombre'] = $_POST['name'];
            $data['telefono'] = $_POST['tel'];
            $data['email'] = $_POST['email'];

            $this->contactModel->updateContact($data, $_POST['id']);
        }
        return;
    }

    public function delete($id) {
        if ($_SESSION['loginId'] == 'guest') {
            http_response_code(403);
            return;
        }
        
        $this->contactModel->deleteContact($id);
        return;
    }
}
?>
