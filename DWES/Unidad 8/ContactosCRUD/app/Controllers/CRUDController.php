<?php 
namespace Alx\ContactosCrud\Controllers;
use Alx\ContactosCrud\Models\Contact;

class CRUDController extends Controller{

    function __construct() {
        $this->contactModel = new Contact();
    }

    public function getAllView() {
        $contacts = $this->contactModel->getContacts();
        return $this->loadView('allContactsView', ["contactos" => $contacts]);
    }

    public function getView($id) {
        $contact = $this->contactModel->getContact($id);
        return $this->loadView('contactView', ["contacto" => $contact]);
    }

    public function addView() {
        if ($_SESSION['loginId'] == 'guest') {
            return header('Location: http://contactoscrud.local/login');
        }
        return $this->loadView('addView');
    }

    public function editView($id) {
        if ($_SESSION['loginId'] == 'guest') {
            return header('Location: http://contactoscrud.local/login');
        }
        $contact = $this->contactModel->getContact($id);
        return $this->loadView('editView', ["contacto" => $contact]);
    }

    // ----------------------------------------

    public function add() {
        if ($_SESSION['loginId'] == 'guest') {
            return header('Location: http://contactoscrud.local/login');
        }

        if (($_POST['name'] != "") && ($_POST['tel'] != "") && ($_POST['email'] != "")) {
            $data = [];
            $data['nombre'] = $_POST['name'];
            $data['telefono'] = $_POST['tel'];
            $data['email'] = $_POST['email'];

            $this->contactModel->addContact($data);
        }

        return header('Location: http://contactoscrud.local/get');
    }

    public function update() {
        if ($_SESSION['loginId'] == 'guest') {
            return header('Location: http://contactoscrud.local/login');
        }

        if (($_POST['id'] != "") && ($_POST['name'] != "") && ($_POST['tel'] != "") && ($_POST['email'] != "")) {
            $data = [];
            $data['nombre'] = $_POST['name'];
            $data['telefono'] = $_POST['tel'];
            $data['email'] = $_POST['email'];

            $this->contactModel->updateContact($data, $_POST['id']);
        }

        return header('Location: http://contactoscrud.local/get/'.$_POST['id']);
    }

    public function delete($id) {
        if ($_SESSION['loginId'] == 'guest') {
            return header('Location: http://contactoscrud.local/login');
        }
        
        $this->contactModel->deleteContact($id);

        return header('Location: http://contactoscrud.local/');
    }
}
?>
