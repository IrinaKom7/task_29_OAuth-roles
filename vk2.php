<?php
session_start();

include_once 'tmp/config_vk.php';

//echo $clientId . "<br>" . $clientSecret . "<br>" .  $redirectUri . "<br>";
$params = array(
		'client_id'     => $clientId,
		'client_secret' => $clientSecret,
		'code'          => $_GET['code'],
		'redirect_uri'  => $redirectUri
	);
 
	if (!$content = @file_get_contents('https://oauth.vk.com/access_token?' . http_build_query($params))) {
		$error = error_get_last();
		$log->error('HTTP request failed. Error: ' . $error['message']);
		$_SESSION['acl'] = 'NotAuth';
		throw new Exception('HTTP request failed. Error: ' . $error['message']);
	}
 
	$response = json_decode($content);
 
	// Если при получении токена произошла ошибка
	if (isset($response->error)) {
		$log->error('При получении токена произошла ошибка. Error: ' . $response->error . '. Error description: ' . $response->error_description);
		$_SESSION['acl'] = 'NotAuth';
		throw new Exception('При получении токена произошла ошибка. Error: ' . $response->error . '. Error description: ' . $response->error_description);
	}
 //А вот здесь выполняем код, если все прошло хорошо
	$token = $response->access_token; // Токен
	$expiresIn = $response->expires_in; // Время жизни токена
	$user_id = $response->user_id; // ID авторизовавшегося пользователя
	$email = $response->email;
 
	// Сохраняем токен в сессии
	$_SESSION['token'] = $token;
	// echo "<br>" . $token . "<br>";
	// var_dump($response);
	// echo "<br>" ;
	
	$request_params = array(
		'user_id' => $user_id,
		'fields' => 'first_name,last_name,bdate,contacts',
		'v' => '5.52',
		'access_token' => $token
		);
	$get_params = http_build_query($request_params);
	$content = json_decode(file_get_contents('https://api.vk.com/method/users.get?'. $get_params));
	//var_dump($result);
	//echo $token . " WWW<br>"; 
	// var_dump($content['response']); echo "WWW<br>";
	//var_dump($content); echo "WWW<br>";

	if (isset($content->response[0]->id)) {
		$userInfo = $content->response[0];
		//var_dump($userInfo); echo "WWW<br>";
		$_SESSION['vk_user_id'] = $userInfo->id;
		$_SESSION["isauth"] = true;
		$_SESSION['acl'] = 'VKUser';

		// header("Location: tmp/hello.php");
		header("Location: index.php");
	}
	else {
		$log->error('Error appeared while reciving VK $userInfo->id');
		$_SESSION['acl'] = 'NotAuth';

		throw new Exception('Error appeared while reciving VK $userInfo->id');

	}
