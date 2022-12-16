<?php
//注：initial_setting.phpをコントロール側で読み込んで使用すること。

//----------------------------------------------------------
//ユーザー情報を取得
//----------------------------------------------------------
if(isset($_COOKIE['id'])){
    //データベースに接続する
    $link = mysqli_connect(HOST,USER_ID,PASSWORD,DB_NAME);
    //sqlを設定する
    $sql = "select * from m_user where id = " . $_COOKIE['id'];
    //sqlを実行する
    $result = db_run($link,$sql);
    //フェッチ処理
    $user_data = get_data($result);
    //ユーザー名
    $user_name = $user_data[0]['name'];
    //アイコン画像のファイルパス
    $file_pass = './images/user/' . $user_data[0]['id'] . '/' . $user_data[0]['file_name'];
}
else{
    //ユーザー名
    $user_name = 'ゲスト';
    //アイコン画像のファイルパス
    $file_pass = './images/user/guest.png';
}

//----------------------------------------------------------
//ログアウト処理
//----------------------------------------------------------
if(isset($_GET['state']) && $_GET['state'] == 'logout'){
    setcookie('id','',time()-60*30);
    header('location:./login.php');
    exit;
}

//----------------------------------------------------------
//セッションの有無・cookieの有無
//----------------------------------------------------------
if(isset($_COOKIE['id'])){
    $cookie = '有り';
}
else{
    $cookie = '無し';
}
if(isset($_SESSION) && count($_SESSION) > 0){
    $session = '有り';
}
else{
    $session = '無し';
}
?>
