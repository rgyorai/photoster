<?php

use Phalcon\Http\Response;

//ユーザー情報取得
$app->get(API_ROOT_PATH . 'users', function() use ($app) {

	$response = new Response();

	try {
		//ログイン認証
		if(!$app->session->has('auth')) {
			throw new Exception('ユーザー認証に失敗しました');
		}

		$users = new Users();

		//ユーザー情報を取得
		$userdata = $users->findFirst($app->session->get('auth'));

		//成否確認
		if($userdata) {
			$response->setJsonContent(
				array(
					'id' 	   => $userdata->id,
					'mail' 	   => $userdata->mail,
					'nickname' => $userdata->nickname,
					'created'  => $userdata->created
				)
			);
		} else {
			throw new Exception('データの取得に失敗しました');
		}

	} catch (Exception $e) {
		$response->setStatusCode(400, "Bad Request");
		$response->setContent($e->getMessage());
		return $response;
	}

	return $response;
});

//ユーザー情報変更
$app->put(API_ROOT_PATH . 'users', function() use ($app) {

	//リクエストデータの取得
	$mail 	  = $app->request->getPut('mail', "email");
	$nickname = $app->request->getPut('nickname', "string");

	$response = new Response();

	try {
		//ログイン認証
		if(!$app->session->has('auth')) {
			throw new Exception('ユーザー認証に失敗しました');
		}

		//パラメーターチェック
		if(!$mail && !$nickname) {
			throw new Exception('パラメーターが不足しています');
		}

		$users = new Users();

		//ユーザー情報を取得
		$userdata = $users->findFirst($app->session->get('auth'));

		//更新処理
		if($userdata) {
			$update = false;

			//データに変更があるかどうかチェック
			if($mail && !($userdata->mail == $mail)) {
				$userdata->mail = $mail;
				$update = true;
			}
			if($nickname && !($userdata->nickname == $nickname)) {
				$userdata->nickname = $nickname;
				$update = true;
			}

			if($update) {
				//DB更新
				if($userdata->save() == false) {
					throw new Exception('データの更新に失敗しました');
				}

				$response->setJsonContent(
					array(
						'id' 	   => $userdata->id,
						'mail' 	   => $userdata->mail,
						'nickname' => $userdata->nickname
					)
				);
			} else {
				throw new Exception('既に同じデータが登録されています');
			}
		} else {
			throw new Exception('データの取得に失敗しました');
		}

	} catch (Exception $e) {
		$response->setStatusCode(400, "Bad Request");
		$response->setContent($e->getMessage());
		return $response;
	}

	return $response;
});

//ユーザー情報削除(退会)
$app->delete(API_ROOT_PATH . 'users', function() use ($app) {

	$response = new Response();

	try {
		//ログイン認証
		if(!$app->session->has('auth')) {
			throw new Exception('ユーザー認証に失敗しました');
		}

		$users = new Users();

		//ユーザー情報を取得
		$userdata = $users->findFirst($app->session->get('auth'));

		//成否確認
		if($userdata) {
			if($userdata->delete() == false) {
				throw new Exception('データの削除に失敗しました');
			}

			//セッションの破棄
			$app->session->destroy();
			
			$response->setJsonContent(
				array(
					'id' 	   => $userdata->id,
					'mail' 	   => $userdata->mail
				)
			);
		} else {
			throw new Exception('ユーザーが存在しません');
		}

	} catch (Exception $e) {
		$response->setStatusCode(400, "Bad Request");
		$response->setContent($e->getMessage());
		return $response;
	}

	return $response;
});