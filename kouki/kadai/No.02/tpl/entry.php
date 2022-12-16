<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/entry.css">
    <title>Document</title>
</head>
<body>
    <div id="all">
        <div id="fr">
            <form method="post" action="./entry.php">
                <p>氏名</p><input type="text" name="name" value="">
                <p>ユーザーID </p><input type="text" name="id" value="">
                <p>パスワード</p><input type="password" name="pass" value=""><br>
                <button type="submit" name="type" value="entry">登録</button>
            </form>
        </div>
        <a id="log" href="./login.php">ログインへ</a>
    </div>
</body>
</html>