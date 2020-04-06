<?php
use Slim\App;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface as RequestInterface; 

return function(App $app) {

    $app->get('/hello-world', function (RequestInterface $request, ResponseInterface $response, $args) {

        $response->getBody()->write("Hello world!");  
        return $response; 
    });

};