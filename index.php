<?php
use Slim\Factory\AppFactory;

require __DIR__ . './vendor/autoload.php';

$app = AppFactory::create();
$app->setBasePath('/TP1');

$middleware = require __DIR__ . './app/middleware.php';
$middleware($app);

$routes = require __DIR__ . './app/routes.php';
$routes($app);


$app->run();