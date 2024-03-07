<?php 
namespace Alx\Portfoliapp\Controllers;
use Alx\Portfoliapp\Models\User;

class SearchController extends Controller {
    public function view() {
        return $this->loadView('searchView');
    }

    public function searchForm() {
        if (isset($_POST['search'])) {
            $userModel = new User();
            $searched = $userModel->searchPortfolios($_POST['search']);
            return $this->loadView('searchFormView', ["searched" => $searched]);
        }
    }
}
?>

