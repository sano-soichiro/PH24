<!DOCTYPE html>
<html lang = "ja">

   <head>
      <meta charset="UTF-8">
      <title>NewsBird | 仮登録完了</title>
      <?php require_once './tpl/style.php'; ?>
      <link href="./css/2column_layout.css" rel="stylesheet" type="text/css">
   </head>

   <body>
      <?php require_once './tpl/header.php'; ?>
         <main>
            <div id="left_box">
               <h1>
                  登録はまだ完了して<br>
                  いません！
               </h1>
               <p class="title_msg">
                  入力された「<?php echo $user_data[0]['mail']; ?>」宛に<br>
                  確認メールを送信しました。<br>
                  メールに記載されているURLから本登録を完了させて下さい。
               </p>
               <p>●メールが届かない時は…？</p>
               <p><span id="show_link">コチラをクリック</span>することでメールの内容が表示されます。</p>
               <p id="mail_contents"><?php echo $user_data[0]['name']; ?>様、こんにちは。<br>
               次の<a href="<?php echo $url; ?>">URL</a>から本登録を完了させて下さい。<br>
               URL：「<?php echo $url; ?>」</p>
            </div>
            <div id="right_box">
            </div>
         </main>
         <script src="./JS/jquery-3.3.1.min.js"></script>
         <script src="./JS/show.js"></script>
   </body>   
</html>