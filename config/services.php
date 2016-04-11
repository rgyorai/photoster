<?php
/**
 * Services are globally registered in this file
 *
 * @var \Phalcon\Config $config
 */

use Phalcon\Mvc\View\Simple as View;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\View\Engine\Volt;

$di = new FactoryDefault();

/**
 * Register Volt as a service
 */
$di->setShared('voltService', function ($view, $di) {
    $volt = new Volt($view, $di);

    $volt->setOptions(
        array(
            "compiledPath"      => "../views/cache/",
            "compiledExtension" => ".cache"
        )
    );

    return $volt;
});

/**
 * Sets the view component
 */
$di->setShared('view', function () use ($config) {
    $view = new View();
    $view->setViewsDir($config->application->viewsDir);
    //テンプレートエンジンVoltを有効にする
    $view->registerEngines(
        array(
            ".html" => "voltService"
        )
    );
    return $view;
});

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->setShared('url', function () use ($config) {
    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);
    return $url;
});

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->setShared('db', function () use ($config) {
    $dbConfig = $config->database->toArray();
    $adapter = $dbConfig['adapter'];
    unset($dbConfig['adapter']);

    $class = 'Phalcon\Db\Adapter\Pdo\\' . $adapter;

    return new $class($dbConfig);
});
