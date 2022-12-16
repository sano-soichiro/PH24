<?php
//●配列の中身について
//$entry_data = [氏名,id,ハッシュ化されたパスワード,ソルト文字列,ストレッチ回数]
//$error = [idのエラー文,氏名のエラー文,パスワードのエラー文]

require_once './initial_setting.php';

if(isset($_POST['button']) && $_POST['button'] == 'submit'){

    //未入力のチェック
    $error = [];
    $error['name'] = not_entered_check($_POST['name']);
    $error['id'] = not_entered_check($_POST['id']);   
    $error['pass'] = not_entered_check($_POST['pass']);

    //エラーの個数を数える
    //エラーが一件もなかった場合
    if(error_count($error) == 0){
        //ソルトの生成
        $salt = uniqid();
        //ストレッチの回数を決める
        $stretch_cnt = mt_rand(10000,100000);
        //パスワードのハッシュ化
        $hashed_potato = salt_hash($stretch_cnt,$salt,$_POST['pass']);
        //データベースに登録する
        $entry_data = [$_POST['name'],$_POST['id'],$hashed_potato,$salt,$stretch_cnt];
        $column = ['name','login_id','password','password_str','password_cnt'];
        //--データベースに接続する
        $link = mysqli_connect(HOST,USER_ID,PASSWORD,DB_NAME);
        //--sqlを設定する
        $sql = create_insert_sql('m_member',$column,$entry_data);
        //--sqlを実行する
        $result = db_run($link,$sql);
        //登録完了ページへ遷移
        header('location:./complete.php');
        exit;
    }
}
require_once './tpl/'.basename(__FILE__);
?>