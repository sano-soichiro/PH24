<?php
require_once '../../config.php';
require_once './function/hal2_function.php';

$err_msg = [];
$user_id = '';

$err_msg['pass'] = '';
$err_msg['img'] = '';
// user_id取得
if(!empty($_POST)){
    $user_id = $_POST['user_id'];
}else{
    $user_id = $_GET['id'];
}

// 不正アクセス
if($user_id == ''){
    header('Location:./entry.php');
    exit;
}

// 存在しないID
$link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
if($link){
    mysqli_set_charset($link , 'utf-8');
    $sql = "SELECT name FROM m_user WHERE hash_login_id LIKE '".$user_id."';";
    $result = mysqli_query($link , $sql);
    if($result){
        $name = mysqli_fetch_assoc($result);
    }else{
        header('Location:./entry.php');
        exit;
        mysqli_close($link);
    }
}

// 初回来訪時
if(!empty($_POST)){
    // エラーチェック
    $sql = "SELECT * FROM m_user WHERE hash_login_id = '".$user_id."';";
    $result = mysqli_query($link , $sql);
    $list = mysqli_fetch_assoc($result);
    mysqli_close($link);

    // ハッシュ化
    $hash_pass = solt_hash($_POST['password'],$list['salt'],$list['stretch']);

    // パスワードチェック
    if($hash_pass != $list['password']){
        $err_msg['pass'] = 'パスワードが違います';
    }

    // 画像チェック
    $file_name = explode('.' , $_FILES['file']['name']);

    foreach($file_name as $key => $value){
        $work = $value;
    }

    if($_FILES['file']['name'] != ''){
        if($work != 'jpg' && $work != 'JPG'){
            $err_msg['img'] = '対応していない形式です';
        }
    }else{
        $err_msg['img'] = '画像が選択されていません';
    }


    // 画面遷移
    if($err_msg['img'] == '' && $err_msg['pass'] == ''){
        // DB格納
        $link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
        if($link){
            mysqli_set_charset($link , 'utf-8');
            $sql = "UPDATE m_user SET user_state = 1 WHERE hash_login_id LIKE '".$user_id."';";
            mysqli_query($link , $sql);
            $sql = "UPDATE m_user SET file_name = '".$_FILES['file']['name']."' WHERE hash_login_id LIKE '".$user_id."';";
            mysqli_query($link , $sql);
            mysqli_close($link);
        }

        // 画像保存
        mkdir("./images/user/".$list['id'] , 0777);

        img_processing($_FILES , 60 , 70 , "./images/user/".$list['id']."/" , "./images/user/".$list['id']."/thumb_");

        header('Location:./new_complate.php');
        exit;
    }
}

require_once './tpl/new_entry.php';
?>