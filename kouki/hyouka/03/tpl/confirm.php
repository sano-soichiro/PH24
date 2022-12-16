<!DOCTYPE html>
<html lang = "ja">

   <head>
      <meta charset="UTF-8">
      <title>NewsBird | 仮登録確認</title>
      <?php require_once './tpl/style.php'; ?>
      <link href="./css/2column_layout.css" rel="stylesheet" type="text/css">
   </head>

   <body>
      <?php require_once './tpl/header.php'; ?>
      <main>
         <div id="left_box">
            <h1>
               正しく情報が<br>
               入力されていますか？
            </h1>
            <p class="title_msg">
               入力内容を確認してください。<br>
               正しく入力されていることを確認したら<br>
               「確認メール送信ボタン」を押してください。
            </p>
            <div class="confirm_box">
               <p class="confirm_title">氏名</p>
               <p class="confirm_value"><?php echo $_SESSION["name"];?></p>
            </div>
            <div class="confirm_box">
               <p class="confirm_title">ログインID</p>
               <p class="confirm_value"><?php echo $_SESSION["login_id"];?></p>
            </div>
            <div class="confirm_box">
               <p class="confirm_title">メール</p>
               <p class="confirm_value"><?php echo $_SESSION["mail"];?></p>
            </div>
            <div class="confirm_box">
               <p class="confirm_title">パスワード</p>
               <p class="confirm_value"><?php echo str_repeat("●",strlen($_SESSION["password"]));?></p>
            </div>
            <form method="post" action="">
               <button class="form_button" type="submit" name="state" value="entry">確認メールを送信する</button>
               <button class="form_button_sub" type="submit" name="state" value="back">入力画面へ戻る</button>
            </form>
         </div>
         <div id="right_box">
         </div>
      </main>
   </body>   
</html>