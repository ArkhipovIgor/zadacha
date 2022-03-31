<?php
include 'comments.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="utf-8">
<title>Посты</title>
<link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="style.css">
</head>

<a href="update.php">jjjjjjjjjj</a>


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

$size_page = 5;
$offset = ($pageno-1) * $size_page;

$pages_sql = "SELECT COUNT(*) FROM `messages`";
$result = mysqli_query($db, $pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $size_page);

?>






<?php
      //Если это запрос на обновление, то обновляем

      if (isset($_GET['red_id'])) {
        echo $_GET['red_id'];
        echo $_POST['Name'];
     echo $_GET['Price'];
     echo "не вывелось";
          $sql = mysqli_query($db, "UPDATE `publicat` SET `zagol` = '{$_POST['Name']}', `public` = '{$_POST['Price']}' WHERE `id`={$_GET['red_id']}");
      } 

      //Если вставка прошла успешно
      if ($sql) {
        echo '<p>Успешно!</p>';
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($db) . '</p>';
      }

?>




<div >

<h1>Редактирование постов</h1>
<a href="frame1.php">Назад</a>
<div >

<?php
$sql = "SELECT * FROM `publicat`" ;

$res_data = mysqli_query($db, $sql);
while($row = mysqli_fetch_array($res_data)){
  $userpost = $row["zagol"];
$userpub = $row["public"];
echo"<form  method='POST'>
<p><input type='text' class='form-control' name='Name' value='". $row["zagol"]."'>  </p>
<p><textarea class='form-control' name='Price' >$userpub</textarea></p>
<a href='?red_id={$row['id']}'>Изменить</a>
</form>
";

//echo "<td><a href='update.php?id=" . $row["id"] . "'>Редактировать</a></td>".'</br>';
echo"<td><form action='delete.php' method='post'>
                    <input type='hidden' name='id' value='" . $row["id"] . "' />
                        <input type='submit' value='Удалить'>

                </form></td>";

echo "</br>";

}

mysqli_close($db);
?>


</div>


  <form action="" method="post" name="form">
    <p class="is-h">Тема поста:<br> <input name="nam" type="text" class="is-input" id="author" required="required" /> </p>
    <p class="is-h">Публикация:<br><textarea name="post" rows="5" cols="20" id="message" required="required" /></textarea></p>
    <input name="js" type="hidden" value="no" id="js">
    <button type="submit" id='click' name="button" class="is-button">Добавить</button>
  </form>
  <div class="clear">



</body>
</html>