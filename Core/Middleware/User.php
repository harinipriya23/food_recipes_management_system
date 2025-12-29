<?php

namespace Core\Middleware;

class User
{
    public static function handleAuth()
    {
        if (($_SESSION['type'] ?? '') !== 'user') {
            echo 'Authentication Forbbiden';
            exit();
        }
    }
}
