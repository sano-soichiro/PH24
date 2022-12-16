<?php
require_once '../../const.php';
require_once './function/function.php';

$title = ''; $volume = ''; $price = ''; $release_date = ''; $purchase_date = '';
$infomation = '';
$err_msg = [];
$check_flg = 0;

// 変更箇所idの取得
if(empty($_GET)){
    $id = $_POST['id'];
}else{
    $id = $_GET['id'];
}


// 削除をやめるとき
if(isset($_POST['check']) && $_POST['check'] == 'list'){
    header('Location:./list.php');
    exit;
}

// 論理削除の設定
if(isset($_POST['check']) && $_POST['check'] == 'delete'){
    $del_day = date('Ymd');
    $link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
    if($link){
        mysqli_set_charset($link , 'utf8');

        $query = "UPDATE m_book SET del_date =" . $del_day . " WHERE id =" . $id;
        mysqli_query($link , $query);
        mysqli_close($link);
    }
    header('Location:./list.php?transition=delete');
    exit;
}

// 変更する箇所の取得
$link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
if($link){
    mysqli_set_charset($link , 'utf8');
    $query = "SELECT * FROM m_book WHERE id = " . $id;
    $result = mysqli_query($link , $query);
    $infomation = mysqli_fetch_assoc($result);
    mysqli_close($link);
    $day = explode('-' , $infomation['release_date']);
    $infomation['release_date'] = $day[0] . "年" . $day[1] . "月" . $day[2] . "日";
    if($infomation['purchase_date'] != ''){
        $day = explode('-' , $infomation['purchase_date']);
        $infomation['purchase_date'] = $day[0] . "年" . $day[1] . "月" . $day[2] . "日";
    }else{
        $infomation['purchase_date'] = '-';
    }
    $title = $infomation['title']; $volume = $infomation['volume']; $price = $infomation['price']; $release_date = $infomation['release_date']; $purchase_date = $infomation['purchase_date'];

}

require_once './tpl/delete.php';
?>