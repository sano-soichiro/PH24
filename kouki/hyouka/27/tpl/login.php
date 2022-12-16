<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf=08">
<link rel="stylesheet" type="text/css" href="./css/login.css">
<title>ログイン</title>
</head>
<body>


<div class="title">
    <h1>Login</h1>
    <h2>ログイン</h2>
</div>

<div class="error"><p class="e_msg"><?php echo $err; ?></p></div>

<div class="form">
    <form action="./login.php" method="POST">
        <div class="info">
            <div class="title">
                <div class="info_name"><p>ログインID</p></div>
                <div class="err"><p><?php echo $space_err['login_id']; ?></p></div>
            </div>
            <input type="text" name="data[login_id]">
        </div>

        <div class="info">
            <div class="title">
                <div class="info_name"><p>パスワード</p></div>
                <div class="err"><p><?php echo $space_err['password']; ?></p></div>
            </div>
            <input type="password" name="data[password]">
        </div>
    
        <div class="btn"><button name="btn" type="submit">ログイン</button></div>
    </form>
</div>

</body>
</html>