<?php
$link = mysqli_connect('localhost','root','','ph23_sample');
mysqli_set_charset($link,'utf8');
mysqli_query($link,"INSERT INTO sample(name,age)VALUES('nagai',45)");
mysqli_close($link);
?>