<?php

namespace Core\Middleware;

class Admin
{
    public static function handleAuth()
    {
        if ($_SESSION['type'] !== 'admin') {
            header('location: /food_recipes/login');
            exit();
        }
    }
}
