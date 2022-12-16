<?php
session_start();

// indexからこのページに来なかった時の処理
if(!isset($_SESSION['name']) && !isset($_SESSION['age'])){

    header('Location:./index.php');
    exit;

}

$name = $_SESSION['name'];
$age = $_SESSION['age'];

// 戻るが押された時の処理
if(isset($_GET['check']) && $_GET['check'] == 'back'){

    $_SESSION['check'] = $_GET['check'];
    header('Location:./index.php');
    exit;

// 登録が押された場合時の処理
}elseif(isset($_GET['check']) && $_GET['check'] == 'complete'){

    // SQL文の処理
    if($link = mysqli_connect('localhost','root','','ph23_sample')){
        mysqli_set_charset($link,'utf8');
        mysqli_query($link,"INSERT INTO sample(name,age) VALUES('".$name."',".$age.")");
        $_SESSION['id'] = mysqli_insert_id($link);
        mysqli_close($link);

        header('Location:./complete.php');
        exit;

    // データベースに接続できなかった場合の処理
    }else{

        $_SESSION['check'] = $_GET['check'];
        header('Location:./index.php');
        exit;

    }
}

require_once './tpl/confirm.php';
?>