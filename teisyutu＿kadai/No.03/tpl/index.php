<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/index.css">
    <title>Document</title>
</head>
<body>
    <h2 class="head_p">画像アップロード</h2>
    <div id="center">
        <form method="POST" action="" enctype="multipart/form-data">
            <h3>氏名</h3>
            <input type="text" name="name" value="<?php echo $name; ?>">
            <h4><?php echo $name_msg; ?></h4>
            <h3>年齢</h3>
            <input type="text" name="age" value="<?php echo $age; ?>">
            <h4><?php echo $age_msg; ?></h4>
            <h3>画像</h3>
            <input id="upload" type="file" name="upload_file">
            <h4><?php echo $uf_msg; ?></h4>
            <div id="button"><button type="submit" name="check" value="complete">登録する</button></div>
        </form>
    </div>
</body>
</html>