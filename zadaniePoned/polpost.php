
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="utf-8">
<title>Посты</title>
<link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="style.css">
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

$size_page = 5;
$offset = ($pageno-1) * $size_page;

$pages_sql = "SELECT COUNT(*) FROM `messages`";
$result = mysqli_query($db, $pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $size_page);

?>







<div >

<h1>Полные посты</h1>
<div >

<?php

$sql = "SELECT * FROM `publicat` WHERE `id` = {$_GET['id']}" ;

$res_data = mysqli_query($db, $sql);
while($row = mysqli_fetch_array($res_data)){
echo $row ['zagol']. '</br> ';
echo $row['public']. '</br> ';
echo '</br>';
}







mysqli_close($db);
?>


  </div>

  <p>Комментарии к статье</p>


 <div id="commentBlock">
<?php
$link = mysqli_connect("95.131.149.21", "web_ti2202", "81163425","d5202");
              $sql = mysqli_query($link, 'SELECT `author`, `message`, `date` FROM `messages`'); /*Получаем все данные из таблицы*/
           while ($result = mysqli_fetch_array($sql)) {


 echo "<div class='comment' style='border: 1px solid gray; margin-top: 1%; border-radius: 5px; padding: 0.5%;'>Автор:<strong> {$result['author']}:</strong><br> {$result['message']} </div> ";
  }
  
          ?>



  </div>

  <form action="sendMessage.php" method="post" name="form">
    <p class="is-h">Автор:<br> <input name="author" type="text" class="is-input" id="author"></p>
    <p class="is-h">Текст сообщения:<br><textarea name="message" rows="5" cols="50" id="message"></textarea></p>
    <input name="js" type="hidden" value="no" id="js">
    <button type="submit" id='click' name="button" class="is-button">Отправить</button>
  </form>
  <div class="clear">



</body>
</html>