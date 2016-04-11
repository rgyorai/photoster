<?php

define('API_VERSION', 'v1');
define('API_ROOT_PATH', '/api/'.API_VERSION.'/');

//新規登録API
$app->post(API_ROOT_PATH . 'register', function () {
	//新規登録処理
	$data = array('test', 'hoge');
	echo json_encode($data);
});

//ログインAPI
$app->post(API_ROOT_PATH . '/login', function () {
	//ログイン処理
	$data = array('test', 'hoge');
	echo json_encode($data);
});

//アップロードAPI
$app->post(API_ROOT_PATH . '/upload', function () {
	//アップロード処理
	$data = array('test', 'hoge');
	echo json_encode($data);
});

//ギャラリー取得API
$app->get(API_ROOT_PATH . '/gallery/{page:[0-9]+}', function ($page) {
	//投稿取得処理
	$photos = Photos::find(array('order' => 'created DESC'));
	$data = $photos;
	echo json_encode($data);
});

//写真削除API
$app->delete(API_ROOT_PATH . '/photo/{id:[0-9]+}', function ($id) {
	//投稿削除処理
	$data = array('test', 'hoge');
	echo json_encode($data);
});

//プロフィール変更API
$app->put(API_ROOT_PATH . '/profile', function () {
	//ニックネーム変更処理
	$data = array('test', 'hoge');
	echo json_encode($data);
});