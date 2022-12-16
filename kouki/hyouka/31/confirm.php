<?php

session_start();
// 登録画面から遷移してない場合に登録画面に遷移する
if(!isset($_SESSION['confirm'])){
    header("location:./entry.php");
    exit;
}

// 呼出
require_once '../../config.php';

$name = $_SESSION['name'];
$login_id = $_SESSION['login_id'];
$password = $_SESSION['password'];
$mailaddress = $_SESSION['mailaddress'];
$user_state = 0;

$password_ball = '';
$password_length = strlen($password);
for($i = 0;$i < $password_length;$i++){
    $password_ball .= '●';
}

if(isset($_POST['entry'])){

    $stretch = mt_rand(1000,10000);
    $salt = uniqid();
    $hashed_password = '';

    // パスワードをハッシュです!
    for($i = 0;$i < $stretch;$i++){
        $hashed_password = md5($salt.$password);
    }
    // ログインIDをハッシュです!
    for($i = 0;$i < $stretch;$i++){
        $hash_login_id = md5($salt.$login_id);
    }

    $link = mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME);
    if(!$link){
        mysqli_close($link);
        exit;
    }

    mysqli_set_charset($link,'utf8');
    mysqli_query($link,"INSERT INTO m_user(name , mail , login_id , hash_login_id , password , salt , stretch , user_state) VALUES('" . $name . "' ,'" . $mailaddress . "' , '" . $login_id . "' , '" . $hash_login_id . "' , '" . $hashed_password . "' , '" . $salt ."' , " . $stretch . " , " . $user_state . ")");
    $_SESSION['hash_login_id'] = $hash_login_id;
    $_SESSION['complete'] = 'complete';

    // ------ メールの処理 ------

    // 言語と文字コードを設定
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");

    //メールの情報を設定
    $title = "仮登録完了";
    $messege = "ご登録ありがとうございます。アカウントを有効化するには、以下の手順を完了してください。アカウントの登録を完了するには、このリンクに一度アクセスする必要があります。以下のリンクをクリックしてください（またはブラウザにコピーしてください）";
    $headers = "From : ".FROM;

    // メール送信
    mb_send_mail($mailaddress,$title,$messege,$headers);

    //完了画面へ移動
    mysqli_close($link);    
    header("location:./complete.php");
    exit;
}
if(isset($_POST['back'])){
    $_SESSION['back'] = 'back';
    header("location:./entry.php");
    exit;
}



require_once './tpl/confirm.php';

?>