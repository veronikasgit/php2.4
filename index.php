<?php

session_start();

/*if (isset($_GET['action']) && ($_GET['action'] != "exit")) {
session_destroy();
header('WWW-Authenticate: Basic realm="admin"');
http_response_code(401);
	exit;
}*/
 
$file = file_get_contents(__DIR__ . '/login.json');
$json = json_decode($file, true);

if (!isset($_SERVER['PHP_AUTH_USER'])) {
	header('WWW-Authenticate: Basic realm="admin"');
	http_response_code(401);
	exit;
}

$userLogin = "";
foreach ($json as $users) {

	foreach ($users as $login => $user) {
		if ($login === $_SERVER['PHP_AUTH_USER']) {
			$userLogin = $login;
				$pass = $user['password'];
		} 
	}
}

if (($_SERVER['PHP_AUTH_USER'] === $userLogin) && ($_SERVER['PHP_AUTH_PW'] === $pass)) {
	$_SESSION['login'] = $_SERVER['PHP_AUTH_USER'];	
	header("Location: admin.php");		
} else {
	$_SESSION['login'] = "guest";
	header("Location: admin.php");
}

	


