<?php

use Core\App;
use Core\Database;
use Core\Service\AboutService;

$db = App::resolve(Database::class);
$about = new AboutService($db);

$result = $about->save($_POST);

if ($result['success'] === false) {
    views('/admin/about.view.php', ['errors' => $result['errors']]);
    exit();
}

header('location: /food_recipes/admin/about');
exit();
