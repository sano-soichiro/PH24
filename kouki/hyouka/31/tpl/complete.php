<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <title>Complete</title>
</head>
<body>
<div id="block_center">
    <div id="main_block">
        <h1>仮登録完了</h1>
        <p>メール送信がされました</p>

        <div class="mail">
            <p>ご登録ありがとうございます。</p>
            <p>アカウントを有効化するには、以下の手順を完了してください。</p>
            <p>アカウントの登録を完了するには、このリンクに一度アクセスする必要があります。以下のリンクをクリックしてください（またはブラウザにコピーしてください）</p>
            <p><a class="link" href="<?php echo BASE_URL.'31/'; ?>register.php?login_id=<?php echo $hash_login_id; ?>">./register.php?login_id=<?php echo $hash_login_id; ?></a></p>
        </div>
    </div>
</div>        
</body>
</html>