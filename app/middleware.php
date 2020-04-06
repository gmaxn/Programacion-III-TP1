<?php

declare(strict_types=1);

use Slim\App;

return function(App $app) {
    // Add global middleware
    $app->addErrorMiddleware(true, true, false);
};