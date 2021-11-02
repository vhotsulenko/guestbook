<?php
//фильтруем получ. данные
$id=abs((int)$_GET['del']);
//Проверьте, корректны ли полученные данные
if($id){
    //вызовем метод deletePost
     $gbook->deleteLetter($id);
    // Перезапрашиваем страницу, чтобы избавиться от информации, 
    //переданной через форму
    header('Location: mybook.php');
    exit;
}else{
    $errMessage="хватит меня ломать!";
}