<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$status = $_GET['status'] ?? "";
$start = $_GET['start_date']  ?? date('Y-m-01');
$end = $_GET['end_date'] ?? date('Y-m-d');
$username = $_SESSION['user'];

$query = "SELECT 
        r.id, 
        r.title, 
        r.img, 
        r.user_id, 
        r.date, 
        r.status, 
        u.name AS user_name 
    FROM recipes AS r 
    JOIN users AS u ON r.user_id = u.id WHERE username =:username";
$params = [':username' => $username];

if (!empty($start) && !empty($end)) {
    $query .= " AND r.date BETWEEN :start AND :end";
    $params[':start'] = $start;
    $params[':end'] = $end;
}
if ($status !== "") {
    $query .= " AND r.status = :status";
    $params[':status'] = $status;
}
$query .= " ORDER BY r.date DESC";
$recipes = $db->query($query, $params)->fetchAll();

views(
    "/users/report/report.view.php",
    ['recipes' => $recipes, 'status' => $status, 'start' => $start, 'end' => $end]
);
