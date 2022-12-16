<?php
require_once '../../const.php';
require_once './function/hal2_function.php';

$err = '';
$id = '';
$pass ='';
$err_msg = '';


// 初読み込みか否か
if(isset($_POST['type'])){
    $id = $_POST['id'];
    $pass = $_POST['pass'];
    $err = $_GET['check'];
    
    // エラーメッセージ
    if($err == 'err'){
        $err_msg = '入力ミスです';
    }

    // 入力無し
    if($_POST['id'] == '' || $_POST['pass'] == ''){
        header('Location:./login.php?check=err');
        exit;
    }


    // sql作成
    $sql = "SELECT * FROM m_member WHERE '".$id."' LIKE login_id;";

    // 情報抜出
    $link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
    mysqli_set_charset($link , 'utf-8');
    $result = mysqli_query($link , $sql);
    $list = mysqli_fetch_assoc($result);
    mysqli_close($link);

    // 整合性確認&分岐
    $hash = solt_hash($pass,$list['password_str'],$list['password_cnt']);
    if($list['password'] == $hash){
        setcookie('id',$list['login_id'],time()+60*60);
        header('Location:./index.php');
        exit;
    }else{
        header('Location:./login.php?check=err');
        exit;
    }
}

// エラーメッセージ
if(isset($_GET['check']) && $_GET['check'] == 'err'){
    $err_msg = '入力ミスです';
}



require_once './tpl/login.php';
?>