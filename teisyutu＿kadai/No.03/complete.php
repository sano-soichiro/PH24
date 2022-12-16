<?php
require_once './../../const.php';
session_start();
$row = '';
$list = [];
$comp_msg = '';

// 登録内容の取得
$id = $_SESSION['id'];
$name = $_SESSION['name'];
$age = $_SESSION['age'];
$ext = $_SESSION['ext'];

$_SESSION['id'] = '';
$_SESSION['name'] = '';
$_SESSION['age'] = '';
$_SESSION['ext'] = '';


// 全件取得
$link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
mysqli_set_charset($link , 'utf8');
$result = mysqli_query($link , "SELECT id , name , age , ext FROM sample2");
$row = mysqli_fetch_assoc($result);
while(!is_null($row)){
    $list[] = $row;
    $row = mysqli_fetch_assoc($result);
}
mysqli_close($link);

// 登録ページから訪れた場合のみに必要メッセージの作成
if($id != '' && $name != '' && $age != '' && $ext != ''){
    $comp_msg = '以下の内容で登録しました';
    $name = $name . '様';
    $age = $age . '歳';
}

require_once './tpl/complete.php';
?>