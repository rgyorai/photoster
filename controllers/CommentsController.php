<?php

//コメント一覧の取得
$app->get(API_ROOT_PATH . 'comments/{pid:[0-9]+}', function ($pid) {
	//投稿取得処理
	echo json_encode($data);
});

//コメントの投稿
$app->post(API_ROOT_PATH . 'comments/{pid:[0-9]+}', function ($pid) {
	$data = array('test', 'hoge');
	echo json_encode($data);
});