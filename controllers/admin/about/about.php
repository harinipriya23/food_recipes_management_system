<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$about = $db->query("SELECT id, subtitle, description, social_img, food_img FROM about LIMIT 1", [])->fetch();

views('/admin/about.view.php', ['about' => $about]);
