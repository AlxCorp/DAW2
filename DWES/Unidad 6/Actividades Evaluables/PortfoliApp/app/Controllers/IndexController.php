<?php 
namespace Alx\Portfoliapp\Controllers;
use Alx\Portfoliapp\Models\User;

class IndexController extends Controller{
    public function view() {
        session_start();
        $userModel = new User();

        $portfolios = $userModel->getLastPortfolios();
        
        return $this->loadView('indexView', ["portfolios" => $portfolios]);
    }
}
?>

