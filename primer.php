<?php

$users = [
	'rwgtfrt' => [
		'password' => '123123',
		'roles' => ['admin']
	]
];

session_start();

if (!isset($_SERVER['PHP_AUTH_USER'])) {
	header('WWW-Authenticate: Basic realm = "Admin"');
	http_response_code(401);

	exit;
}

if (isset($users[$_SERVER['PHP_AUTH_USER']])) {
	$_SESSION['roles'] = $users[$_SERVER['PHP_AUTH_USER']]['roles'];

	echo 'Ваш уровень доступа: ' . implode(', ', $_SESSION['roles']);
}

