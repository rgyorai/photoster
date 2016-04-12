<?php

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

//API管理画面トップ
$app->get(ADMIN_ROOT_PATH.'index', function () use ($app) {
    echo $app['view']->render(ADMIN_ROOT_PATH.'index');
});

//新規登録API詳細
$app->get(ADMIN_ROOT_PATH.'register', function () use ($app) {
    echo $app['view']->render(ADMIN_ROOT_PATH.'register');
});

//ログインAPI詳細
$app->get(ADMIN_ROOT_PATH.'login', function () use ($app) {
    echo $app['view']->render(ADMIN_ROOT_PATH.'login');
});

//ユーザーAPI詳細
$app->get(ADMIN_ROOT_PATH.'users', function () use ($app) {
    echo $app['view']->render(ADMIN_ROOT_PATH.'users');
});

//フォトAPI詳細
$app->get(ADMIN_ROOT_PATH.'photos', function () use ($app) {
    echo $app['view']->render(ADMIN_ROOT_PATH.'photos');
});

//コメントAPI詳細
$app->get(ADMIN_ROOT_PATH.'comments', function () use ($app) {
    echo $app['view']->render(ADMIN_ROOT_PATH.'comments');
});