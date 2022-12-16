<?php

// 呼出
require_once '../../config.php';


if(!isset($_COOKIE['id'])){
    header('location:./entry.php');
    exit;
}



$link = mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME);
if(!$link){
    mysqli_close($link);
    exit;
}

$id = $_COOKIE['id'];
$main_sql = "SELECT * FROM m_user WHERE id = '" . $id . "'";
$result = mysqli_query($link,$main_sql);

$list = [];
while($row = mysqli_fetch_assoc($result)){
$list[] = $row;
}

if($list[0]['user_state'] == 0){
    header('location:./entry.php');
    exit;
}

$name = $list[0]['name'];
$file_name = $list[0]['file_name'];

// 全件数
$show = 5;
$count_sql = "SELECT COUNT(*) FROM m_news";
mysqli_set_charset($link,'utf8');
$count_list = mysqli_query($link,$count_sql);
$count_row = mysqli_fetch_assoc($count_list);
$count_row = $count_row['COUNT(*)'];
$pager_count_num = $count_row / $show;
$pager_count_num = ceil($pager_count_num);
 
//aタグを押された時の処理
if(isset($_GET['pager_link'])){

//予期せぬパラメータを入力された処理
if($_GET['pager_link'] <= 0 || $_GET['pager_link'] > $pager_count_num){
    header("location:./index.php?pager_link=1");
    exit;
}
$row_max = $_GET['pager_link'] * $show;
$row_start = $row_max - $show;
$pager_block = $row_start + 1;
}else{
    $_GET['pager_link'] = 1;
    $row_start = 0;
    $pager_block = $row_start + 1;
}

$arrow_left = '';
$arrow_right = '';
$range = 2;
$pager_start = $_GET['pager_link'] - $range;
$pager_max = $_GET['pager_link'] + $range;
$next = $_GET['pager_link'] + 1;
$back = $_GET['pager_link'] - 1;

//最初のページ
if($_GET['pager_link'] <= 3){
    if($_GET['pager_link'] == 1){
    $arrow_left = 'non';
    }
    $pager_start = 1;
    $pager_max = $pager_start + 4;
// 最後のページの1つ前の処理
}elseif($_GET['pager_link'] == $pager_count_num - 1){
    $pager_start = $pager_count_num - 4;
    $pager_max = $pager_count_num;
// 最後のページの処理
}elseif($_GET['pager_link'] >= $pager_count_num){
    if($_GET['pager_link'] == $pager_count_num){
    $arrow_right = 'non';
    }
    $pager_start = $pager_count_num - 4;
    $pager_max = $pager_count_num;
}

//表示するページ数を配列に入れる
$normal_class = '';
$nownow_class = 'block';

$j = 0;
for($i = 0;$i <= $pager_count_num;$i++){
    $pager_list[$i][0] = $j;
    $pager_list[$i][1] = $normal_class;
    $j++;
}

$pager_list[$_GET['pager_link']][1] =  $nownow_class;
$limit_sql =" LIMIT " . " $row_start " . " , 5";
$main_sql = "SELECT * FROM m_news ORDER BY created_at DESC";
$result = mysqli_query($link,$main_sql.$limit_sql);
$list = [];
while($row = mysqli_fetch_assoc($result)){
$list[] = $row;
}

mysqli_close($link);

// ログアウトボタンを押された時の処理
if(isset($_POST['logout'])){
    setcookie('id',$id,time() - 60 * 60 * 48);
    header('location:./login.php');
    exit;
}

require_once './tpl/index.php';
?>