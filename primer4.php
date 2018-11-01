<?php 

if (!isset($_SERVER['PHP_AUTH_USER'])) {
	header('WWW-Authenticate: Basic realm="login please"');
	http_response_code(401);
	exit;
} 
	
session_start();

if ($_SERVER['PHP_AUTH_USER'] === 'adewf' && $_SERVER['PHP_AUTH_PW'] === 'dsfsds') {

	header("Location: admin.php");
	$_SESSION['login'] = $_SERVER['PHP_AUTH_USER'];
	//$_SESSION['pass'] = $_SERVER['PHP_AUTH_PW'];
} 

if (!isset($_SERVER['PHP_AUTH_PW']) || ($_SERVER['PHP_AUTH_PW'] !== 'dsfsds')) {
	$_SESSION['login'] = "guest";
	header("Location: admin.php");
}

?>