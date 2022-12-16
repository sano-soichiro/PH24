<?php

session_start();

// 呼出
require_once '../../config.php';
require_once './func.php';

$error = 'not_error';
$err_msg = [];

// ログインボタンが押された時の処理
if(isset($_POST['login'])){

    $login_id = $_POST['login_id'];

    if($login_id != NULL){
        $sql = "SELECT * FROM m_user WHERE login_id = '" . $login_id . "'";
        $list = sql_list( HOST , USER_ID , PASSWORD , DB_NAME , $sql);

        if($list[0]['user_state'] == 0){
            $err_msg['error'] = '正しいログインIDまたはパスワードを入力してください';
            $error = 'error';
        }elseif($list != false){

            for($i = 0; $i < $list[0]['stretch']; $i++){
                $password = md5($list[0]['salt'].$_POST['password']);   
            }
            // 問題がない場合、完了画面へ移動
            if($password == $list[0]['password']){                
                $id = $list[0]['id'];
                setcookie('id',$id,time() + 60 * 60 * 24);
                header('location: ./index.php');
                exit;
            }else{
                $err_msg['error'] = '正しいログインIDまたはパスワードを入力してください';
                $error = 'error';
            }

        }else{
            $err_msg['error'] = '正しいログインIDまたはパスワードを入力してください';
            $error = 'error';
        }

    }else{
        $err_msg['error'] = '正しいログインIDまたはパスワードを入力してください';
        $error = 'error';
    }

}else{
    $_POST['login_id'] = '';
    $_POST['password'] = '';
}

require_once './tpl/login.php';

?>