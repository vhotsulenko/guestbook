<?php
//подключаем файл с интерфейсом
include "Imybook.class.php";
include "Iprint.class.php";
//созд. класс mybook наследующий интерфейс Imybook
class mybook implements Imybook, Iprint{
//созд. константу класса DB_NAME и присваиваем ей значение mybook.db
    const  DB_NAME='mybook.db';
//созд. закрытое свойство $_db для хранения объекта соединения с БД 
    private $_db;
//созд. конструктор, в котором подключ. к БД
    function __construct(){
//проверим существует ли БД
//если БД нет то создадим её и таблицу в ней letters
        if(!file_exists(self::DB_NAME)){
            $this->_db=new SQLite3(self::DB_NAME);
            $sql="CREATE TABLE letters(
                id INTEGER PRIMARY KEY,
                gname TEXT,
                letter TEXT,
                
                datetime INTEGER
            )";
            $this->_db->query($sql);
        }else{
//если бд есть то просто подключ. к ней
            $this->_db=new SQLite3(self::DB_NAME);
        }
    }
//созд. деструктор, в котором откл. от БД
    function __destruct(){
        unset($this->_db);
    }
    
    function  saveLetter($gname, $letter){
        //Получим данные о текущих дате и времени
            $dt=time();
        //Сформируем строку запроса на добавление новой записи
            $sql="INSERT INTO letters (gname ,letter, datetime)
                  VALUES('$gname', '$letter', '$dt')";
	    $this->_db->query($sql);
            return $errMessage="запись добавлена";
    }
    function showLetter(){
    //формируем строку запроса на выборку всех данных из таблицы letters
    //в обратном порядке
        $sql="SELECT id, gname, letter, datetime FROM letters 
        ORDER BY id DESC";
    //Получаем и возвращаем результат запроса
            $res=$this->_db->query($sql);
            $array = array();
            while($data = $res->fetchArray(SQLITE3_ASSOC))
            {
                 $array[] = $data;
            }
            return $array;
    }
    function deleteLetter($id){
        $sql = "DELETE FROM letters WHERE id=$id";
        $this->_db->query($sql);
    }
    function printLetter($id){
        $file = 'text.txt';
        $sql="SELECT id, gname, letter, datetime FROM letters 
        WHERE id = $id";
        $res=$this->_db->query($sql);
        $res->save( "php://output");
       // if (file_exists($file)) { так как создает
        file_put_contents($file, $res);
      //  }
       // <script type="text/javascript">window.print();</script>
    }

}

