<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <title>Document</title>
</head>
<body>
    <div id="all">
        <div id="form">
            <h1>画像登録</h1>
            <form method="post" action="./index.php" enctype="multipart/form-data">
                <input type="file" name="file"><br>
                <textarea class="text" name="msg"></textarea>
                <button  type="submit" name="up" value="ok">登録</button>
            </form>
        </div>
        <div id="list">
            <ul>
                <?php foreach($list as $key => $value): ?>
                <div class="mini_li">
                    <li class="li img"><img src="./img/thumb_<?php echo $value['img']; ?>" alt=""></li>
                    <li class="li msg"><?php echo $value['msg']; ?></li>
                </div>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</body>
</html>