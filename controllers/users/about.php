<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$totalUsers = $db->query("SELECT count(id) AS total FROM users", [])->fetch();
$about = $db->query("SELECT subtitle, description, social_img, food_img FROM about LIMIT 1", [])->fetch();

views('/users/about.view.php', ['totalUsers' => $totalUsers, 'about' => $about]);
