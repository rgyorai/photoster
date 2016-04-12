<?php

use Phalcon\Http\Response;

//ログイン処理
$app->post(API_ROOT_PATH . 'login', function () use ($app) {

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
		$userdata = $users->findFirst("mail = '{$mail}'");

		//メールアドレスの存在チェック
		if(!$userdata) {
			throw new Exception('メールアドレスかパスワードが違います');
		}

		//パスワードがハッシュと一致しているか
		$check = password_verify($password ,$userdata->password);

		if($check) {
			//ユーザーIDをトークン化して渡す
			$app->session->regenerateId();
			$app->session->set('auth', $userdata->id);
			$response->setJsonContent(
				array(
					'token' => $app->session->getId()
				)
			);
		} else {
			throw new Exception('メールアドレスかパスワードが違います');
		}

	} catch (Exception $e) {
		$response->setStatusCode(400, "Bad Request");
		$response->setContent($e->getMessage());
		return $response;
	}

	return $response;
});
