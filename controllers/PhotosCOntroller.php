<?php

//フォト一覧の取得
$app->get(API_ROOT_PATH . 'photos', function ($page) {
	//投稿取得処理
	$photos = Photos::find(array('order' => 'created DESC'));
	$data = $photos;
	echo json_encode($data);
});

//フォトの取得
$app->get(API_ROOT_PATH . 'photos/{pid:[0-9]+}', function ($pid) {
	//投稿取得処理
	echo json_encode($data);
});

//フォトの投稿
$app->post(API_ROOT_PATH . 'photos', function () {
	$data = array('test', 'hoge');
	echo json_encode($data);
});