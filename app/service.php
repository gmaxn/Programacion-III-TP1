<?php
declare(strict_types=1);

use DI\Container;
require __DIR__ . './myService.php';
require __DIR__ . './myServiceRepository.php';


return function (Container $container) {
    $container->set('myServiceInterface', \DI\create('myService'));
    $container->set('myServiceRepositoryInterface', \DI\create('myServiceRepository'));
};