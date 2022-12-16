<?php
require_once './initial_setting.php';

//データベースに接続する
$link = mysqli_connect(HOST,USER_ID,PASSWORD,DB_NAME);
//sqlを設定する
$sql = "select * from m_news where id = ".$_GET['id'];
//sqlを実行する
$result = db_run($link,$sql);
//フェッチ処理
$news = get_data($result);

require_once './tpl/'.basename(__FILE__);
?>