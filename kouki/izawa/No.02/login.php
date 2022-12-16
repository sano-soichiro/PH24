<?php

require_once './initial_setting.php';

//エラー文の初期化
$error_msg = '';

if(isset($_POST['button']) && $_POST['button'] == 'submit'){
    //ログインIDで検索をかけデータベースからデータを取得する
    //--データベースに接続する
    $link = mysqli_connect(HOST,USER_ID,PASSWORD,DB_NAME);
    //--sqlを設定する
    $sql = "select * from m_member where login_id = '".$_POST['id']."'";
    //--sqlを実行する
    $result = db_run($link,$sql);
    //フェッチ処理
    $member_data = get_data($result);

    if($member_data){
        //取得したデータを照合する
        foreach($member_data as $value){
            //パスワードをハッシュ化
            $hashed_beef = salt_hash($value['password_cnt'],$value['password_str'],$_POST['pass']);
            //照合し、合致すればページ遷移
            if($value['login_id'] == $_POST['id'] && $value['password'] == $hashed_beef){
                //専用ページへ
                setcookie('id',$value['id'],time()+60*30);
                header('location:./index.php');
                exit;
            }
            //パスワードが一致するものが見つからなかった場合
            $error_msg = 'ログインIDまたはパスワードが間違っています';
        }
    }
    else{
        //idが存在しない場合
        $error_msg = 'ログインIDまたはパスワードが間違っています';
    }
}
require_once './tpl/'.basename(__FILE__);