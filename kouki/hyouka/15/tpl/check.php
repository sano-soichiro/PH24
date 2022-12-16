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
    <h1>内容確認</h1>
        <form method="post" action="./check.php">
            <div><div><p>氏名</p><?php echo $list['name'][0]; ?></div></div>
            <div><div><p>ユーザーID</p><?php echo $list['id'][0]; ?></div></div>
            <div><div><p>パスワード</p><?php echo $password; ?></div></div>
            <div><div><p>メールアドレス</p><?php echo $list['address'][0]; ?></div></div>
            <button type="submit" name="check" value="back">修正</button>
            <button type="submit" name="check" value="confirm">登録</button>
        </form>
    </section>
</body>
</html>