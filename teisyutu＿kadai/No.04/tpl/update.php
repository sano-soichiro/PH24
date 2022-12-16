<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/update.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <title>情報変更</title>
</head>
<body>
    <div id="all">
        <h1>単行本情報変更</h1>
        <form method="post" action="./update.php" enctype="multipart/form-data">
            <table>
                <tr>
                    <td class="head">画像</td>
                    <td><img src="<?php echo DIR_IMG . $id; ?>.jpg" alt="noimg"><input class="file_btn" type="file" name="upload_file"></td>
                </tr>
                <tr>
                    <td class="head">タイトル</td>
                    <td><input type="text" name="title" value="<?php echo $title;?>"></td>
                </tr>
                <tr>
                    <td><?php echo $t_err; ?></td>
                </tr>
                <tr>
                    <td class="head">巻数</td>
                    <td><input type="text" name="volume" value="<?php echo $volume;?>">巻</td>
                </tr>            <tr>
                    <td><?php echo $v_err; ?></td>
                </tr>
                <tr>
                    <td class="head">価格</td>
                    <td><input type="text" name="price" value="<?php echo $price;?>">円</td>
                </tr>            <tr>
                    <td><?php echo $p_err; ?></td>
                </tr>
                <tr>
                    <td class="head">発売日</td>
                    <td><input type="text" name="release_date" value="<?php echo $release_date;?>"  placeholder="例）20010716"></td>
                </tr>            <tr>
                    <td><?php echo $r_err; ?></td>
                </tr>
                <tr>
                    <td class="head">購入日</td>
                    <td><input type="text" name="purchase_date" value="<?php echo $purchase_date;?>"  placeholder="例）20010716"></td>
                </tr>            <tr>
                    <td><?php echo $pu_err; ?></td>
                </tr>
            </table>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button class="up_btn" type="submit" name="check" value="update">単行本の情報を変更する</button>
            <button class="no_up_btn" type="submit" name="check" value="list">変更をやめる</button>
        </form>
    </div>
</body>
</html>