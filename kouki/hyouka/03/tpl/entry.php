<!DOCTYPE html>
<html lang = "ja">

   <head>
      <meta charset="UTF-8">
      <title>NewsBird | 会員登録</title>
      <?php require_once './tpl/style.php'; ?>
      <link href="./css/2column_layout.css" rel="stylesheet" type="text/css">
   </head>

   <body>
      <?php require_once './tpl/header.php'; ?>
      <main>
         <div id="left_box">
            <h1>
               最新の情報を<br>
               手に入れましょう！
            </h1>
            <p class="title_msg">
               NewsBirdアカウントで使用する情報を登録してください。<br>
               入力いただいたメールアドレスに本登録用のURLを送付いたしますので、<br>
               そちらから、本登録を完了させてください。
            </p>
            <form method="post" action="">
               <div class="input_contents">
                  <p class="form_title ft">氏名</p>
                  <input class="input_area" type="text" name="name" value="<?php echo $_POST["name"]; ?>">
               </div>
               <p class="error"><?php echo isset($error_msg["name"]) ? $error_msg["name"] : "" ?></p>
               <div class="input_contents">
                  <p class="form_title ft">ログインID</p>
                  <input class="input_area" type="text" name="login_id" value="<?php echo $_POST["login_id"]; ?>">
               </div>
               <p class="error"><?php echo isset($error_msg["login_id"]) ? $error_msg["login_id"] : "" ?></p>
               <div class="input_contents">
                  <p class="form_title ft">パスワード</p>
                  <input class="input_area" type="text" name="password" value="">
               </div>
               <p class="error"><?php echo isset($error_msg["password"]) ? $error_msg["password"] : "" ?></p>
               <div class="input_contents">
                  <p class="form_title ft">メールアドレス</p>
                  <input class="input_area" type="text" name="mail" value="<?php echo $_POST["mail"]; ?>">
               </div>
               <p class="error"><?php echo isset($error_msg["mail"]) ? $error_msg["mail"] : "" ?></p>
               <button class="form_button" type="submit" name="button" value="input">確認画面へ</button>
            </form>
         </div>
         <div id="right_box">
         </div>
         <script src="./JS/jquery-3.3.1.min.js"></script>
         <script src="./JS/form.js"></script>
      </main>
   </body>   
</html>