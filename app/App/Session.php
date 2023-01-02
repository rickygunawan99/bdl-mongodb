<?php


namespace BasisData\Mongo\App;


class Session
{

    public static function Get(string $name){
        $_SESSION ?? session_start();

        return $_SESSION[$name] ?? null;
    }

    public static function Set(string $key, string $value){
        $_SESSION ?? session_start();

        $_SESSION[$key] = $value;
    }

    public static function Unset(string $key){
        $_SESSION ?? session_start();

        unset($_SESSION[$key]);
    }

    public static function Flush(string $key)
    {
        $data = self::Get($key);

        self::Unset($key);

        return $data;
    }
}