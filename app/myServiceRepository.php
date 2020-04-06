<?php
use DI\Container;
use NNV\RestCountries;
use Slim\Psr7\Response;

require __DIR__ . '/myServiceRepositoryInterface.php';

class myServiceRepository implements myServiceRepositoryInterface {

    private $api;

    public function __construct() {

        $this->api = new RestCountries;
    }

    public function getAllCountries()
    {
        return json_decode(json_encode($this->api->all()), true);
    }

}