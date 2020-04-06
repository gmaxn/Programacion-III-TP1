<?php
use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require __DIR__ . './vendor/autoload.php';

$app = AppFactory::create();
$app->setBasePath('/TP1');

$app->addErrorMiddleware(true, true, false);

$app->get('/hello-world', function (Request $request, Response $response, $args) {

    $response->getBody()->write("Hello world!");  
    return $response; 
});

$app->run();