<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$username = $_SESSION['user'];
$user = $db->query("SELECT id FROM users WHERE username = :username", [':username' => $username])->fetch();
$recipes =
    $db->query(
        "SELECT  count(r.id) AS total, SUM(CASE WHEN r.status = 'approved' THEN 1 ELSE 0 END) AS approved,
     SUM(CASE WHEN r.status = 'pending' THEN 1 ELSE 0 END) AS pending, SUM(CASE WHEN r.status = 'rejected' THEN 1 ELSE 0 END) AS rejected,
     r.user_id, u.username FROM recipes AS r JOIN users AS u ON r.user_id  = u.id WHERE user_id = :id",
        [':id' => $user['id']]
    )->fetch();
$comments = $db->query("
    SELECT 
        c.id,
        c.name,
        c.comment,
        c.status,
        c.date,
        r.title AS recipe_title
    FROM comments AS c
    JOIN recipes AS r ON c.recipe_id = r.id
    WHERE r.user_id = :id AND c.status = 'approved'
    ORDER BY c.date DESC
", [':id' => $user['id']])->fetchAll();

views(
    '/users/dashboard/index.view.php',
    ['recipes' => $recipes, 'comments' => $comments]
);
