<?php

use Phalcon\Mvc\View;
use Phalcon\Mvc\Url as UrlProvider;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;

$di->set('view', function () use ($config, $di){
    $view = new View();
    $view->setViewsDir(APP_PATH . $config->application->viewsDir);

    $volt = new \Phalcon\Mvc\View\Engine\Volt($view, $di);
    $volt->setOptions(
        array(
            'compiledPath'      => APP_PATH . $config->volt->cachesDir,
            'compiledExtension' => $config->volt->extension,
            'compiledSeparator' => $config->volt->separator,
            'stat'              => (bool)$config->volt->stat
        )
    );

    $view->registerEngines(
        array(
            ".volt" => $volt
        )
    );
    return $view;
});

$di->set('url', function () use ($config){
    $url = new UrlProvider();
    $url->setBaseUri($config->application->baseUri);
    return $url;
});

$di->set('db', function() use ($config){
    return new DbAdapter(array(
        "host"      => $config->database->host,
        "username"  => $config->database->username,
        "password"  => $config->database->password,
        "dbname"    => $config->database->name 
    ));
});


