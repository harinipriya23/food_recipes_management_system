<?php


use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$comments = $db->query("SELECT 
        c.id, 
        c.name, 
        c.mobile, 
        c.recipe_id, 
        c.date, 
        c.comment, 
        c.status,
        r.title AS recipe_name 
    FROM comments AS c 
    JOIN recipes AS r ON c.recipe_id = r.id ORDER BY c.date DESC", [])->fetchAll();

views('/admin/comments/overview.view.php', ['comments' => $comments]);
