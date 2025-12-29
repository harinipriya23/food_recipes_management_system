<?php

use Core\App;
use Core\Database;
use Core\Service\AuthService;

$db = App::resolve(Database::class);
$auth = new AuthService($db);
$result = $auth->register($_POST);


if ($result['success'] === false) {
    views('/authentication/form.view.php', ['errors' => $result['errors']]);
    exit();
}

header('location: /food_recipes/login');
exit();
