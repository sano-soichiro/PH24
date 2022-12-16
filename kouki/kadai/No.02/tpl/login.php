<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/login.css">
    <title>Document</title>
</head>
<body>
    <div id="all">
        <p><?php echo $err_msg; ?></p>
        <div id="fr">
            <form method="post" action="./login.php">
                <p>ログインID</p><input type="text" name='id' value="">
                <p>パスワード</p><input type="password" name="pass" value=""><br>
                <button type="submit" name="type" value="login">ログイン</button>
            </form>
        </div>
    </div>
</body>
</html>