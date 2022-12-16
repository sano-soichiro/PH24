<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/kuku.css">
    <title>Document</title>
</head>
<body>
    <table>
    <?php foreach($list as $val){ ?>
        <tr>
        <?php foreach($val as $key => $one){ ?>
                <td class='<?php echo $one['color']; ?>'><?php echo $one['num2']; ?></td>
        <?php } ?>
        </tr>
    <?php } ?>
    </table>
</body>
</html>