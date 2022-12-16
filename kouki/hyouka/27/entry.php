<?php
session_start();
require_once './../../config.php';
require_once './function/function.php';
// エラー文を格納する変数
$err = [
    'name' => '',
    'login_id' => '',
    'password' => '',
    'mail' => ''
];

//テキストにログを残す変数
$log = [
    'name' => '',
    'login_id' => '',
    'mail' => ''
];


//確認画面で戻るボタンを押したときの処理
if(isset($_SESSION['back_data'])){
    $data = $_SESSION['back_data'];
    foreach($data as $key => $value){
        $log[$key] = $value;
    }
    $err['password'] = '*再入力してください';
    session_destroy();
}

//確認ボタンを押したとき
if(isset($_POST['btn'])){
    $data = $_POST['data'];

    //空白チェック
    foreach($data as $key => $value){
        $err[$key] = !space_check($value) == true ? '*未入力です' : '';
    }

    //メアドチェック
    if($err['mail'] == ''){
        $err['mail'] = str_exist_in_check($data['mail'] , '@') == true ? '' : '*メアド形式で入力してください';
    }

    //エラーが出ていないかチェック
    if($err['name'] == '' && $err['login_id'] == '' && $err['password'] == '' && $err['mail'] == ''){
        // サニタイズ
        foreach($data as $key => $value){
            $link = mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
            $data[$key] = mysqli_real_escape_string($link , $data[$key]);
            mysqli_close($link);
        }
        
        // 確認画面へ移動
        $_SESSION['data'] = $data;
        header("location: ./t_confirmation.php");
        exit;
    }
    elseif($err['password'] == ''){
        $err['password'] = '*入力してください';
    }

    //入力がうまくいかなかったときの処理
    foreach($log as $key => $value){
        $log[$key] = $data[$key];
    }

}

// 表示する画面
require_once './tpl/entry.php';
exit;