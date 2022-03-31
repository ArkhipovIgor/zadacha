<script type="text/javascript">
$(function() {
    $("#send").click(function(){ // При нажатии на кнопку
      var author = $("#author").val(); // Получаем имя автора комментария
      var message = $("#message").val(); // Получаем само сообщение
      $.ajax({ // Аякс
        type: "POST", // Тип отправки "POST"
        url: "sendMessage.php", // Куда отправляем(в какой файл)
        data: {"author": author, "message": message}, // Что передаем и под каким значением 
        cache: false, // Убираем кеширование
        success: function(response){ // Если все прошло успешно
          var messageResp = new Array('Ваше сообщение отправлено','Сообщение не отправлено Ошибка базы данных','Нельзя отправлять пустые сообщения');
          var resultStat = messageResp[Number(response)];
          if(response == 0){ 
            $("#author").val("");
            $("#message").val("");
            $("#commentBlock").append("<div class='comment'>Автор: <strong>"+author+"</strong><br>"+message+"</div>");}
            $("#resp").text(resultStat).show().delay(1500).fadeOut(800);}});return false;});});
</script>