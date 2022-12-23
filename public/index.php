<?php

require_once __DIR__ . '/../vendor/autoload.php';

use BasisData\Mongo\App\Router;
use BasisData\Mongo\config\Mongo;
use BasisData\Mongo\config\Mysql;
use BasisData\Mongo\Controller\ProductController;

Router::add('GET', '/', ProductController::class, 'index');
Router::add('GET', '/products', ProductController::class, 'index');
Router::add('GET', '/order/cart', \BasisData\Mongo\Controller\OrderController::class, 'add');

Router::run();

