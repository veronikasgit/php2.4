<?php

if(isset($_POST['button'])) {
	if (!empty($_FILES) && array_key_exists('test', $_FILES)) {
	
		$f_type = $_FILES['test']['type'];
	
		if ($f_type === "application/json")	 {
			$hash = ($_FILES['test']['name'].time());
			move_uploaded_file($_FILES['test']['tmp_name'], "./tests/$hash.json");
	        header('Location: list.php');	 
	        exit;
		} elseif ($f_type !== "application/json") {
			echo "Неверный формат файла! Попробуйте еще раз!";
		}

	} 
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Lesson</title>
</head>
<body>

<form action="" method="POST" enctype="multipart/form-data">
	
	<div>Тест</div>
	<div><input type="file" name="test"></div>

	<input type="submit" name="button">
</form>

<p><a href = "list.php">Перейти к списку тестов</a></p>
</body>
</html>