<?php

session_start();

//呼出
require_once '../../config.php';

$err = 0;
$error = 'not_error';
$err_msg = [];

if(isset($_SESSION['back'])){
    $name = $_SESSION['name'];
    $login_id = $_SESSION['login_id'];
    $password = '';
    $mailaddress = $_SESSION['mailaddress'];
    $err_msg['password'] = 'パスワードを再入力してください';
    $error = 'not_error';
    session_destroy();
}else{
    $name = '';
    $login_id = '';
    $mailaddress = '';
    $password = '';    
}

//登録ボタンが押されているかの処理
if(isset($_POST['entry'])){

    $stretch = 0;
    $salt = '';

    $name = $_POST['name'];
    $login_id = $_POST['login_id'];
    $password = $_POST['password'];
    $mailaddress = $_POST['mailaddress'];

    $mail_str = 1;
    $mail_str += strpos($mailaddress,'@');
    $mail_length = 0;
    $mail_length += strlen($mailaddress);

    // 未入力 と 妥当性チェック
    if($name == ''){
        $err_msg['name'] = '氏名を入力してください';
        $err++;
    }
    if($login_id == ''){
        $err_msg['login_id'] = 'ログインIDを入力してください';
        $err++;
    }
    if($password == ''){
        $err_msg['password'] = 'パスワードを入力してください';
        $err++;
    }
    if($mailaddress == ''){
        $err_msg['mailaddress'] = 'メールアドレスを入力してください';
        $err++;
    }elseif(strpos($mailaddress,'@') === false){
        $err_msg['mailaddress'] = '正しいメールアドレスを入力してください';
        $err++;
    }elseif($mail_str == 0){
        $err_msg['mailaddress'] = '正しいメールアドレスを入力してください';
        $err++;
    }elseif($mail_str == $mail_length){
        $err_msg['mailaddress'] = '正しいメールアドレスを入力してください';
        $err++;
    }

    //正常時の処理
    if($err == 0){

    $_SESSION['name'] = $name;
    $_SESSION['login_id'] = $login_id;
    $_SESSION['password'] = $password;
    $_SESSION['mailaddress'] = $mailaddress;
    $_SESSION['confirm'] = 'confirm';

    header("location:./confirm.php");
    exit;
    
    }else{
        $err_msg['password'] = 'パスワードを入力してください';
        $error = 'error';
    }
    
}else{
    $_POST['name'] = '';
    $_POST['login_id'] = '';
    $_POST['password'] = '';
    $_POST['mailaddress'] = '';
}

require_once './tpl/entry.php';

?>