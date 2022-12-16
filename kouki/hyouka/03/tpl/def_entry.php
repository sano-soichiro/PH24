<!DOCTYPE html>
<html lang = "ja">

   <head>
      <meta charset="UTF-8">
      <title>NewsBird | 本登録</title>
      <?php require_once './tpl/style.php'; ?>
      <link href="./css/2column_layout.css" rel="stylesheet" type="text/css">
   </head>

   <body>
      <?php require_once './tpl/header.php'; ?>
      <main>
         <div id="left_box">
            <h1>
               もう少しです！<br>
               本登録を行って下さい！
            </h1>
            <p class="title_msg padding_b_40">
               ようこそ、<span><?php echo $user_data[0]['name']; ?>さん</span>！登録はあと少しで完了します！<br>
               前回入力したパスワードを確認のため入力し、<br>
               プロフィールに用いるアイコン画像を選択の上、登録を完了させて下さい！
            </p>
            <form method="post" action="" enctype="multipart/form-data">
               <div class="input_contents">
                  <p class="form_title ft">パスワード確認用</p>
                  <input class="input_area" type="text" name="password" value="">
               </div>
               <p class="error"><?php echo isset($error_msg["password"]) ? $error_msg["password"] : ""; ?></p>
               <div class="input_file">
                  <div class="input_img_display"><img id="display_img" src="./images/user/guest.png" alt=""></div>
                  <label class="input_file_title">画像をアップロード<input id="file" type="file" name="file"></label>
                  <div id="selected_file" class="selected_file">ファイルが選択されていません</div>
               </div>
               <p class="error padding_b_40"><?php echo isset($error_msg["image"]) ? $error_msg["image"] : ""; ?></p>
               <input class="input_area" type="hidden" name="hash_login_id" value="<?php echo $_POST['hash_login_id']; ?>">
               <button class="form_button" type="submit" name="button" value="input">本登録</button>
            </form>
         </div>
         <div id="right_box">
         </div>
      </main>
      <script src="./JS/jquery-3.3.1.min.js"></script>
      <script src="./JS/form.js"></script>
      <script src="./JS/img_display.js"></script>
   </body>   
</html>