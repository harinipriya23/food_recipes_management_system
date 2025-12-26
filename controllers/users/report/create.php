<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$username = $_SESSION['user'];

$recipes = $db->query("SELECT 
        r.id, 
        r.title, 
        r.img, 
        r.user_id, 
        r.date, 
        r.status
    FROM recipes AS r 
    JOIN users AS u ON r.user_id = u.id WHERE username =:username", [':username' => $username])->fetchAll();

views("/users/report/create.view.php", ['recipes' => $recipes]);
