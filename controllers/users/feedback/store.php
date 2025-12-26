<?php

use Core\App;
use Core\Database;
use Core\Service\FeedbackService;

$db = App::resolve(Database::class);
$about = new FeedbackService($db);
$info = $db->query("SELECT email, address, mobile FROM contact LIMIT 1", [])->fetch();

$result = $about->save($_POST);
if ($result['success'] === false) {
    views('/users/contact.view.php', ['errors' => $result['errors'], 'info' => $info]);
    exit();
}

header('location: /food_recipes/contact');
exit();
