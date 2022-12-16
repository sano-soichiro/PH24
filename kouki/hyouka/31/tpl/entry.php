<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <title>Entry</title>
</head>
<body>
<div id="block_center">
    <div id="main_block">
        <h1 class="keyword">仮登録</h1>
        <form method="post" action="./entry.php" enctype="multipart/form-data" id="center">
            <p class="textbox_head">NAME</p>
            <div class="textbox_block"><input type="text" name="name" value="<?php echo $name;?>" class="short_textbox" autocomplete = "off" placeholder=""></input></div>
            <p class="<?php echo $error; ?>"><?php echo isset($err_msg['name']) ? $err_msg['name'] : ''; ?></p>
            <p class="textbox_head">LOGIN_ID</p>
            <div class="textbox_block"><input type="text" name="login_id" value="<?php echo $login_id;?>" class="short_textbox" autocomplete = "off" placeholder=""></input></div>
            <p class="<?php echo $error; ?>"><?php echo isset($err_msg['login_id']) ? $err_msg['login_id'] : ''; ?></p>
            <p class="textbox_head">PASSWORD</p>
            <div class="textbox_block"><input type="text" name="password" value="" class="short_textbox" autocomplete = "off" placeholder=""></input></div>
            <p class="<?php echo $error; ?>"><?php echo isset($err_msg['password']) ? $err_msg['password'] : '';?></p>
            <p class="textbox_head">MAILADDRESS</p>
            <div class="textbox_block"><input type="text" name="mailaddress" value="<?php echo $mailaddress;?>" class="short_textbox" autocomplete = "off" placeholder=""></input></div>
            <p class="<?php echo $error; ?>"><?php echo isset($err_msg['mailaddress']) ? $err_msg['mailaddress'] : '';?></p>
            <button type="submit" name="entry" value="entry" id="entry_button" class="main_button">ENTRY</button>
        <form>
    </div>
</div>

</body>
</html>