<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$recipes = $db->query("SELECT r.id, r.title AS recipe_title, COUNT(c.id) AS pending_count FROM recipes AS r JOIN comments AS c ON c.recipe_id = r.id WHERE c.status=:status GROUP BY r.id", [':status' => 'pending'])->fetchAll();
$comments = $db->query("SELECT c.id, c.comment, c.recipe_id FROM Comments AS c WHERE c.status = :status", [':status' => 'pending'])->fetchAll();

views('/admin/comments/create.view.php', ['recipes' => $recipes, 'comments' => $comments]);
