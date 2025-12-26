<?php

use Core\App;
use Core\Database;
use Core\Service\StatusService;

$db = App::resolve(Database::class);
$status = new StatusService($db);

$id = $_POST['recipe_id'];

if ($_POST['action'] === 'approve') {
    $status->approveRecipe($id);
} else {
    $status->rejectRecipe($id);
}
header('location: /food_recipes/admin/recipes');
exit();
