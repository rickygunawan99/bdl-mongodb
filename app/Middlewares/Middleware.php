<?php


namespace BasisData\Mongo\Middlewares;


interface Middleware
{
    public function before():void;
}