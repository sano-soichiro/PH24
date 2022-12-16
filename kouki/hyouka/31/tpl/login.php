<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <title>LOGIN</title>
</head>
<body>
<div id="block_center">
    <div id="main_block">
        <h1 class="keyword">ログイン</h1>
        <form method="post" action="./login.php" enctype="multipart/form-data" id="center">
            <p class="textbox_head">LOGIN_ID</p>
            <input type="text" name="login_id" value="" class="short_textbox" autocomplete = "off" placeholder=""></input>
            <p class="data_flex"></p>
            <p class="textbox_head">PASSWORD</p>
            <input type="text" name="password" value="" class="short_textbox" autocomplete = "off" placeholder=""></input>
            <p class="<?php echo $error; ?>"><?php echo isset($err_msg['error']) ? $err_msg['error'] : ''; ?></p>
            <button type="submit" name="login" value="login" id="login_button" class="main_button">LOGIN</button>
        </form>
    </div>
</div>

</body>
</html>