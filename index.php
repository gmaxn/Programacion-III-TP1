<?php
use DI\Container;
use Slim\Factory\AppFactory;

require __DIR__ . './vendor/autoload.php';

// Create Container using PHP-DI
$container = new Container();

// Set dependencies
$settings = require __DIR__ . './app/settings.php';
$settings($container);

// Resolve logger
$logger = require __DIR__ . './app/logger.php';
$logger($container);

// Set container to create App with on AppFactory
AppFactory::setContainer($container);


$app = AppFactory::create();
$app->setBasePath('/TP1');

$middleware = require __DIR__ . './app/middleware.php';
$middleware($app);

$routes = require __DIR__ . './app/routes.php';
$routes($app);


$app->run();