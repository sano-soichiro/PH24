<?php
require_once './initial_setting.php';

//==================================
//●セッションが有効でない場合の処理
//==================================
if(count($_SESSION) == 0){
   header('location:./entry.php');
   exit;
}

//==================================
//●セッションの削除
//==================================

//ログインIDを変数へ退去する
if(isset($_SESSION["login_id"])){
   $_POST["login_id"] = $_SESSION["login_id"];
}

session_destroy();
//==================================
//●データベースから取得
//==================================
//--データベースに接続する
$link = mysqli_connect(HOST,USER_ID,PASSWORD,DB_NAME);
//--sqlを設定する
$sql = "select * from m_user where login_id = '".$_POST["login_id"]."'";
//--sqlを実行する
$result = db_run($link,$sql);
//フェッチ処理
$user_data = get_data($result);

//==================================
//●本登録用のURL
//==================================

$url = BASE_URL."03/def_entry.php?login_id=".$user_data[0]['hash_login_id'];

require_once './tpl/'.basename(__FILE__);
?>