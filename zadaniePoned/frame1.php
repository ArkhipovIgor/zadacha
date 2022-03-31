
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">  
		<title>Посты</title>

	<h1>Посты</h1> 

<a href="edit.php" >Добавить/редактировать пост</a>
    
	</head>




 <?php

        $server = '95.131.149.21'; // Имя или адрес сервера
        $user = 'web_ti2202'; // Имя пользователя БД
        $password = '81163425'; // Пароль пользователя
        $db = 'd5202'; // Название БД

        $db = mysqli_connect($server, $user, $password, $db); // Подключение
        // Check connection
        // Проверка на подключение
        if (!$db) {
            // Если проверку не прошло, то выводится надпись ошибки и заканчивается работа скрипта
            echo "Не удается подключиться к серверу базы данных!"; 
            exit;
        }

// Поверка, есть ли GET запрос
        if (isset($_GET['pageno'])) {
             // Если да то переменной $pageno присваиваем его
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }

        $size_page = 100;
        $offset = ($pageno-1) * $size_page;

        $pages_sql = "SELECT COUNT(*) FROM `publicat`";
        $result = mysqli_query($db, $pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $size_page);
    ?>

<body>

<div >
		
 
                           <h3>
				
<?php
		$sql = "SELECT * FROM `publicat` ORDER BY `id`  DESC  LIMIT $offset, $size_page" ;
        $res_data = mysqli_query($db, $sql);
        while($row = mysqli_fetch_array($res_data)){

        echo $row ['zagol']. '</br> ';
        echo mb_substr($row['public'],0,300);
        echo '<a href="polpost.php?id='.$row['id'].'"> Read more</a>'.'</br> ';    
        echo '</br>';
        }
        mysqli_close($db);
?>
        
                            </h3>
 </div>




	</body>
</html>

