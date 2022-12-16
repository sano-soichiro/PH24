<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf=08">
<link rel="stylesheet" type="text/css" href="./css/register.css">
<title>完了</title>
</head>
<body>

<div class="title">
    <h1>Main registration</h1>
    <h2>本登録</h2>
</div>

<div class="form">
    <form action="./register.php" method="POST" enctype="multipart/form-data">
        <div class="info">
            <div class="title">
                <div class="info_name">
                    <p>氏名</p>
                </div>
                </div>
            <p name="name_info"><?php echo $data[0]['name']; ?></p>
        </div>
    
        <div class="info">
            <div class="title">
                <div class="info_name"><p>パスワード</p></div>
                <div class="err"><p><?php echo $err['password']; ?></p></div>
            </div>
            <input type="password" name="password" id="pass">
        </div>
    
        <div class="info">
            <div class="title">
                <div class="info_name"><p>画像</p></div>
                <div class="err"><p><?php echo $err['img']; ?></p></div>
            </div>
            <input type="file" name="img" id="img">
        </div>
    
        <div class="btn"><button type="submit" name="btn">登録</button></div>
    </form>
</div>

</body>
</html>