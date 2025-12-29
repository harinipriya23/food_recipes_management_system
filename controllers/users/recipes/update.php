<?php

use Core\App;
use Core\Database;
use Core\Service\RecipeService;

header('Content-Type: application/json');

$db = App::resolve(Database::class);
$recipes = new RecipeService($db);
$username = $_SESSION['user'];
$user = $db->query("SELECT id FROM users WHERE username = :username", [':username' => $username])->fetch();
$result = $recipes->update($_POST, $user['id']);

if ($result['success'] === false) {
    echo json_encode([
        'success' => false,
        'errors' => $result['errors']
    ]);
    exit();
}

echo json_encode([
    'success' => true,
    'message' => 'Recipe updated successfully'
]);
exit();
//  Redirection from ajax