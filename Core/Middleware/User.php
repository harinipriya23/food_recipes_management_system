<?php

namespace Core\Middleware;

class User
{
    public static function handleAuth()
    {
        if ($_SESSION['type'] !== 'user') {
            header('location: /food_recipes/login');
            exit();
        }
    }
}
