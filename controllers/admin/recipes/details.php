<?php

use Core\App;
use Core\Database;

$id = $_GET['id'];

$db = App::resolve(Database::class);
$recipe = $db->query("SELECT * FROM recipes WHERE id= :id", [':id' => $id])->fetch();

views('/admin/recipes/details.view.php', ['recipe' => $recipe]);
