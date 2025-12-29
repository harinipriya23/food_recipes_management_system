<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
var_dump($_GET);
$id = $_GET['id'] ?? null;
$recipe = $db->query(
    "SELECT * FROM recipes WHERE id = :id",
    ['id' => $id]
)->fetch();

views('/users/recipes/form.view.php', ['recipe' => $recipe]);
