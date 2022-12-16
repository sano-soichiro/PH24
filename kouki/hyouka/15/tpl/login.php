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
    <h1>ログイン</h1>
        <form method="post" action="./login.php">
            <div><div><p>ログインID</p><input type="text" name="id" value=""></div></div>
            <div><div><p>パスワード</p><input type="text" name="password" value=""></div><p class="err"><?php echo $err_msg['id']; ?></p></div>
            <button type="submit" name="check" value="login">ログイン</button>
        </form>
    </section>
</body>
</html>