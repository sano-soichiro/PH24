<?php
require_once './initial_setting.php';

//==================================
//●セッションが有効でない場合の処理
//==================================
if(count($_SESSION) == 0){
   header('location:./entry.php');
   exit;
}

//==================================
//●「戻る」を押された時
//==================================
if(isset($_POST["state"]) && $_POST["state"] == "back"){
   header('location:./entry.php');
   exit;
}

//==================================
//●「登録」を押された時
//==================================
if(isset($_POST["state"]) && $_POST["state"] == "entry"){
   //ソルトの生成
   $salt = uniqid();
   //ストレッチの回数を決める
   $stretch = mt_rand(1000,10000);
   //パスワードのハッシュ化
   $hashed_potato = salt_hash($stretch,$salt,$_SESSION["password"]);
   $hashed_beef = $key = md5("rial_escape".$_SESSION["login_id"]);
   //データを登録する
   //--データベースに接続する
   $link = mysqli_connect(HOST,USER_ID,PASSWORD,DB_NAME);
   //--sqlを設定する
   $table = "m_user";
   $colomn = ["name","login_id","password","mail","hash_login_id","salt","stretch","user_state"];
   $data = [$_SESSION["name"],$_SESSION["login_id"],$hashed_potato,$_SESSION["mail"],$hashed_beef,$salt,$stretch,0];
   $sql = create_insert_sql($table,$colomn,$data);
   //--sqlを実行する
   $result = db_run($link,$sql);
   //メールを送信する
   mb_language("Japanese");
   mb_internal_encoding("UTF-8");
   $mailto = $_SESSION["mail"];
   $title = "タイトル";
   $message = "本登録を次のURLから完了させてください。「".BASE_URL."03/def_entry.php?login_id=".$hashed_beef."」";
   $headers = "From:".FROM;
   echo $message;
   // 送信成功時
   if (mb_send_mail($mailto, $title, $message, $headers)) {
       echo '成功';
   }else {
       echo '失敗';
   }
   //完了画面に遷移する
   header('location:./complete.php');
   exit;
} 

require_once './tpl/'.basename(__FILE__);
?>