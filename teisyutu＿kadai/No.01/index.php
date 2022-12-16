<?php
session_start();

// メッセージの初期化・テキストボックス内の値の初期化
$name_error = '';
$age_error = '';
$db_error = '';

$name = '';
$age = '';

// 登録ボタン押されたときの処理
if(isset($_GET['check']) && $_GET['check'] == 'confirm'){

    $_SESSION['name'] = $_GET['name'];
    $_SESSION['age'] = $_GET['age'];

    $name = $_SESSION['name'];
    $age = $_SESSION['age'];

    // 氏名チェック
    if($_GET['name'] != ''){
    }else{
        $name_error = '氏名を入力してください';
    }

    // 年齢チェック
    if($_GET['age'] != ''){
        if(is_numeric($_GET['age']) !== true){
            $age_error = '数値を入力してください';
        }
    }else{
        $age_error = '年齢を入力してください';
    }

    // ページ遷移処理
    if($name_error == '' && $age_error == ''){
        header('Location:./confirm.php');
        exit;
    }

// confirmから戻ってきたときの処理
}elseif(isset($_SESSION['check']) && $_SESSION['check'] == 'back'){

    $name = $_SESSION['name'];
    $age = $_SESSION['age'];

// データベースに接続できなかった時の処理
}elseif(isset($_SESSION['check']) && $_SESSION['check'] == 'complete'){

    $db_error = 'データベースに接続できませんでした';

}
require_once './tpl/index.php';
?>