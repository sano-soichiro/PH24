<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf=08">
<link rel="stylesheet" type="text/css" href="./css/entry.css">
<title>仮登録</title>
</head>
<body>

<div class="title">
    <h1>Temporary registration</h1>
    <h2>仮登録</h2>
</div>

<div class="form">
    <form action="./entry.php" method="POST">
        <div class="info">
            <div class="title">
                <div class="info_name"><p>氏名</p></div>
                <div class="err"><p><?php echo $err['name']; ?></p></div>
            </div>
            <input type="text" name="data[name]" value="<?php echo $log['name']; ?>">   
        </div>
    
        <div class="info">
            <div class="title">
                <div class="info_name"><p>ログインID</p></div>
                <div class="err"><p><?php echo $err['login_id']; ?></p></div>
            </div>
            <input type="text" name="data[login_id]" value="<?php echo $log['login_id']; ?>">
        </div>
    
        <div class="info">
            <div class="title">
                <div class="info_name"><p>パスワード</p></div>
                <div class="err"><p><?php echo $err['password']; ?></p></div>
            </div>
            <input type="password" name="data[password]">
        </div>
    
        <div class="info">
            <div class="title">
                <div class="info_name"><p>メールアドレス</p></div>
                <div class="err"><p><?php echo $err['mail']; ?></p></div>
            </div>
            <input type="text" name="data[mail]" value="<?php echo $log['mail']; ?>">
        </div>
    
        <div class="btn"><button type="submit" name="btn">確認</button></div>
    </form>
</div>



</body>
</html>