<!DOCTYPE html>
<html lang = "ja">

   <head>
      <meta charset="UTF-8">
      <title>NewsBird | 会員登録</title>
      <!-- <link href="./css/index.css" rel="stylesheet" type="text/css"> -->
      <link href="text.css" rel="stylesheet" type="text/css">
   </head>

   <body>
      <?php foreach($news as $contents): ?>
         <h1><?php echo $contents['title']; ?></h1>
         <p><?php echo $contents['content']; ?></p>
      <?php endforeach; ?>
   </body>   
</html>