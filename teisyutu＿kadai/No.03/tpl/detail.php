<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/detail.css">
    <title>Document</title>
</head>
<body>
    <h1>会員情報</h1>
    <div id="comp_table">
        <table>
            <tr>
                <td class="td_left">ID</td>
                <td class="td_right"><?php echo $id; ?></td>
            </tr>
            <tr>
                <td class="td_left">氏名</td>
                <td class="td_right"><?php echo $row['name']; ?>様</td>
            </tr>
            <tr>
                <td class="td_left">年齢</td>
                <td class="td_right"><?php echo $row['age']; ?>歳</td>
            </tr>
            <tr>
                <td class="td_left">画像</td>
                <td class="c_t_img td_right"><img src="../../img/<?php echo $id; ?>.<?php echo $row['ext']; ?>" alt=""></td>
            </tr>
        </table>
    </div>
    <div id="target"><a href="./complete.php">一覧へ</a></div>
</body>
</html>