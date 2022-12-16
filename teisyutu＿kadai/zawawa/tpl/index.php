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
   <title>アップロード</title>
</head>

<body>
   <main>
        <h2>データを登録する</h2>
        <?php //画像 ?>
        <form class="input_form" method="post" action="./index.php" enctype="multipart/form-data">
        <div class="form_block">
            <div class="input_file">
               <label class="input_file_title">ファイルを選択<input id="file" type="file" name="upload_file"></label>
               <div id="selected_file" class="selected_file">ファイルが選択されていません</div>
            </div>
        </div>
        <?php //送信ボタン ?>
        <button class="form_button" type="submit" name="button" value="submit">データを登録する</button>
        </form>
    </main>
   <script src="./JS/jquery-3.3.1.min.js"></script>
   <script src="./JS/output_date.js"></script>
   <script src="./JS/upload_file_name.js"></script>
   <script src="./JS/img_display.js"></script>
</body>
</html>