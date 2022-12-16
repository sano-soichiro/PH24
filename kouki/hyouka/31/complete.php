<?php

// 呼出
require_once '../../config.php';

session_start();
// 確認画面から遷移してない場合に登録画面に遷移する
if(!isset($_SESSION['complete'])){
    header("location:./entry.php");
    exit;
}

$hash_login_id = $_SESSION['hash_login_id'];

session_destroy();    
require_once './tpl/complete.php';

?>