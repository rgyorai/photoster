<?php

define('ADMIN_ROOT_PATH', '/admin/');

/**
 * Views直下のページ
 */

//トップ
$app->get('/', function () use ($app) {
    echo $app['view']->render('index');
});

//Not found
$app->notFound(function () use ($app) {
    $app->response->setStatusCode(404, "Not Found")->sendHeaders();
    echo $app['view']->render('404');
});

/**
 * 管理画面のページ
 */

//管理画面トップ
$app->get(ADMIN_ROOT_PATH.'index', function () use ($app) {
    echo $app['view']->render(ADMIN_ROOT_PATH.'index');
});

//新規登録
$app->get(ADMIN_ROOT_PATH.'register', function () use ($app) {
    echo $app['view']->render(ADMIN_ROOT_PATH.'register');
});
