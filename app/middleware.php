<?php

declare(strict_types=1);

use Slim\App;

return function(App $app) {
    // Settings injection
    $settings = $app->getContainer()->get('settings');
    
    // Add global middleware
    $app->addErrorMiddleware($settings['displayErrorDetails'], $settings['logErrors'], $settings['logErrorDetails']);
};