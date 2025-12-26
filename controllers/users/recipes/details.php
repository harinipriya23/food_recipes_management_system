<?php

use Core\App;
use Core\Database;

$id = $_GET['id'];

$db = App::resolve(Database::class);
$recipe = $db->query("SELECT * FROM recipes WHERE id= :id", [':id' => $id])->fetch();
$comments = $db->query("SELECT * FROM comments WHERE recipe_id = :id AND status = :status", [':id' => $id, ':status' => "approved"])->fetchAll();


views('/users/recipes/details.view.php', ['recipe' => $recipe, 'comments' => $comments]);
