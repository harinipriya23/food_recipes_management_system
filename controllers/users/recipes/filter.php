<?php


use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$search = $_GET['search'];
$searchItem = "%$search%";
$recipes = $db->query("SELECT * FROM recipes WHERE (title LIKE :title OR ingredients LIKE :ingredients) 
     AND status = :status", [":title" => $searchItem, ":ingredients" => $searchItem, ":status" => "Approved"])->fetchAll();

views('/users/recipes/read.view.php', ['recipes' => $recipes]);
