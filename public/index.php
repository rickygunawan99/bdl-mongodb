<?php

require_once __DIR__ . '/../vendor/autoload.php';

use BasisData\Mongo\App\Router;
use BasisData\Mongo\Controller\OrderController;
use BasisData\Mongo\Controller\ProductController;

Router::add('GET', '/', ProductController::class, 'index');
Router::add('GET', '/products', ProductController::class, 'index');
Router::add('GET', '/order/cart', OrderController::class, 'index');
Router::add('GET', '/checkout', OrderController::class, 'checkout');

Router::run();

