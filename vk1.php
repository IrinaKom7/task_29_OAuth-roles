<?php
//session_start(); // Токен храним в сессии
 
include_once 'tmp/config_vk.php';

// Формируем ссылку для авторизации
// echo $clientId . "<br>" . $clientSecret . "<br>" . $redirectUri . "<br>";
// echo $_SESSION['vk_user_id'] . "<br>";

if(isset($_SESSION['vk_user_id'])) {

    echo "Вы уже авторизованы. Переходим на сайт";
	header("Location: tmp/hello.php"); 

} else {

	$params = array(
		'client_id'     => $clientId,
		'display'		=> 'popup',
		'redirect_uri'  => $redirectUri,
		'response_type' => 'code',
		'v'             => '5.126', // (обязательный параметр) версия API https://vk.com/dev/versions
	 
		// Права доступа приложения https://vk.com/dev/permissions
		// Если указать "offline", полученный access_token будет "вечным" (токен умрёт, если пользователь сменит свой пароль или удалит приложение).
		// Если не указать "offline", то полученный токен будет жить 12 часов.
		'scope'         => 'email,photos,offline',
	);

	// Выводим на экран ссылку для открытия окна диалога авторизации
	echo '<p><a href="http://oauth.vk.com/authorize?' . http_build_query( $params ) . '">Авторизация через ВКонтакте</a></p>';



}



 
