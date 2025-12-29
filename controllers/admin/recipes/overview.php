<?php


use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$recipes = $db->query("SELECT 
        r.id, 
        r.title,
        r.img, 
        r.user_id, 
        r.date, 
        r.status, 
        u.name AS user_name 
    FROM recipes AS r 
    JOIN users AS u ON r.user_id = u.id ORDER BY r.date DESC", [])->fetchAll();

views('/admin/recipes/overview.view.php', ['recipes' => $recipes]);
