<?php
require_once './initial_setting.php';
$error_msg = []; //エラーメッセージを格納する配列の宣言

if(isset($_POST["button"]) && $_POST["button"] == "input"){
   //==================================
   //●入力値のチェックを行います
   //==================================
   
   //▼名前：未入力の判定
   $error_msg['name'] = not_entered_check($_POST['name']);
   //▼ログインID：未入力チェック
   $error_msg['login_id'] = not_entered_check($_POST['login_id']);
   //▼パスワード：未入力チェック
   $error_msg['password'] = not_entered_check($_POST['password']);
   //▼メールアドレス：未入力チェック・妥当性チェック
   $error_msg['mail'] = is_reasonable_mail($_POST['mail']);

   //==================================
   //●入力値に一切誤りがない場合の処理
   //==================================

   if(error_count($error_msg) === 0){
      //セッションに格納する
      $_SESSION["name"] = $_POST["name"];
      $_SESSION["login_id"] = $_POST["login_id"];
      $_SESSION["password"] = $_POST["password"];
      $_SESSION["mail"] = $_POST["mail"];

      //確認画面へ遷移
      header('location:./confirm.php');
      exit;
   }
}
else{
   //==================================
   //●初回アクセス時の処理
   //==================================
   $_POST["name"] = "";
   $_POST["login_id"] = "";
   $_POST["mail"] = "";

   //==================================
   //●確認ページから戻ってきたとき
   //==================================
   if(!count($_SESSION) == 0){
      $_POST["name"] = $_SESSION["name"];
      $_POST["login_id"] = $_SESSION["login_id"];
      $_POST["mail"] = $_SESSION["mail"];
      $error_msg['password'] = "パスワードを再入力してください";
   }
}
require_once './tpl/'.basename(__FILE__);
?>