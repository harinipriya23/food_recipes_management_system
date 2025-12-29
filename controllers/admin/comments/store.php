<?php

use Core\App;
use Core\Database;
use Core\Service\CommentService;

$db = App::resolve(Database::class);
$comment = new CommentService($db);
$id = $_POST['recipe_id'];
$result = $comment->store($_POST);
$recipe = $db->query("SELECT * FROM recipes WHERE id = :id", [':id' => $id])->fetch();
$comments = $db->query("SELECT * FROM comments WHERE recipe_id = :id AND status = :status", [':id' => $id, ':status' => "approved"])->fetchAll();

if ($result['success'] === false) {
    views('/users/recipes/details.view.php', ['errors' => $result['errors'], 'recipe' => $recipe, 'comments' => $comments]);
    exit();
}

header('location: /food_recipes/recipes');
// views('/users/recipes/details.view.php', ['success' => "Comment submitted successfully!", 'recipe' => $recipe, 'comments' => $comments]);
exit();
