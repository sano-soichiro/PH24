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
        <h1>会員登録</h1>
        <form method="post" action="./entry.php">
            <div class="input in_name"><div><p>氏名</p><input type="text" name="name" value="<?php echo $name; ?>"></div><p class="err"><?php echo $error['name']; ?></p></div>
            <div class="input in_id"><div><p>ユーザーID</p><input type="text" name="id" value="<?php echo $id; ?>"></div><p class="err"><?php echo $error['id']; ?></p></div>
            <div class="input in_pass"><div><p>パスワード</p><input type="text" name="password"></div><p class="err"><?php echo $error['password']; ?></p></div>
            <div class="input in_add"><div><p>メールアドレス</p><input type="text" name="address" value="<?php echo $address; ?>"></div><p class="err"><?php echo $error['address']; ?></p></div>
            <button type="submit" name="check" value="check">確認</button>
        </form>
    </section>
</body>
</html>