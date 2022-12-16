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
    <h2 class="head_p">DB登録</h2>
    <div id="center">
        <h1><?php echo $db_error; ?></h1>
        <form method="get" action="">
            <h2>氏名</h2>
            <input type="text" name="name" value="<?php echo $name; ?>">
            <p><?php echo $name_error; ?></p>
            <h2>年齢</h2>
            <input type="text" name="age" value="<?php echo $age; ?>">
            <p><?php echo $age_error; ?></p>
            <div id="button"><button type="submit" name="check" value="confirm">確認</button></div>
        </form>
    </div>
</body>
</html>