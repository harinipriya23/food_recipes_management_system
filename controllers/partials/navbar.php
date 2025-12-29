<?php

$user = $_SESSION['user'] ?? '';
$type = $_SESSION['type'] ?? '';
$setUser = '';

if (!$user) {
    $setUser = 'unknown_user';
} else {
    $setUser = ($type === 'admin') ? "admin" : 'registered_user';
}

views('/partials/navbar.view.php', ['user' => $setUser]);
