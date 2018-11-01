<?php
session_start();
//echo $_GET['action'];
//echo $_SERVER['PHP_AUTH_USER'];

if (isset($_GET['action']) && ($_GET['action'] != "exit")) {
session_destroy();
header('WWW-Authenticate: Basic realm="admin"');
http_response_code(401);
	exit;
}
 

$file = file_get_contents(__DIR__ . '/login.json');
$json = json_decode($file, true);

if (!isset($_SERVER['PHP_AUTH_USER'])) {
	header('WWW-Authenticate: Basic realm="admin"');
	http_response_code(401);
	exit;
}
//echo($_SERVER['PHP_AUTH_USER']);
$userLogin = "";
foreach ($json as $users) {

	foreach ($users as $login => $user) {
		//echo $login . '<br>';
		if ($login === $_SERVER['PHP_AUTH_USER']) {
			$userLogin = $login;
			//echo $userLogin. '<br>';
				$pass = $user['password'];
		} 
	}
}
//echo $userLogin;
//echo $pass;exit;

if (($_SERVER['PHP_AUTH_USER'] === $userLogin) && ($_SERVER['PHP_AUTH_PW'] === $pass)) {
	$_SESSION['login'] = $_SERVER['PHP_AUTH_USER'];	
	header("Location: admin.php");		
} else {
	$_SESSION['login'] = "guest";
	header("Location: admin.php");
}
	



/*&& ($_SERVER['PHP_AUTH_PW'] !== $pass)) || ($_SERVER['PHP_AUTH_USER'] !== $userLogin) || (!isset($_SERVER['PHP_AUTH_PW']))) {
		echo "НеВерно"	;
	//echo $_SERVER['PHP_AUTH_USER'] . '<br>';
	//echo $userLogin . '<br>';
	//echo $_SERVER['PHP_AUTH_PW'] . '<br>';
	//echo $pass . '<br>';
	$_SESSION['login'] = "guest";
	echo '<br>';
	echo '<br>';
	//header("Location: admin.php");
} 

/*if (($_SERVER['PHP_AUTH_USER'] === $userLogin) && ($_SERVER['PHP_AUTH_PW'] === $pass)) {
		
	header("Location: admin.php");
	$_SESSION['login'] = $_SERVER['PHP_AUTH_USER'];		
	/*echo '<br>' . "Верно" . '<br>';
	echo $_SERVER['PHP_AUTH_USER'] . '<br>';
	echo $login . '<br>';
	echo $_SERVER['PHP_AUTH_PW'] . '<br>';
	echo $user['password'] . '<br>';
echo '<br>';
} elseif ((($_SERVER['PHP_AUTH_USER'] === $userLogin) && ($_SERVER['PHP_AUTH_PW'] !== $pass)) || ($_SERVER['PHP_AUTH_USER'] !== $userLogin) || (!isset($_SERVER['PHP_AUTH_PW']))) {
		echo "НеВерно"	;
	//echo $_SERVER['PHP_AUTH_USER'] . '<br>';
	//echo $userLogin . '<br>';
	//echo $_SERVER['PHP_AUTH_PW'] . '<br>';
	//echo $pass . '<br>';
	$_SESSION['login'] = "guest";
	echo '<br>';
	echo '<br>';
	//header("Location: admin.php");
} */
	
	


