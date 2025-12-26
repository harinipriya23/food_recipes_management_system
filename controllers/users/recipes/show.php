<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$id = $_GET['id'];
$recipes = $db->query("SELECT r.id, r.date, r.title, r.status FROM recipes AS r WHERE r.user_id = :id", [':id' => $id])->fetchAll();
views('/users/recipes/show.view.php', ['recipes' => $recipes]);
