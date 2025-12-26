<?php

use Core\Session;

Session::destroy("user");

header('location: /food_recipes');
exit();
