<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <title>Register</title>
</head>
<body>
<div id="block_center">
    <div id="main_block">
        <h1 class="keyword">本登録</h1>
        <form method="post" action="./register.php" enctype="multipart/form-data" id="center">
            <?php foreach($list as $row){ ?>
            <p class="name_head"><?php echo $row['name']; ?> 様</p>
            <?php } ?>
            <p class="textbox_head">PASSWORD</p>
            <input type="text" name="password" value="" class="short_textbox" autocomplete = "off" placeholder=""></input>
            <p class="<?php echo $error; ?>"><?php echo isset($err_msg['password']) ? $err_msg['password'] : ''; ?></p>
            <p class="textbox_head">IMAGE</p>
            <div><input type="file" name="file" value=""></input></div>
            <p class="<?php echo $error; ?>"><?php echo isset($err_msg['file']) ? $err_msg['file'] : ''; ?></p>
            <button type="submit" name="register" value="register" id="register_button" class="main_button">REGISTER</button>
        </form>
    </div>
</div>

</body>
</html>