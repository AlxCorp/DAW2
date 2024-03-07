<?php 
namespace Alx\Portfoliapp\Controllers;

use Alx\Portfoliapp\Models\User;

class ProfileController extends Controller{
    private $userModel;
    function __construct() {
        session_start();
        if (!isset($_SESSION['userId'])) {
                return header('Location: http://portfoliapp.com/dashboard');
            }

        $this->userModel = new User();
        
    }

    public function addJobView() {
        return $this->loadView('profileAddJobView', ['alert' => false]);
    }

    public function addJobProcess() {
        if (($_POST['title'] != "") && ($_POST['summary'] != "") && ($_POST['start_date'] != "") && ($_POST['visible'] != "")) {
            $data = [];
            $data['title'] = $_POST['title'];
            $data['description'] = $_POST['summary'];
            $data['start_date'] = $_POST['start_date'];
            $data['visible'] = $_POST['visible'];

            ($_POST['finish_date'] != "") ? ($data['finish_date'] = $_POST['finish_date']) : '';
            ($_POST['achievements'] != "") ? ($data['achievements'] = $_POST['achievements']) : '';

            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
            $data['user_id'] = $_SESSION['userId'];

            $return = $this->userModel->addJob($data);

            if ($return == "OK") {
                $error = false;
                $message = 'El trabajo ha sido agregado correctamente';
            } else {
                $error = true;
                $message = 'Ha ocurrido un error. Vuelve a intentarlo.';
            }

        } else {
            $error = true;
            $message = 'ERROR: Faltan campos obligatorios';
        }
        return $this->loadView('profileAddJobView', [
            'alert' => true,
            'error' => $error,
            'message' => $message
            ]);
    }

    public function addProjectView() {
        return $this->loadView('profileAddProjectView', ['alert' => false]);
    }

    public function addProjectProcess() {
        if (($_POST['title'] != "") && ($_POST['description'] != "") && ($_POST['technologies'] != "") && ($_POST['visible'] != "")) {
            $data = [];
            $data['title'] = $_POST['title'];
            $data['description'] = $_POST['description'];
            $data['technologies'] = $_POST['technologies'];
            $data['visible'] = $_POST['visible'];

            $name = str_replace(" ", "", $data['title']);
            $name = $name.$_SESSION['userId'];

            $data['logo'] = (isset($_FILES['logo'])) ? ($this->validateUploadImg($_FILES['logo'], $name)) : NULL; 

            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
            $data['user_id'] = $_SESSION['userId'];

            $return = $this->userModel->addProject($data);

            if ($return == "OK") {
                $error = false;
                $message = 'El proyecto ha sido agregado correctamente';
            } else {
                $error = true;
                $message = 'Ha ocurrido un error. Vuelve a intentarlo.';
            }

        } else {
            $error = true;
            $message = 'ERROR: Faltan campos obligatorios';
        }
        return $this->loadView('profileAddProjectView', [
            'alert' => true,
            'error' => $error,
            'message' => $message
            ]);
    }

    public function addSocialNetworkView() {
        return $this->loadView('profileAddSocialNetworkView', ['alert' => false]);
    }

    public function addSocialNetworkProcess() {
        if (($_POST['name'] != "") && ($_POST['url'] != "") && ($_POST['visible'] != "")) {
            $data = [];
            $data['name'] = $_POST['name'];
            $data['url'] = $_POST['url'];
            $data['visible'] = $_POST['visible'];

            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
            $data['user_id'] = $_SESSION['userId'];

            $return = $this->userModel->addSocialNetwork($data);

            if ($return == "OK") {
                $error = false;
                $message = 'La red social ha sido agregada correctamente';
            } else {
                $error = true;
                $message = 'Ha ocurrido un error. Vuelve a intentarlo.';
            }

        } else {
            $error = true;
            $message = 'ERROR: Faltan campos obligatorios';
        }
        return $this->loadView('profileAddSocialNetworkView', [
            'alert' => true,
            'error' => $error,
            'message' => $message
            ]);
    }

    public function addSkillView() {
        $skillCategoryExist = $this->userModel->getSkillCategories($_SESSION['userId']);

        if ($skillCategoryExist) {
            return $this->loadView('profileAddSkillView', [
                'skillCategories' => $skillCategoryExist
            ]);
        } else {
            return $this->loadView('profileAddSkillCategoryView', [
                'alertColor' => 'yellow',
                'message' => 'Debes crear antes una categoría de skill'
            ]);
        }

    }

    public function addSkillCategoryView() {
        return $this->loadView('profileAddSkillCategoryView', ['alertColor' => false]);
    }

    public function addSkillProcess() {
        if (($_POST['name'] != "") && ($_POST['skill_category'] != "") && ($_POST['visible'] != "")) {
            $data = [];
            $data['name'] = $_POST['name'];
            $data['skill_category'] = $_POST['skill_category'];
            $data['visible'] = $_POST['visible'];

            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
            $data['user_id'] = $_SESSION['userId'];

            $return = $this->userModel->addSkill($data);

            if ($return == "OK") {
                $alertColor = 'green';
                $message = 'La categoría de skill ha sido agregada correctamente';
            } else {
                $alertColor = 'red';
                $message = 'Ha ocurrido un error. Vuelve a intentarlo.';
            }

        } else {
            $alertColor = 'red';
            $message = 'ERROR: Faltan campos obligatorios';
        }

        $skillCategoryExist = $this->userModel->getSkillCategories($_SESSION['userId']);

        return $this->loadView('profileAddSkillView', [
            'alertColor' => $alertColor,
            'message' => $message,
            'skillCategories' => $skillCategoryExist
            ]);
    }

    public function addSkillCategoryProcess() {
        if (($_POST['category'] != "")) {
            $data = [];
            $data['category'] = $_POST['category'];
            $data['user_id'] = $_SESSION['userId'];

            $return = $this->userModel->addSkillCategory($data);

            if ($return == "OK") {
                $alertColor = 'green';
                $message = 'La categoría de skill ha sido agregada correctamente';
            } else {
                $alertColor = 'red';
                $message = 'Ha ocurrido un error. Vuelve a intentarlo.';
            }

        } else {
            $alertColor = 'red';
            $message = 'ERROR: Faltan campos obligatorios';
        }
        return $this->loadView('profileAddSkillCategoryView', [
            'alertColor' => $alertColor,
            'message' => $message
            ]);
    }

    private function validateUploadImg($image, $name) {
        $imgName = urlencode($name); // URLENCODE nombre archivo
        $imgName = preg_replace('/[^\w\s.-]/', '', $imgName); // Quitamos caracteres no compatibles con sistema de archivos
        $imgType = $image['type'];
        $imgSize = $image['size'];
        $imgTmpName = $image['tmp_name'];
        $destinationFolder = 'uploads/projectLogos/';
        
        $allowedTypes = ['image/jpg', 'image/png', 'image/jpeg', 'image/gif'];
        if (!in_array($imgType, $allowedTypes)) {
            return 'FORMATOINVALIDO';
        }
        
        if ($imgSize > 5242880) {
            return 'TAMANOINVALIDO';
        }
        
        $imgName = $imgName.str_replace("image/", ".", $imgType); // Agregamos Extensión

        move_uploaded_file($imgTmpName, $destinationFolder.$imgName);

        // if ($imgType == 'image/jpg') {
        //     $imagenOriginal = imagecreatefromjpg($imgTmpName);
        // } else if ($imgType == 'image/jpeg') {
        //     $imagenOriginal = imagecreatefromjpeg($imgTmpName);
        // } else if ($imgType == 'image/png') {
        //     $imagenOriginal = imagecreatefrompng($imgTmpName);
        // } else if ($imgType == 'image/gif') {
        //     $imagenOriginal = imagecreatefromgif($imgTmpName);
        // }
        // $imagenCuadrada = imagecropauto($imagenOriginal, IMG_CROP_THRESHOLD, null, 1);
        // imagejpeg($imagenCuadrada, $destinationFolder.$imgName);

        // // Liberar memoria
        // imagedestroy($imagenOriginal);
        // imagedestroy($imagenCuadrada);
        
        return $imgName;
    }


    public function visibleJob($jobId) {
        $isVisible = $this->userModel->getJobVisibility($jobId);
        if ($isVisible == "1") {
            $this->userModel->hideJob($jobId);
        } else {
            $this->userModel->showJob($jobId);
        }
        return header('Location: http://portfoliapp.com/dashboard');
    }

    public function eraseJob($jobId) {
        $this->userModel->eraseJob($jobId);
        return header('Location: http://portfoliapp.com/dashboard');
    }

    public function editJob($jobId) {
        $job = $this->userModel->getJob($jobId);
        return $this->loadView('profileEditJobView', [
            'jobTitle'=>$job['title'],
            'jobDescription'=>$job['description'],
            'jobStartDate'=>$job['start_date'],
            'jobFinishDate'=>$job['finish_date'],
            'jobAchievements'=>$job['achievements'],
            'jobVisible'=>$job['visible'],
            ]);
    }

    public function editJobProcess($jobId) {
        $data = [];
        $data['title'] = $_POST['title'];
        $data['description'] = $_POST['summary'];
        $data['start_date'] = $_POST['start_date'];
        $data['visible'] = $_POST['visible'];

        ($_POST['finish_date'] != "") ? ($data['finish_date'] = $_POST['finish_date']) : '';
        ($_POST['achievements'] != "") ? ($data['achievements'] = $_POST['achievements']) : '';

        $data['updated_at'] = date('Y-m-d H:i:s');

        $this->userModel->editJob($jobId, $data);
        return header('Location: http://portfoliapp.com/dashboard');
    }



    public function visibleProject($projectId) {
        $isVisible = $this->userModel->getProjectVisibility($projectId);
        if ($isVisible == "1") {
            $this->userModel->hideProject($projectId);
        } else {
            $this->userModel->showProject($projectId);
        }
        return header('Location: http://portfoliapp.com/dashboard');
    }

    public function eraseProject($projectId) {
        $this->userModel->eraseProject($projectId);
        return header('Location: http://portfoliapp.com/dashboard');
    }

    public function editProject($projectId) {
        $project = $this->userModel->getProject($projectId);
        return $this->loadView('profileEditProjectView', [
            'projectTitle'=>$project['title'],
            'projectDescription'=>$project['description'],
            'projectTechnologies'=>$project['technologies'],
            'projectVisible'=>$project['visible'],
            ]);
    }

    public function editProjectProcess($projectId) {
        $data = [];
        $data['title'] = $_POST['title'];
        $data['description'] = $_POST['description'];
        $data['visible'] = $_POST['visible'];

        ($_POST['technologies'] != "") ? ($data['technologies'] = $_POST['technologies']) : '';

        $data['updated_at'] = date('Y-m-d H:i:s');

        $this->userModel->editProject($projectId, $data);
        return header('Location: http://portfoliapp.com/dashboard');
    }




    public function visibleSocialNetwork($socialNetworkId) {
        $isVisible = $this->userModel->getSocialNetworkVisibility($socialNetworkId);
        if ($isVisible == "1") {
            $this->userModel->hideSocialNetwork($socialNetworkId);
        } else {
            $this->userModel->showSocialNetwork($socialNetworkId);
        }
        return header('Location: http://portfoliapp.com/dashboard');
    }

    public function eraseSocialNetwork($socialNetworkId) {
        $this->userModel->eraseSocialNetwork($socialNetworkId);
        return header('Location: http://portfoliapp.com/dashboard');
    }

    public function editSocialNetwork($socialNetworkId) {
        $socialNetwork = $this->userModel->getSocialNetwork($socialNetworkId);
        return $this->loadView('profileEditSocialNetworkView', [
            'socialNetworkName'=>$socialNetwork['name'],
            'socialNetworkUrl'=>$socialNetwork['url'],
            'socialNetworkVisible'=>$socialNetwork['visible'],
            ]);
    }

    public function editSocialNetworkProcess($socialNetworkId) {
        $data = [];
        $data['name'] = $_POST['name'];
        $data['url'] = $_POST['url'];
        $data['visible'] = $_POST['visible'];
        $data['updated_at'] = date('Y-m-d H:i:s');

        $this->userModel->editsocialNetwork($socialNetworkId, $data);
        return header('Location: http://portfoliapp.com/dashboard');
    }




    public function visibleSkill($skillId) {
        $isVisible = $this->userModel->getSkillVisibility($skillId);
        if ($isVisible == "1") {
            $this->userModel->hideSkill($skillId);
        } else {
            $this->userModel->showSkill($skillId);
        }
        return header('Location: http://portfoliapp.com/dashboard');
    }

    public function eraseSkill($skillId) {
        $this->userModel->eraseSkill($skillId);
        return header('Location: http://portfoliapp.com/dashboard');
    }

    public function editSkill($skillId) {
        $skill = $this->userModel->getSkill($skillId);
        return $this->loadView('profileEditSkillView', [
            'skillName'=>$skill['name'],
            'skillVisible'=>$skill['visible'],
            ]);
    }

    public function editSkillProcess($skillId) {
        $data = [];
        $data['name'] = $_POST['name'];
        $data['visible'] = $_POST['visible'];
        $data['updated_at'] = date('Y-m-d H:i:s');

        $this->userModel->editSkill($skillId, $data);
        return header('Location: http://portfoliapp.com/dashboard');
    }
}

?>