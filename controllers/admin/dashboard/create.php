<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$recipes =
    $db->query("SELECT count(id) AS total, SUM(CASE WHEN status = 'Approved' THEN 1 ELSE 0 END) AS approved, SUM(CASE WHEN status = 'Pending' THEN 1 ELSE 0 END) AS pending, SUM(CASE WHEN status = 'Rejected' THEN 1 ELSE 0 END) AS rejected FROM recipes", [])->fetch();
$comments =
    $db->query("SELECT count(id) AS total, SUM(CASE WHEN status = 'approved' THEN 1 ELSE 0 END) AS approved, SUM(CASE WHEN status = 'pending' THEN 1 ELSE 0 END) AS pending, SUM(CASE WHEN status = 'rejected' THEN 1 ELSE 0 END) AS rejected FROM comments", [])->fetch();

views(
    '/admin/dashboard/create.view.php',
    ['recipes' => $recipes, 'comments' => $comments]
);
