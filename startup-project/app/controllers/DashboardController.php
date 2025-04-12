<?php
require_once __DIR__ . '/../models/Startup.php';

class DashboardController {
    private $startupModel;

    public function __construct() {
        $this->startupModel = new Startup();
    }

    public function index() {
        $startups = $this->startupModel->getAll();
        $foundersCount = count($this->startupModel->getFounders());
        $startupsCount = count($startups);
        
        require_once __DIR__ . '/../views/dashboard/index.php';
    }
}