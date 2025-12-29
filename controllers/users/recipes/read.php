<?php


use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$recipes = $db->query("SELECT * FROM recipes WHERE status=:status", [":status" => "approved"])->fetchAll();

views('/users/recipes/read.view.php', ['recipes' => $recipes]);
