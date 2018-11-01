<?php

$id = $_GET['key'];

$filelist = glob('tests/*.json');

if (isset($_GET['deleteid'])) {

    foreach ($filelist as  $key => $filename) {

        if ($key == $id) {  
            unlink($filename);
        } 

    }

}

session_start();

    if (isset($_SESSION['login']) && ($_SESSION['login'] === "guest")) {
        echo "Вы вошли как НЕавторизованный пользователь";
    } elseif (isset($_SESSION['login']) && ($_SESSION['login'] !== "guest")) {
        echo "Вы вошли как авторизованный пользователь";  
    } elseif (!isset($_SESSION['login'])) {
        http_response_code(403);
    }

?>

<!DOCTYPE>
<html lang="ru">
    <head>
    	<title>Домашнее задание к лекции 2.2</title>
    	<meta charset="utf-8">
    </head>
    <body>
    	
        <ol>
            
            <?php foreach ($filelist as $key => $filename): ?>

                <li><a href = "test.php?key=<?php echo $key; ?>"><?php  echo $filename . "<br>"; ?></a><a href = "list.php?deleteid=<?php echo $key; ?>">Удалить</a></li>

            <?php endforeach; ?>            
           
        </ol>  

        <?php if (isset($_SESSION['login']) && ($_SESSION['login'] !== "guest")): ?>
            <a href = "admin.php">Загрузить новый тест</a>
        <?php endif; ?>

	</body>
</html>


