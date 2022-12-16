<?php
require_once './function/hal2_function.php';
require_once '../../config.php';

$err_msg = [];
$flg = 0;
$list = [];

$err_msg['id'] = '';
$err_msg['password'] = '';

// 初回来訪時
if(!empty($_POST)){
    // DB抜き出し
    $link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
    if($link){
        mysqli_set_charset($link , 'utf-8');
        $sql = "SELECT * FROM m_user WHERE login_id LIKE '".$_POST['id']."';";
        $result = mysqli_query($link , $sql);
        $work = mysqli_fetch_assoc($result);
        while($work){
            $list[] = $work;
            $work = mysqli_fetch_assoc($result);
        }
        mysqli_close($link);
    }
    
    if(empty($list)){
        $err_msg['id'] = 'IDかパスワードが違います';
    }

    // パスワードチェック

    foreach($list as $key => $value){
        // ハッシュ化
        $pass = solt_hash($_POST['password'] , $value['salt'] , $value['stretch']);

        if($pass == $value['password']){
            $flg = 1;
        }

        $err_msg['id'] = '';

        if($flg == 0){
            $err_msg['id'] = 'IDかパスワードが違います';
        }elseif($flg == 1 && $value['user_state'] != 1){
            $err_msg['id'] = 'IDかパスワードが違います';
        }

        // 画面遷移
        if($err_msg['id'] == ''){

            setcookie('id',$value['id'],time()+60*60);

            header('Location:./index.php');
            exit;
        }
    }
}

require_once './tpl/login.php';
?>