<?php
session_start();
require_once './../../config.php';
require_once './function/function.php';


//指定の方法以外でこのページを開いた時の処理
if(!isset($_SESSION['data']) && !isset($_POST['register']) && !isset($_POST['back'])){
    header("location: ./entry.php");
    exit;
}


//戻るボタンを押したときの処理
if(isset($_POST['back'])){
    $_SESSION['data'] = array();
    // csvに避難させたパスワードの削除
    csv_writing('./csv/pass.csv' , '');
    $_SESSION['back_data'] = $_POST['data'];
    // 仮登録画面に移動
    header("location: ./entry.php");
    exit;
}


// 登録ボタンを押したときの処理
if(isset($_POST['register'])){
    $_SESSION['data'] = array();
    //DBに登録するデータ
    $data = $_POST['data'];
    
    // パスワード
    $pass = csv_read('./csv/pass.csv');
    // csvに避難させたパスワードの削除
    csv_writing('./csv/pass.csv' , '');

    // ログインIDをハッシュ化
    $hash_login_id = pass_hash($data['login_id'] , '' , 1);

    // パスワードをハッシュ化
    $solt = rand_str(40 , 20);
    $cost = mt_rand(1000 , 10000);
    $pass = pass_hash($pass[0] , $solt , $cost);

    // データをDBに格納する処理
    $sql = "INSERT INTO m_user(name , mail , login_id , password , hash_login_id , salt , stretch , user_state) VALUES('" . $data['name'] . "' , '" . $data['mail'] . "' , '" . $data['login_id'] . "' , '" . $pass . "' , '" . $hash_login_id . "' , '" . $solt . "' , " . $cost . " , 0);";
    sql_registration(HOST , USER_ID , PASSWORD , DB_NAME , $sql);

    // メールを送る処理
    mb_language('Japanese');
    mb_internal_encoding('UTF-8');
    $mail_data = [];
    $mail_data['mailto'] = $data['mail'];
    $mail_data['title'] = '仮登録完了のご案内';
    $mail_data['message'] = '仮登録が完了しました。下記のURLにアクセスし、会員登録の手続きを完了してください。' . BASE_URL . '27/register.php?login_id=' . $hash_login_id;
    $mail_data['headers'] = 'From:' . FROM;
    mb_send_mail($mail_data['mailto'] , $mail_data['title'] , $mail_data['message'] , $mail_data['headers']);


    // 仮登録完了画面の飛ぶ処理
    $mail_data['URL'] = BASE_URL . '27/register.php?login_id=' . $hash_login_id;
    $_SESSION['mail'] = $mail_data;
    header("location: ./t_complete.php");
    exit;
}


//登録画面で入力した内容
$data = $_SESSION['data'];
// パスワードをcsvファイルに避難
csv_writing('./csv/pass.csv' , $data['password']);

//表示する画面
require_once './tpl/t_confirmation.php';
exit;