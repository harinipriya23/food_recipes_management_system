<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$info = $db->query("SELECT email, address, mobile FROM contact LIMIT 1", [])->fetch();

views("/users/contact.view.php", ['info' => $info]);
