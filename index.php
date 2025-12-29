<?php
session_start();

use Core\Router;

define('BASE_PATH', __DIR__ . "/./");
require './functions.php';
require base_path('./Core/Router.php');

spl_autoload_register(function ($class) {
    if (class_exists($class, false)) {
        return;
    }
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    $file = base_path("{$class}.php");


    if (file_exists($file)) {
        require $file;
    }
});

$router = new Router();
require './setup.php';


require base_path('/routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_request_method'] ?? $_SERVER['REQUEST_METHOD'];

$isAjax = false;

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == "xmlhttprequest") {
    $isAjax = true;
}

if (!$isAjax) {
    require 'controllers/partials/header.php';
    require 'controllers/partials/navbar.php';
}

$router->route($uri, $method);

if (!$isAjax) {
    require base_path('/controllers/partials/footer.php');
}
