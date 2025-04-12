<?php
require_once __DIR__ . '/../models/Startup.php';

class PublicController {
    private $startupModel;

    public function __construct() {
        $this->startupModel = new Startup();
    }

    public function index() {
        $startups = $this->startupModel->getAll();
        require_once __DIR__ . '/../views/public/startups.php';
    }
}