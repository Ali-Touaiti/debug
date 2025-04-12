<?php
require_once __DIR__ . '/../../app/models/Founder.php';

class FounderController {
    private $founderModel;

    public function __construct() {
        $this->founderModel = new Founder();
    }

    public function create() {
        require_once __DIR__ . '/../../app/views/founder/submit.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate input
            $errors = [];
            
            if (empty($_POST['name'])) $errors[] = "Name is required";
            if (empty($_POST['email'])) $errors[] = "Email is required";
            if (empty($_POST['bio'])) $errors[] = "Bio is required";
            
            if (empty($errors)) {
                if ($this->founderModel->store($_POST)) {
                    $_SESSION['success'] = "Founder created successfully!";
                    header("Location: /dashboard");
                    exit;
                } else {
                    $errors[] = "Error saving founder";
                }
            }
            
            require_once __DIR__ . '/../../app/views/founder/submit.php';
        }
    }
}