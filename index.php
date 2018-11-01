<?php

session_start();

$file = file_get_contents(__DIR__ . '/login.json');
$json = json_decode($file, true);


if (!isset($_SERVER['PHP_AUTH_USER'])) {
	header('WWW-Authenticate: Basic realm="login please"');
	http_response_code(401);
	exit;
}

foreach ($json as $users) {

	foreach ($users as $login => $user) {
//$res = array_search($_SERVER['PHP_AUTH_USER'], $users);
//echo $res;
		if ($login == $_SERVER['PHP_AUTH_USER']) {
			if ($_SERVER['PHP_AUTH_PW'] === $user['password']) {
				$_SESSION['login'] = $_SERVER['PHP_AUTH_USER'];	
				echo $_SESSION['login'] . ' ' . $user['password'];
			} else {
				$_SESSION['login'] = "guest1";	
				echo $_SESSION['login'] ;
			}
		} elseif (!isset($_SERVER['PHP_AUTH_PW'])) {
				echo "Введите имя";
		} 
	}
}exit;
		/*if (($_SERVER['PHP_AUTH_USER'] === $login) && ($_SERVER['PHP_AUTH_PW'] === $user['password'])) {
				
			//header("Location: admin.php");
			$_SESSION['login'] = $_SERVER['PHP_AUTH_USER'];			
			echo $_SERVER['PHP_AUTH_USER'] . '<br>';
			echo $login . '<br>';
			echo $_SERVER['PHP_AUTH_PW'] . '<br>';
			echo $user['password'] . '<br>';
echo '<br>';
		} elseif (($_SERVER['PHP_AUTH_USER'] !== $login) || ($_SERVER['PHP_AUTH_USER'] === $login) && ($_SERVER['PHP_AUTH_PW'] !== $user['password'])) {
			echo $_SERVER['PHP_AUTH_USER'] . '<br>';
			echo $login . '<br>';
			echo $_SERVER['PHP_AUTH_PW'] . '<br>';
			echo $user['password'] . '<br>';
			$_SESSION['login'] = "guest";
			echo '<br>';
			echo '<br>';
			//header("Location: admin.php");
		} 
	
	}

}*/
