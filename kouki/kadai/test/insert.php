<?php
require_once '../../const.php';
$link = mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
mysqli_set_charset($link,'utf-8');
for($i=0;$i<50;$i++){
    mysqli_query($link,"INSERT INTO m_book (title , volume , price , release_date , purchase_date , del_date) VALUES ('BREACH' , 114 , 900 , '2000-02-02' , '2011-02-02' , NULL);");

}
mysqli_close($link);
?>