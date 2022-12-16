<?php
require_once './function/hal2_function.php';
require_once '../../config.php';

session_start();
$list = $_SESSION['list'];

$password = '';

// 戻るボタンが押された時
if(!empty($_POST) && $_POST['check'] == 'back'){
    header('Location:./entry.php?check=back');
    exit;
}

// パスワード●化
$sum = strlen($list['password'][0]);
for($i=0;$i<$sum;$i++){
    $password = '●'.$password;
}

if(!empty($_POST) && $_POST['check'] == 'confirm'){
    // ソルト決め
    $work = chr(mt_rand(65,90));
    for($i=0;$i<mt_rand(20,100);$i++){
        $work = $work . chr(mt_rand(65,90));
    }
    $salt = $work;

    // ストレッチ回数
    $stretch = mt_rand(1000,10000);

    // ハッシュ化
    $hash = solt_hash($list['id'][0],$salt,$stretch);

    $pass = solt_hash($list['password'][0],$salt,$stretch);


    // DB登録
    $link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
    if($link){
        mysqli_set_charset($link , 'utf-8');

        $sql = "INSERT INTO m_user (name , mail , login_id , password , hash_login_id , salt , stretch , user_state) VALUES ('".$list['name'][0]."','".$list['address'][0]."','".$list['id'][0]."','".$pass."','".$hash."','".$salt."','".$stretch."',0);";
        $result = mysqli_query($link , $sql);
        mysqli_close($link);
    }

    // メール送信
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");
    $mailto = $list['address'][0];
    $title = '本登録';
    $message = "仮登録が完了しました。
                記載されているリンクに遷移して本登録を完了してください<br>
                URL:<a href='".BASE_URL."15/new_entry.php?id=".$hash."'>".BASE_URL."15/new_entry.php</a>";
    $headers = 'From:'.FROM;

    if(mb_send_mail($mailto,$title,$message,$headers)){
        echo '成功';
    }else{
        echo 'ミス';
    }

    // 画面遷移
    $_SESSION['msg'] = $message;

    header('Location:./complate.php');
    exit;
}

require_once './tpl/check.php';
?>