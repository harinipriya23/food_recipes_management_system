<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$start = $_POST['start_date'];
$end = $_POST['end_date'];
$username = $_SESSION['user'];

$query = "SELECT 
        r.id, 
        r.title, 
        r.user_id, 
        r.date, 
        r.status
    FROM recipes AS r 
    JOIN users AS u ON r.user_id = u.id WHERE username =:username";
$params = [':username' => $username];

if ($start && $end) {
    $query .= " AND r.date BETWEEN :start AND :end";
    $params[':start'] = $start;
    $params[':end'] = $end;
}
$query .= " ORDER BY r.date DESC";
$recipes = $db->query($query, $params)->fetchAll();

views('/users/report/create.view.php', ['recipes' => $recipes]);
