<?php


namespace Core\Middleware;


class Middleware
{

    const MAP = [
        'admin' => Admin::class,
        'user' => User::class
    ];
    public static function resolveMiddleware($key)
    {
        if (!$key)  return;

        $middleware = static::MAP[$key] ?? null;
        if (!$middleware) {
            throw new \Exception("NO MATCHING MIDDLEWARE FOUND");
        }

        (new $middleware)->handleAuth();
        // return true;
    }
}
