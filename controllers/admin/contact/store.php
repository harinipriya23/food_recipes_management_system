<?php

use Core\App;
use Core\Database;
use Core\Service\ContactService;

$db = App::resolve(Database::class);
$about = new ContactService($db);

$result = $about->save($_POST);
if ($result['success'] === false) {

    views('/admin/contact.view.php', ['errors' => $result['errors']]);
    exit();
}

header('location: /food_recipes/contact');
exit();
