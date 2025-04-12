<?php
require_once __DIR__ . '/../../app/models/Startup.php';
require_once __DIR__ . '/../../app/models/Founder.php';

class StartupController {
    private $startupModel;
    private $founderModel;

    public function __construct() {
        $this->startupModel = new Startup();
        $this->founderModel = new Founder();
    }

    public function create() {
        $founders = $this->founderModel->getAll();
        require_once __DIR__ . '/../../app/views/startup/submit.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate input
            $errors = [];
            
            if (empty($_POST['nom'])) $errors[] = "Startup name is required";
            if (empty($_POST['secteur'])) $errors[] = "Industry sector is required";
            if (empty($_POST['id_fondateur'])) $errors[] = "Founder is required";
            if (empty($_POST['email'])) $errors[] = "Email is required";
            if (empty($_POST['description'])) $errors[] = "Description is required";
            if (empty($_POST['siteweb'])) $errors[] = "Website is required";
            if (empty($_POST['date_creation'])) $errors[] = "Creation date is required";
            
            if (!empty($_FILES['logo']['name'])) {
                $target_dir = "../../public/uploads/";
                $target_file = $target_dir . basename($_FILES["logo"]["name"]);
                
                if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
                    $_POST['logo'] = $target_file;
                } else {
                    $errors[] = "Error uploading logo";
                }
            } else {
                $_POST['logo'] = null;
            }
            
            if (empty($errors)) {
                if ($this->startupModel->store($_POST)) {
                    $_SESSION['success'] = "Startup created successfully!";
                    header("Location: /dashboard");
                    exit;
                } else {
                    $errors[] = "Error saving startup";
                }
            }
            
            $founders = $this->founderModel->getAll();
            require_once __DIR__ . '/../../app/views/startup/submit.php';
        }
    }

    public function edit() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            $_SESSION['error'] = "Startup not found";
            header("Location: /dashboard");
            exit;
        }
        
        $startup = $this->startupModel->findById($id);
        if (!$startup) {
            $_SESSION['error'] = "Startup not found";
            header("Location: /dashboard");
            exit;
        }
        
        $founders = $this->founderModel->getAll();
        require_once __DIR__ . '/../../app/views/startup/edit.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            if (!$id) {
                $_SESSION['error'] = "Startup not found";
                header("Location: /dashboard");
                exit;
            }
            
            // Similar validation as in store method
            
            if (!empty($_FILES['logo']['name'])) {
                $target_dir = "../../public/uploads/";
                $target_file = $target_dir . basename($_FILES["logo"]["name"]);
                
                if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
                    $_POST['logo'] = $target_file;
                } else {
                    $startup = $this->startupModel->findById($id);
                    $_POST['logo'] = $startup['logo'];
                }
            }
            
            if ($this->startupModel->update($id, $_POST)) {
                $_SESSION['success'] = "Startup updated successfully!";
                header("Location: /dashboard");
                exit;
            } else {
                $_SESSION['error'] = "Error updating startup";
                header("Location: /edit-startup?id=$id");
                exit;
            }
        }
    }

    public function delete() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            $_SESSION['error'] = "Startup not found";
            header("Location: /dashboard");
            exit;
        }
        
        if ($this->startupModel->delete($id)) {
            $_SESSION['success'] = "Startup deleted successfully!";
        } else {
            $_SESSION['error'] = "Error deleting startup";
        }
        
        header("Location: /dashboard");
        exit;
    }
}