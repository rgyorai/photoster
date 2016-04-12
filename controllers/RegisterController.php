<?php

use Phalcon\Http\Response;

//新規登録処理
$app->post(API_ROOT_PATH . 'register', function () use ($app) {

	//リクエストデータの取得
	$mail 	  = $app->request->getPost('mail', "email");
	$password = $app->request->getPost('password', "string");

	$response = new Response();

	try {
		//パラメーターチェック
		if(!$mail || !$password) {
			throw new Exception('パラメーターが不足しています');
		}

		$users = new Users();

		//メールアドレスの重複チェック
		if($users->findFirst("mail = '{$mail}'")) {
			throw new Exception('重複データが存在します');
		}

		//新規登録処理
		$status = $users->save(
			array(
				'mail' 	   => $mail,
				'password' => password_hash($password, PASSWORD_BCRYPT),
				'nickname' => 'ななしさん',
				'created'  => date('Y-m-d H:i:s')
			)
		);

		//成否確認
		if($status) {
			$response->setJsonContent(
				$users->findFirst("mail = '{$mail}'")
			);
		} else {
			throw new Exception('DBの更新に失敗しました');
		}

	} catch (Exception $e) {
		$response->setStatusCode(400, "Bad Request");
		$response->setContent($e->getMessage());
		return $response;
	}

	return $response;
});