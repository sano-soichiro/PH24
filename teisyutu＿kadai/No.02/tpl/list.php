<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/list.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@300;400;500&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<h1>氏名検索</h1>
    <div id="main">
        <div id="search_box">
            <h2>氏名</h2>
            <div id="search">
                <form method="post" action="">
                    <input type="text" name="name" value="<?php echo $name; ?>">
                    <button type="submit" name="check" value="search" class="btn btn--orange btn--cubic btn--shadow">検索</button>
                    <button type="submit" name="check" value="search2" class="btn btn--orange btn--cubic btn--shadow">全件表示</button>
                </form>
            </div>
        </div>
        <div id="table_box">
            <div id="table">
                <table>
                        <tr id="head">
                            <td>ID</td><td>氏名</td><td>年齢</td>
                        </tr>
                    <?php foreach($row as $r_key => $r_value){ ?>
                        <tr>
                        <?php foreach($r_value as $column){ ?>
                            <td id="name"><?php echo $column; ?></td>
                        <?php } ?>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <p><?php echo $no_search; ?></p>
        </div>
    </div>
</body>
</html>