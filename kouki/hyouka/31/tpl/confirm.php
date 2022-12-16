<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <title>Confirm</title>
</head>
<body>
<div id="block_center">
    <div id="main_block">
        <h1 class="keyword">確認画面</h1>
        <form method="post" action="./confirm.php" enctype="multipart/form-data" id="center">
            <div class="data_flex">
                <p class="textbox_head">USERNAME</p>
                <p class="data"><?php echo $name;?></p>
            </div>
            <div class="data_flex">
                <p class="textbox_head">LOGIN_ID</p>
                <p class="data"><?php echo $login_id;?></p>
            </div>
            <div class="data_flex">
                <p class="textbox_head">PASSWORD</p>
                <p class="data"><?php echo $password_ball;?></p>
            </div>
            <div class="data_flex">
                <p class="textbox_head">MAILADDRESS</p>
                <p class="data"><?php echo $mailaddress;?></p>
            </div>
            <div class="button_flex">
            <div class="flex"><button type="submit" name="back" value="back" id="back_button" class="sub_button">修正</button></div>
            <div class="flex"><button type="submit" name="entry" value="entry" id="entry_button" class="main_button">完了</button></div>
            </div>
        <form>
    </div>
</div>

</body>
</html>