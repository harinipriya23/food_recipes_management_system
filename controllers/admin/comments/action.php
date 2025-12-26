<?php

use Core\App;
use Core\Database;
use Core\Service\StatusService;

$db = App::resolve(Database::class);
$status = new StatusService($db);
$id = $_POST['comment_id'];

if ($_POST['action'] === 'approve') {
    $status->approveComment($id);
} else {
    $status->rejectComment($id);
}
header('location: /food_recipes/admin/comments');
exit();
