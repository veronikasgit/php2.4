<?php
session_start();

if (!isset($_SESSION['name']) && isset($_SERVER['PHP_AUTH_USER'])) {
	//проверка пароля и имени пользователя
	if ($_SERVER['PHP_AUTH_USER'] === 'andrey' && $_SERVER['PHP_AUTH_PW'] === '123123') {
		$_SESSION['name'] = $_SERVER['PHP_AUTH_USER'];
	}
}

if (!isset($_SESSION['name'])) {

		header('WWW-Authenticate: Basic realm = "Admin"');
		http_response_code(401);

	exit;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Ваш возраст</title>
</head>
<body>
	Привет, <?php echo $_SESSION['name'] ?>
</body>
</html>


<?php
/*$users = [
	'andrey' => [
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

echo $_SERVER['PHP_AUTH_USER'];
exit;

if (isset($users[$_SERVER['PHP_AUTH_USER']])) {
	echo "1";
	$_SESSION['roles'] = $users[$_SERVER['PHP_AUTH_USER']]['roles'];

	echo 'Ваш уровень доступа: ' . implode(', ', $_SESSION['roles']);
}
*/
?>