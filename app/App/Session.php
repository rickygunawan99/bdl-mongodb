<?php


namespace BasisData\Mongo\App;


class Session
{
    public static function Get(string $name){
        session_start();

        return $_SESSION[$name];
    }

    public static function Set(string $key, string $value){
        session_start();

        $_SESSION[$key] = $value;
    }

    public static function Unset(string $key){
        session_start();

        unset($_SESSION['key']);
    }
}