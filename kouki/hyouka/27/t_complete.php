<?php
session_start();
require_once './../../config.php';
require_once './function/function.php';

//指定の方法以外でこのページを開いた時の処理
if(!isset($_SESSION['mail'])){
    header("location: ./entry.php");
    exit;
}

// ハッシュ化されたログインID
$mail = $_SESSION['mail'];
session_destroy();


require_once './tpl/t_complete.php'; 
exit;