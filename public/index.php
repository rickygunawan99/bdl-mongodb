<?php

require_once __DIR__ . '/../vendor/autoload.php';

use BasisData\Mongo\App\Router;
use BasisData\Mongo\Controller\AdminController;
use BasisData\Mongo\Controller\OrderController;
use BasisData\Mongo\Controller\ProductController;

Router::add('GET', '/', ProductController::class, 'index');
Router::add('GET', '/products', ProductController::class, 'index');
Router::add('GET', '/order/cart', OrderController::class, 'index');
Router::add('GET', '/checkout', OrderController::class, 'checkout');
Router::add('POST', '/checkout', OrderController::class, 'doCheckout');

Router::add('GET', '/admin', AdminController::class, 'dashboard');
Router::add('POST', '/admin', AdminController::class, 'doAction');

Router::add('GET', '/admin/edit-product', AdminController::class, 'editProduct');
Router::add('GET', '/admin/add-product', AdminController::class, 'addProduct');
Router::add('POST', '/admin/add-product', AdminController::class, 'doAddProduct');

Router::run();

