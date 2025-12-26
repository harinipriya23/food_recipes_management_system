<?php

namespace Core;


class Session
{
    public static function put($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    public static function get($key)
    {
        return $_SESSION[$key];
    }
    public static function has($key)
    {
        static::get($key);
    }
    public static function clear()
    {
        return $_SESSION = [];
    }
    public static function destroy($val)
    {
        static::clear();
        session_destroy();

        $params = session_get_cookie_params();
        setcookie($val, "", time() - 3600);
        setcookie("PHPSESSID", "", time() - 3600, $params['path']);
    }
}
