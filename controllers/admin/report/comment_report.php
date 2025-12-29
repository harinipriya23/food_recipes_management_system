<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$status = $_GET['status'] ?? "";
$start = $_GET['start_date']  ?? date('Y-m-01');
$end = $_GET['end_date'] ?? date('Y-m-d');
var_dump($status);
$query = "SELECT 
        c.id, 
        c.name, 
        c.comment, 
        c.recipe_id, 
        c.date, 
        c.status, 
        r.title AS recipe_title 
    FROM comments AS c 
    JOIN recipes AS r ON c.recipe_id = r.id ";
$params = [];

if (!empty($start) && !empty($end)) {
    $query .= " AND c.date BETWEEN :start AND :end";
    $params[':start'] = $start;
    $params[':end'] = $end;
}
if ($status !== "") {
    $query .= " WHERE c.status = :status";
    $params[':status'] = $status;
}
$query .= " ORDER BY c.date DESC";
$comments = $db->query($query, $params)->fetchAll();

views(
    "/admin/report/comment_report.view.php",
    ['comments' => $comments, 'status' => $status, 'start' => $start, 'end' => $end]
);
