<?php 
namespace Alx\Portfoliapp\Controllers;

use Alx\Portfoliapp\Models\User;

class DashboardController extends Controller{
    public function view() {
        session_start();

        if (isset($_SESSION['userId'])) {
            $userId = $_SESSION['userId'];

            $userModel = new User();
            $userName = $userModel->getName($userId);
            $profileImg = $userModel->getProfileImg($userId);
            $jobs = $this->getJobs($userModel, $userId);
            $projects = $this->getProjects($userModel, $userId);
            $socialNetworks = $this->getSocialNetworks($userModel, $userId);
            $skills = $this->getSkills($userModel, $userId);

            return $this->loadView('dashboardView', [
                'userName' => $userName,
                'profileImg' => $profileImg,
                'jobs' => $jobs,
                'projects' => $projects,
                'socialNetworks' => $socialNetworks,
                'skills' => $skills,
            ]);
        }
        return header('Location: http://portfoliapp.com/login');
    }

    public function getJobs($userModel, $userId) {
        $jobs = $userModel->getJobs($userId);
        return($jobs);
    }

    public function getProjects($userModel, $userId) {
        $projects = $userModel->getProjects($userId);
        return($projects);
    }

    public function getSocialNetworks($userModel, $userId) {
        $socialNetworks = $userModel->getSocialNetworks($userId);
        return($socialNetworks);
    }

    public function getSkills($userModel, $userId) {
        $skills = $userModel->getSkills($userId);
        return($skills);
    }
}
?>
