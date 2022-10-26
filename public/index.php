<?php

require_once __DIR__ . '/../vendor/autoload.php';

use BasisData\Mongo\App\Router;
use BasisData\Mongo\Controller\ProductController;

Router::add('GET', '/', ProductController::class, 'index');

Router::run();