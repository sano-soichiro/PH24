<?php
require_once '../../const.php';

// 必要項目の取得
$id = $_GET['id'];

$link = mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
mysqli_set_charset($link , 'utf8');
$result = mysqli_query($link , "SELECT * FROM sample2 WHERE id = " . $id);
$row = mysqli_fetch_assoc($result);
mysqli_close($link);

require_once './tpl/detail.php';
?>