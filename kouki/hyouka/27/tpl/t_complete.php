<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf=08">
<link rel="stylesheet" type="text/css" href="./css/t_complete.css">
<title>完了</title>
</head>
<body>

<div class="title">
    <h1>Mail send</h1>
    <h3>mail送信完了</h3>
</div>


<div class="info">
    <div class="sentence">
        <div class="img"><img src="./img/envelope-regular.svg" alt=""></div>
        <p><?php echo $mail['mailto']; ?>宛に確認メールを送信しました</p>
        <p>メールが届かない場合は<a href="<?php echo $mail['URL']; ?>" >こちら</a></p>
    </div>
</div>



</body>
</html>