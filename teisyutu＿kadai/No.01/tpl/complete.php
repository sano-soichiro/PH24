<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/index.css">
    <title>Document</title>
</head>
<body>
    <h2 class="head_p">完了</h2>
    <div id="center">
        <h1>登録完了</h1>
        <div id="table">
            <table>
                <tr>
                    <td>ID:<?php echo $id; ?></td>
                </tr>
                <tr>
                    <td>氏名:<?php echo $name; ?></td>
                </tr>
                <tr>
                    <td>年齢:<?php echo $age; ?></td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>