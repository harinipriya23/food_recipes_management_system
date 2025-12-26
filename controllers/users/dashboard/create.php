<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$username = $_GET['user'];
$user = $db->query("SELECT id FROM users WHERE username = :username", [':username' => $username])->fetch();
$recipes =
    $db->query("SELECT  count(r.id) AS total, SUM(CASE WHEN r.status = 'Approved' THEN 1 ELSE 0 END) AS approved, SUM(CASE WHEN r.status = 'Pending' THEN 1 ELSE 0 END) AS pending, SUM(CASE WHEN r.status = 'Rejected' THEN 1 ELSE 0 END) AS rejected, r.user_id, u.username FROM recipes AS r JOIN users AS u ON r.user_id  = u.id WHERE user_id = :id", [':id' => $user['id']])->fetch();

views(
    '/users/dashboard/create.view.php',
    ['recipes' => $recipes]
);
