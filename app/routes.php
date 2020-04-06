<?php
use Slim\App;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface as RequestInterface; 

return function(App $app) {

    $app->get('/hello-world', function (RequestInterface $request, ResponseInterface $response, $args) {

        $response->getBody()->write("Hello world!");  
        return $response; 
    });

    $app->get('/countries/byContinent', function (RequestInterface $request, ResponseInterface $response, $args) {

        if ($this->has('myService')) {
            $myService = $this->get('myService');
    
            $response = $myService->GroupCountriesByContinent($request, $response, $args);
        }

        return $response; 
    });

    $app->get('/countries/byContinent/{name}', function (RequestInterface $request, ResponseInterface $response, $args) {

        if ($this->has('myService')) {
            $myService = $this->get('myService');
    
            $response = $myService->GetCountriesByContinentName($request, $response, $args);
        }

        return $response; 
    });

    $app->get('/countries/bySubregion/{name}', function (RequestInterface $request, ResponseInterface $response, $args) {

        if ($this->has('myService')) {
            $myService = $this->get('myService');

    
            $response = $myService->GetCountriesBySubregionName($request, $response, $args);
        }

        return $response; 
    });

    $app->get('/countries/byCapital/{name}', function (RequestInterface $request, ResponseInterface $response, $args) {

        if ($this->has('myService')) {
            $myService = $this->get('myService');

            $response = $myService->GetCountriesByCapitalName($request, $response, $args);
        }

        return $response; 
    });

    $app->get('/countries/byLanguage/{name}', function (RequestInterface $request, ResponseInterface $response, $args) {

        if ($this->has('myService')) {
            $myService = $this->get('myService');

            $response = $myService->GetCountriesByLanguageName($request, $response, $args);
        }

        return $response; 
    });
};