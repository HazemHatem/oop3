<?php


class Session
{

    public static function get($key)
    {
        return $_SESSION[$key] ?? null;
    }

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function has($key)
    {
        return self::get($key) ?? false;
    }

    public static function GetAll()
    {
        return $_SESSION;
    }

    public static function remove($key)
    {
        if (self::has($key)) {
            unset($_SESSION[$key]);
        }
    }

    public static function RemoveAll()
    {
        session_destroy();
        session_start();
        $_SESSION = [];
    }

    public static function flash($key)
    {
        if (self::has($key)) {
            $value = self::get($key);
            self::remove($key);
            return $value;
        } else {
            return null;
        }
    }
}
