<?php

namespace Core\Middleware;

class Admin
{
    public static function handleAuth()
    {
        if (($_SESSION['type'] ?? '') !== 'admin') {
            echo 'Authentication Forbbiden';
            exit();
        }
    }
}
