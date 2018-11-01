<?php



$filelist = glob('tests/*.json');

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    foreach ($filelist as  $key => $filename) {

        if ($key == $id) {  
            unlink($filename);
        } 

    }

}

if ( (isset($_GET['action'])) and ($_GET['action'] == "exit") )
{
    unset($_SERVER["PHP_AUTH_USER"]);
    unset($_SERVER["PHP_AUTH_PW"]);
}
 
if ( isset($_SERVER["PHP_AUTH_USER"])
     and ($_SERVER["PHP_AUTH_USER"] == "login")
     and ($_SERVER["PHP_AUTH_PW"] == "pass") )
{
    echo "<p >Вы вошли в защищенную зону</p>";
    echo "<p ><a href='auth2.php'>Следующая страница</a></p>";
    echo "<p ><a href='auth.php?action=exit'>Выйти</a></p>";
}
else
{
    Header("WWW-Authenticate: Basic realm=\"Защищенная зона\"");
    Header("HTTP/1.0 401 Unauthorized");
    // Если пользователь нажал кнопку "Отмена"
    exit("<p >Нет доступа</p>");
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

                <li>
                    <a href = "test.php?key=<?php echo $key; ?>"><?php  echo $filename . "<br>"; ?></a>

                    <?php if (isset($_SESSION['login']) && ($_SESSION['login'] !== "guest")):?>
                        <a href = "list.php?deleteid=<?php echo $key; ?>">Удалить</a>
                    <?php endif; ?>
                </li>

            <?php endforeach; ?>            
           
        </ol>  

        <?php if (isset($_SESSION['login']) && ($_SESSION['login'] !== "guest")): ?>
            <a href = "admin.php">Загрузить новый тест</a>
        <?php endif; ?>

	</body>
</html>


