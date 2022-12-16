<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/base.css">
    <title>Document</title>
</head>
<body>
    <section>
    <h1>本登録</h1>
        <form method="post" action="./new_entry.php" enctype="multipart/form-data">
            <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
            <div><div><p>氏名</p><p class="name"><?php echo $name['name']; ?></p></div></div>
            <div><div><p>パスワード</p><input type="text" name="password" value=""></div><p class="err"><?php echo $err_msg['pass'];?></p></div>
            <div><div><p>画像</p><input type="file" name="file" value=""></div><p class="err"><?php echo $err_msg['img'];?></p></div>
            <button type="submit" name="check" value="confirm">登録</button>
        </form>
    </section>
</body>
</html>