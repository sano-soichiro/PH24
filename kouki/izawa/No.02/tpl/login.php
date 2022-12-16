<!DOCTYPE html>
<html lang = "ja">

<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="./css/common.css">
   <link rel="stylesheet" href="./css/header.css">
   <link rel="stylesheet" href="./css/form.css">
   <?php require_once './tpl/font.php'; ?>
   <link rel="icon" type="image/x-icon" href="./img/favicon.png">
   <script src="https://kit.fontawesome.com/03ebcee952.js" crossorigin="anonymous"></script>
   <title>会員登録</title>
</head>

<body>
   <?php require_once './tpl/header.php'; ?>
   <main>
      <h2>yomukaにログインする</h2>
      <p>yomukaは日本最大の本管理サイトです</p>
      <?php //入力フォーム ?>
      <form class="input_form" method="post" action="./login.php">
         <?php //ログインID ?>
         <div class="form_block">
            <label for="title" class="form_title">ログインID</label>
            <input id="title" class="form_input form_size_l" type="text" name="id" value="">
         </div>
         <?php //パスワード ?>
         <div class="form_block">
            <label for="title" class="form_title">パスワード</label>
            <input id="title" class="form_input form_size_l" type="text" name="pass" value="">
         </div>
         <?php //エラー文 ?>
         <div class="form_block"><p class="error"><?php echo $error_msg; ?></p></div>
         <?php //送信ボタン ?>
         <button class="form_button" type="submit" name="button" value="submit">ログイン</button>
      </form>
      <p>無料会員登録は<a href="./entry.php">コチラ</a></p>
   </main>
</body>
</html>