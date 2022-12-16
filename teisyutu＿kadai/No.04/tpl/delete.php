<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/delete.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <title>情報削除</title>
</head>
<body>
<div id="all">
    <h1>単行本削除</h1>
        <form method="post" action="./delete.php">
            <table>
                <tr>
                    <td class="head">画像</td>
                    <td><img src="<?php echo DIR_IMG . $id; ?>.jpg" alt="noimg"></td>
                </tr>
                <tr>
                    <td class="head">タイトル</td>
                    <td><?php echo $infomation['title']; ?></td>
                </tr>
                <tr>
                    <td class="head">巻数</td>
                    <td><?php echo $infomation['volume']; ?>巻</td>
                </tr>
                <tr>
                    <td class="head">価格</td>
                    <td><?php echo $infomation['price']; ?>円</td>
                </tr>
                <tr>
                    <td class="head">発売日</td>
                    <td><?php echo $infomation['release_date']; ?></td>
                </tr>
                <tr>
                    <td class="head">購入日</td>
                    <td><?php echo $infomation['purchase_date']; ?></td>
                </tr>
            </table>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button class="del_btn" type="submit" name="check" value="delete">単行本の情報を削除する</button>
            <button class="no_del_btn" type="submit" name="check" value="list">削除をやめる</button>
        </form>
</div>
</body>
</html>