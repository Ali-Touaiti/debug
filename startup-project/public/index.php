<?php
// Include necessary files
require_once __DIR__ . '/../app/config/database.php';
require_once __DIR__ . '/../app/models/Startup.php';
require_once __DIR__ . '/../app/models/Founder.php';
require_once __DIR__ . '/../app/controllers/DashboardController.php';
require_once __DIR__ . '/../app/controllers/StartupController.php';
require_once __DIR__ . '/../app/controllers/FounderController.php';
require_once __DIR__ . '/../app/controllers/PublicController.php';

// Start session
session_start();

// Routing
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$routes = [
    '/' => 'DashboardController@index',
    '/dashboard' => 'DashboardController@index',
    '/startup-submit' => 'StartupController@create',
    '/startup-store' => 'StartupController@store',
    '/edit-startup' => 'StartupController@edit',
    '/update-startup' => 'StartupController@update',
    '/delete-startup' => 'StartupController@delete',
    '/founder-submit' => 'FounderController@create',
    '/founder-store' => 'FounderController@store',
    '/public-view' => 'PublicController@index'
];

if (isset($routes[$uri])) {
    list($controller, $action) = explode('@', $routes[$uri]);
    $controllerInstance = new $controller();
    call_user_func([$controllerInstance, $action]);
} else {
    echo "Page not found";
}