<?php
//Подключим файл с описанием класса mybook
include "mybook.class.php";
//Создадим объект gbook
$gbook=new mybook();
//Создадим переменную $errMessage со строковым значением ""
$errMessage="";
//проверим была ли отправлена HTML-форма
//Если ДА, то подключите файл с кодом для обработки HTML-формы
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include "saveletter.inc.php";
}
//Проверяем был ли запрос методом GET на удаление записи
// Если ДА, то подключаем файл с кодом для удаления записи
if(isset($_POST['del'])){
    include "deleteletter.inc.php";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>пример гостевой книги php</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <section id="content" class="container">
            		
                    <?php
                        include "showletter.inc.php";
                    ?>
                   <h2>Оставить отзыв</h2>
                   <?php
                    //Проверим, не является ли переменная $errMessage пустой строкой
                    //Если НЕТ, то выведите значение переменной $errMessage
                    if($errMessage){
                            echo "<p>".$errMessage;
                    }   
                    ?>
		  <form id="form1" name="form1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<table>
			<tbody><tr><td><p>Ваше имя</p></td><td><input type="text" name="gname"></td>
	      	</tr><tr>
		    <td><p>Ваш отзыв</p></td>
			<td>
		      <textarea name="letter" cols="40" rows="4"></textarea></td>
			</tr>
			
			<tr><td> </td><td>
			  <input type="submit" name="Submit" value="Оставить отзыв"></td>
			</tr>
			</tbody></table>
		  </form>
                  
</section>
    </body>
</html>

