<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$heading = "Latest recipes";
$approvedRecipes = $db->query("SELECT * FROM recipes WHERE status = :status", [':status' => "Approved"])->fetchAll();


// views('/users/recipes/recipes.view.php', ['recipes' => $approvedRecipes, 'heading' => $heading]);
views('/users/home.view.php', []);
