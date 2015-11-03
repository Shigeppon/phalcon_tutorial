<?php

$loader = new Phalcon\Loader();

$loader->registerDirs(array(
    APP_PATH . $config->application->controllersDir,
    APP_PATH . $config->application->modelsDir,
))->register();
