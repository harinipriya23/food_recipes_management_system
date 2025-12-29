<?php

use Core\App;
use Core\Session;
use Core\Database;
use Core\Service\AuthService;

$db = App::resolve(Database::class);
$auth = new AuthService($db);
$result = $auth->login($_POST);

if ($result['success'] === false) {
    views('/authentication/form.view.php', ['errors' => $result['errors'], 'action' => $result['action']]);
    exit();
}

setcookie("user", $_POST['username'], time() + 86400);
Session::put('user', $_POST['username']);

if ($_SESSION['type'] === 'user') {
    header('location: /food_recipes/dashboard');
    exit();
}

header('location: /food_recipes/admin/dashboard ');
exit();
