<?php
session_start();

if (isset($_GET['age'])) {
	$_SESSION['age'] = $_GET['age'];
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Ваш возраст</title>
</head>
<body>
	<?php if (isset($_SESSION['age'])) : ?>
		Ваш возраст: <?php echo $_SESSION['age'] ?>
	<?php else: ?>
		<form action="primer2.php">
			Ваш возраст: <input type="text" name="age">
			<input type="submit" name="">
		</form>
	<?php endif; ?>
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