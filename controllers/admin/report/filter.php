<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$start = $_POST['start_date'];
$end = $_POST['end_date'];

$query = "SELECT 
        r.id, 
        r.title, 
        r.user_id, 
        r.date, 
        r.status, 
        u.name AS user_name 
    FROM recipes AS r 
    JOIN users AS u ON r.user_id = u.id";
$params = [];

if ($start && $end) {
    $query .= " WHERE r.date BETWEEN :start AND :end";
    $params[':start'] = $start;
    $params[':end'] = $end;
}
$query .= " ORDER BY r.date DESC";
$recipes = $db->query($query, $params)->fetchAll();

views('/admin/report/create.view.php', ['recipes' => $recipes]);
