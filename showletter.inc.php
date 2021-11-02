<?php
//Вызовем метод showLetter, результат сохраним в $allletters
$allletters=$gbook->showLetter();
//Используя цикл, выведите в браузер все сообщения
if(count ($allletters)>0){
    foreach($allletters as $row){
        $id=$row['id'];
        $gname=$row['gname'];
        $letter=$row['letter'];
        @$dt=date("d-m-Y H:i:s", $row['datetime']*1);
    ?>
    <div class="quote">
        <div class="quote-icon">
                <div class="icon-img" style="background-color: #ff3333"></div>
        </div>

        <div class="quote-content">
                <p class="droid"><strong><?php echo $gname ?></strong><span class="data"><?php echo @$dt ?></span><br><?php echo $letter ?></p>
        </div>
        <div class="quote-close">
            <a href="mybook.php?del=<?php echo $id ?>"><img src="close.png" alt=""></a>
        </div>
    </div>
    <div class="clear"></div>
    <?php 
    }    
}
    ?>