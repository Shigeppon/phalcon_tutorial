<?php

use Phalcon\Mvc\Application;
use Phalcon\DI\FactoryDefault;
use Phalcon\Config\Adapter\Ini as ConfigIni;

try {

    define('APP_PATH', realpath('..') . '/');

    // Read the configuration
    $config = new ConfigIni(APP_PATH . 'app/config/config.ini');

    //Register an autoloader
    require APP_PATH . 'app/config/loader.php';

    // Create a DI
    $di = new FactoryDefault();

    require APP_PATH . 'app/config/services.php';

    // Handle the request
    $application = new Application($di);

    echo $application->handle()->getContent();

} catch (\Exception $e) {
    echo "PhalconException: ", $e->getMessage();
}
