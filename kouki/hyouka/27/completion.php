<?php
session_start();

// 指定の方法以外できた時に飛ばす処理
if(!isset($_SESSION['com'])){
    header("location: ./entry.php");
    exit;
}

session_destroy();

// 表示する画面
require_once './tpl/completion.php';
exit;