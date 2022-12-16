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
      <h2>yomukaの会員になりましょう！</h2>
      <p>氏名、ログインID、パスワードを入力してください。</p>
      <p>「<span class="red">※</span>」の項目は必須項目です。必ず入力してください。</p>
      <?php //入力フォーム ?>
      <form class="input_form" method="post" action="./entry.php">
         <?php //氏名 ?>
         <div class="form_block">
            <label for="title" class="form_title">名前<span class="mandatory">※</span></label>
            <input id="title" class="form_input form_size_l" type="text" name="name" value="" placeholder="阿佐ヶ谷多喜子">
            <!-- <p class="error"></p> -->
         </div>
         <?php //ログインID ?>
         <div class="form_block">
            <label for="title" class="form_title">ログインID<span class="mandatory">※</span></label>
            <input id="title" class="form_input form_size_l" type="text" name="id" value="">
            <!-- <p class="error"></p> -->
         </div>
         <?php //パスワード ?>
         <div class="form_block">
            <label for="title" class="form_title">パスワード<span class="mandatory">※</span></label>
            <input id="title" class="form_input form_size_l" type="text" name="pass" value="">
            <!-- <p class="error"></p> -->
         </div>
         <?php //送信ボタン ?>
         <button class="form_button" type="submit" name="button" value="submit">会員登録を行う</button>
      </form>
   </main>
</body>
</html>