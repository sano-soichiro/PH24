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
               NewsBirdへ<br>
               サインインする
            </h1>
            <p class="title_msg">
               NewsBirdはユーザー利用者のデータを収集し、<br>
               より、必要とされる情報を提供するために会員登録をお願いしております。<br>
               NewsBird ID をお持ちでない方は<a href="./entry.php">こちら</a>から会員登録を完了させて下さい。
            </p>
            <form method="post" action="">
               <div class="input_contents">
                  <p class="form_title ft">ログインID</p>
                  <input class="input_area" type="text" name="login_id" value="<?php echo $_POST["login_id"]; ?>">
               </div>
               <br>
               <div class="input_contents">
                  <p class="form_title ft">パスワード</p>
                  <input class="input_area" type="text" name="password" value="">
               </div>
               <p class="error"><?php echo isset($error_msg) ? $error_msg : "" ;?></p>
               <br>
               <button class="form_button" type="submit" name="button" value="input">ログイン</button>
            </form>
         </div>
         <div id="right_box">
         </div>
         <script src="./JS/jquery-3.3.1.min.js"></script>
         <script src="./JS/form.js"></script>
      </main>
   </body>   
</html>