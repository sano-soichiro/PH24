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
    <h2 class="head_p">確認</h2>
    <div id="center">
        <div id="c_p">
            <p>氏名:<?php echo $name; ?></p>
            <p>年齢:<?php echo $age; ?></p>
        </div>
        <form method="get" action="">
            <div id="button"><button type="submit" name="check" value="complete">登録</button></div>
            <div id="button"><button type="submit" name="check" value="back">戻る</button></div>
        </form>
    </div>
</body>
</html>