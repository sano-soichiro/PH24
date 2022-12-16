<?php
require_once './initial_setting.php';

if(isset($_POST["button"]) && $_POST["button"] == "input"){
   //==================================
   //●パスワードの確認
   //==================================
   //--データベースに接続する
   $link = mysqli_connect(HOST,USER_ID,PASSWORD,DB_NAME);
   //--sqlを設定する
   $sql = "select * from m_user where login_id = '".$_POST["login_id"]."'";
   //--sqlを実行する
   $result = db_run($link,$sql);
   //フェッチ処理
   $user_data = get_data($result);
   //パスワードが一致するかを確認
   if(!($user_data === false) && $user_data[0]["user_state"] == 1){
      if(!($user_data[0]['password'] == salt_hash($user_data[0]['stretch'],$user_data[0]['salt'],$_POST['password']))){
         $error_msg = 'ログインID又はパスワードが違います';
      }
      else{
         setcookie('id',$user_data[0]['id'],time() + 60 * 30);
         header('location:./index.php');
         exit;
      }
   }
   else{
      $error_msg = "ログインID又はパスワードが違います";
   }
}
else{
   $_POST['login_id'] = '';
}

require_once './tpl/'.basename(__FILE__);
?>