<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf=08">
<link rel="stylesheet" type="text/css" href="./css/t_confirmation.css">
<title>確認</title>
</head>
<body>


<div class="title">
    <h1>Confirmation</h1>
    <h2>確認</h2>
</div>

<div class="form">
    <form action="./t_confirmation.php" method="POST">

        <div class="info">
            <div class="info_name"><p>氏名</p></div>
            <p class="data"><?php echo $data['name']; ?></p>
            <input type="hidden" value="<?php echo $data['name']; ?>" name="data[name]">
        </div>

        <div class="info">
            <div class="info_name"><p>ログインID</p></div>
            <p class="data"><?php echo $data['login_id']; ?></p>
            <input type="hidden" value="<?php echo $data['login_id']; ?>" name="data[login_id]">
        </div>

        <div class="info">
            <div class="info_name"><p>パスワード</p></div>
            <p class="data"><?php echo pass_hidden($data['password']); ?></p>
        </div>

        <div class="info">
            <div class="info_name"><p>メールアドレス</p></div>
            <p class="data"><?php echo $data['mail']; ?></p>
            <input type="hidden" value="<?php echo $data['mail']; ?>" name="data[mail]">
        </div>
    
        <div class="button">
            <div class="back_btn"><button name="back" type="submit" class="back">戻る</button></div>
            <div class="register_btn"><button  type="submit" name="register" class="register">登録</button></div>
        </div>
    </form>
</div>

</body>
</html>