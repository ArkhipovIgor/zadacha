<?php
if(isset($_POST["id"]))
{
    $conn = mysqli_connect("95.131.149.21", "web_ti2202", "81163425","d5202");
    if (!$conn) {
      die("Ошибка: " . mysqli_connect_error());
    }
    $userid = mysqli_real_escape_string($conn, $_POST["id"]);
    $sql = "DELETE FROM `publicat` WHERE id = '$userid'";
    if(mysqli_query($conn, $sql)){
         
        header("Location: edit.php");
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
    mysqli_close($conn);    
}
?>

