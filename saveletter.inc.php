<?php
//Проверим, была ли корректным образом отправлена HTML-форма
//для этого напишем функцию clearDate, вставим её в наш класс
//gbook, теперь это будет метод класса и вызывается соответственно
function clearDate($date){
    $date=stripslashes($date);
    $date=strip_tags($date);
    $date=trim($date);
    return $date;
}
//Проверим, была ли корректным образом отправлена HTML-форма
//Если НЕТ, то присвоим переменной $errMessage строковое значение 
//"Заполните все поля формы!"
//для начала прогоним получ. данные через clearDate
$gname=clearDate($_POST['gname']);
$letter=clearDate($_POST['letter']);
if(!empty($gname) && !empty($letter)){
    //вызовем метод saveletter
     if($gbook->saveLetter($gname, $letter)){
    // Перезапрашиваем страницу, чтобы избавиться от информации, 
    //переданной через форму
        header('Location: mybook.php');
     }else{
        $errMessage="Произошла ошибка при добавлении сообщения";
     }
}else{
    $errMessage="Заполните все поля формы!";
}
