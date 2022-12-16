<?php
require_once './function/hal2_function.php';
require_once '../../config.php';

session_start();

$flg = 'no_err';
$list = [];
$err_msg = [];

$error['name'] = '';
$error['id'] = '';
$error['password'] = '';
$error['address'] = '';

$name = '';
$id = '';
$address = '';
$check = '';

if(!empty($_GET) && $_GET['check'] == 'back'){
    $check = $_GET['check'];
    $error['password'] = 'パスワードを入力し直してください';
}

if(!empty($_SESSION) && $check == 'back'){
    $name = $_SESSION['list']['name'][0];
    $id = $_SESSION['list']['id'][0];
    $address = $_SESSION['list']['address'][0];
}elseif(!empty($_POST) && $_POST['check'] == 'check'){
    $name = $_POST['name'];
    $id = $_POST['id'];
    $address = $_POST['address'];
}

if(!empty($_POST) &&  $_POST['check'] == 'check'){

    // チェックリスト作成
    foreach($_POST as $key => $value){
        $list[$key][] = $value;
        switch($key){
            case 'name':
                $list[$key][] = 'blank';
                break;
            case 'id':
                $list[$key][] = 'blank';
                break;
            case 'password':
                $list[$key][] = 'blank';
                break;
            case 'address':
                $list[$key][] = 'mail';
                $list[$key][] = 'blank';
                break;
        }
    }

    // エラーチェック
    foreach($list as $key => $value){
        $err_msg[$key] = err_check($value);
    }

    // エラー時パスワード消去
    foreach($err_msg as $key => $value){
        if($value['check'] == 1){
            $flg = 'err';
        }
    }

    foreach($err_msg as $key => $value){
        foreach($value as $sub_key => $val){
            if($sub_key != 'check'){
                $error[$key] = $val;
            }
            if($value['check'] == 1){
                $flg = 'err';
            }
        }
    }

    if($flg == 'err'){
        $list[2][0] = '';
    }else{
        $_SESSION['list'] = $list;

        // 確認画面へ遷移
        header('Location:./check.php');
        exit;
    }

}

require_once './tpl/entry.php';
?>