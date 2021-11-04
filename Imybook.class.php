<?php
interface Imybook{
//Добавляет новую запись в Гостевую книгу
    function saveLetter($gname, $letter);
//Выборка всех записей из Гостевой книги
    function showLetter();
//Удаление записи из Гостевой книги
    function deleteLetter($id);
    }

