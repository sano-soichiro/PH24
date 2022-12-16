<?php
session_start();
require_once './../../config.php';
require_once './function/function.php';
// 未入力用の変数
$space_err = [
    'login_id' => '',
    'password' => ''
];

// エラーの変数
$err = '';

if(isset($_POST['btn'])){
    $data = $_POST['data'];
    // サニタイズ
    foreach($data as $key => $value){
        $link = mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
        $data[$key] = mysqli_real_escape_string($link , $data[$key]);
        mysqli_close($link);
    }
    // 空白チェック
    foreach($data as $key => $value){
        $space_err[$key] = !space_check($value) == true ? '*未入力です' : '';
    }
    
    // 組み合わせチェック
    if($space_err['login_id'] == '' && $space_err['password'] == ''){
        // ログインIDチェック
        $sql = "SELECT id , password , salt , stretch , user_state FROM m_user WHERE login_id = '" . $data['login_id'] . "';";
        if($pass_data = sql_table_read(HOST , USER_ID , PASSWORD , DB_NAME , $sql)){
            // user_stateが１になっているかチェック
            if($pass_data[0]['user_state'] == 1){
                // パスワードチェック
                if(pass_hash($data['password'] , $pass_data[0]['salt'] , $pass_data[0]['stretch']) == $pass_data[0]['password']){
                    // indexに飛ぶ処理
                    setcookie('id' , $pass_data[0]['id'] , time() + 60 * 60 * 24);
                    header("location: ./index.php");
                    exit;
                }
            }else{
                $err = '*このIDは本登録を行われていません';
            }
        }
        else{
            $err = '*ログインIDもしくはパスワードが違います';
        }
    }
    
}

// 表示する画面
require_once './tpl/login.php';
exit;