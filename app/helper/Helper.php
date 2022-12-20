<?php


namespace BasisData\Mongo\helper;


class Helper
{
    public static function MicroTime()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }
}