<?php

use Core\App;
use Core\Database;

$id = $_GET['id'];

$db = App::resolve(Database::class);
$recipe = $db->query("SELECT * FROM recipes WHERE id= :id", [':id' => $id])->fetch();
// $user = $db->query("SELECT username, mobile FROM users WHERE id = :id", [':id' => $recipe['user_id']]);

views('/admin/pdf/create.view.php', ['recipe' => $recipe]);
